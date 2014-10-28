<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	 * Пришел ли AJAX запрос
	 * @return bool
	 */
	protected function isAjax() {
		return \Yii::app()->getRequest()->getIsAjaxRequest();
	}

	/**
	 * Форсирование ошибки 404
	 * @param string $message сообщение
	 * @throws \CHttpException
	 */
	protected function set404($message = '') {
		throw new \CHttpException(404, $message);
	}

	/**
	 * Возвращает параметр по ключу, в противном случае дефолтное значение
	 * Приоритет хранилища параметра ($_POST, $_REQUEST etc) определяется настройками сервера (по умолчанию GPC)
	 * @param string     $key
	 * @param mixed|null $default_value
	 * @return mixed|null
	 */
	protected function getParam($key, $default_value = null) {
		return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default_value;
	}

	/**
	 * Получение int значения из $_REQUEST.
	 * Оптимально использовать для получение id записи, тем самым проводя первоначальную валидацию этого значения.
	 * @param string   $key
	 * @param null|int $default_value
	 * @return int|null
	 */
	protected function getParamInt($key, $default_value = null) {
		if (!is_numeric($this->getParam($key))) {
			return $default_value;
		}
		$value = (int)$this->getParam($key);
		if (is_string($this->getParam($key)) && $this->getParam($key) !== (string)$value) {
			return $default_value;
		}
		return $value;
	}

	/**
	 * Эхо переданного массива как json
	 * @param array $array
	 */
	public function jsonResponse ($array) {
		echo json_encode($array);
	}
}
