<?php
use \ActiveRecord;

abstract class AbstractSearchList { //todo а теперь уже можно и интерфейс замутить )))

	/**
	 * Параметры поиска
	 * @var array
	 */
	protected $params;

	/**
	 * Результаты поиска
	 * @var array
	 */
	protected $results;

	/**
	 * @var ActiveRecord[]
	 */
	protected $results_models;

	/**
	 * Общее количество результатов поиска не учитывая лимиты
	 * @var int
	 */
	protected $total_count;

	/**
	 * @var CDbConnection
	 */
	protected $db_connection;

	/**
	 * Конструктор
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Инициализация
	 */
	protected function init() {

	}

	/**
	 * @return \CDbConnection
	 */
	protected function getDbConnection() {
		if ($this->db_connection === null) {
			$this->db_connection = Yii::app()->db;
		}
		return $this->db_connection;
	}

	/**
	 * Сеттер соединения с базов (мастер или слейв)
	 * @param CDbConnection $db_connection
	 * @return $this
	 */
	public function setDbConnection(CDbConnection $db_connection) {
		$this->db_connection = $db_connection;
		return $this;
	}

	/**
	 * Установка параметров поиска
	 * @param array $params
	 * @param bool  $overwrite
	 * @return $this
	 */
	public function setParams(array $params, $overwrite = true) {
		if ($overwrite) {
			$this->params = $params;
		} else {
			foreach ($params as $key => $value) {
				$this->params[$key] = $value; //todo сделать рекурсивно на случайно вложенных массивов
			}
		}
		return $this;
	}

	/**
	 * Процесс поиска и заполнение его результатами аттрибута results
	 */
	abstract protected function loadResults();

	/**
	 * Процесс выяснения общего количества результатов поиска без учета лимитов и запись числа в аттрибут total_count
	 */
	abstract protected function loadTotalCount();

	/**
	 * @param bool $return_models
	 * @return ActiveRecord|array
	 */
	public function getResults($return_models = false) {
		if (!$return_models) {
			if ($this->results_models === null) {
				$this->loadResults();
			}
			return $this->results;
		}
		if ($this->results_models === null) {
			foreach ($this->getResults(false) as $key => $result) {
				//todo сделать создание моделей на основе полученных данных
				//todo в итоге получаем, что надо создать SearchListArray и от него унаследованный SearchListModel (для пытливых умом - это для сфинкса, т.к. потом надеюсь на него дохрена чего переведем)

				//todo создать в моделях методы, которые будут искать модели на основе сёрчлистов и набора параметров
			}
		}
		return $this->results_models;
	}

	/**
	 * Получение общего количества результатов поиска без учета лимитов
	 * @return int
	 */
	public function getTotalCount() {
		if ($this->total_count === null) {
			$this->loadTotalCount();
		}
		return $this->total_count;
	}

	/**
	 * Все по запросу
	 * @param string|CDbCommand $sql_or_dbcommand
	 * @return array
	 */
	protected function fetchAll($sql_or_dbcommand) {
		if ($sql_or_dbcommand instanceof CDbCommand) {
			return $sql_or_dbcommand->queryAll();
		}
		return $this->getDbConnection()->createCommand($sql_or_dbcommand)->queryAll();
	}

	/**
	 * Получение первого значения из первого строки
	 * @param string|CDbCommand $sql_or_dbcommand
	 * @return mixed
	 */
	protected function fetchFirstFromFirstRow($sql_or_dbcommand) {
		if ($sql_or_dbcommand instanceof CDbCommand) {
			return $sql_or_dbcommand->queryAll();
		}
		return $this->getDbConnection()->createCommand($sql_or_dbcommand)->queryScalar();
	}

	/**
	 * Все по запросу, чтобы ключом было значение из первого столбца
	 * @param string|CDbCommand $sql_or_dbcommand
	 * @return array
	 */
	protected function fetchAllFirstColumnAsKey($sql_or_dbcommand) {
		$result = $this->fetchAll($sql_or_dbcommand);
		if (empty($result)) {
			return $result;
		}
		$result_array = array();
		foreach ($result as $row) {
			$vals = array_values($row);
			$result_array[$vals[0]] = $row;
			reset($row);
		}
		return $result_array;
	}

}
