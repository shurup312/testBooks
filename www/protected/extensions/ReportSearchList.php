<?php

/**
 * User: Oleg Prihodko
 * Mail: shuru@e-mind.ru
 * Date: 27.10.14
 * Time: 21:50
 */
class ReportSearchList extends AbstractSearchList {

	/**
	 * Процесс поиска и заполнение его результатами аттрибута results
	 */
	protected function loadResults () {
		$this->getThatReadAndThreeAuthors();
		$this->getThatHaveMoreThreeReaders();
		$this->gerRandFiveBooks();
	}

	/**
	 * Процесс выяснения общего количества результатов поиска без учета лимитов и запись числа в аттрибут total_count
	 */
	protected function loadTotalCount () {
		// TODO: Implement loadTotalCount() method.
	}

	/**
	 * Получение списка книг, которые на рука, и у которых не менее трех авторов
	 */
	private function getThatReadAndThreeAuthors () {
		$books_id                            = $this->getThatRead();
		$books_id                            = $this->getBooksThreeAuthors($books_id);
		$this->results['readAndThreeAuthor'] = $this->getBooks($books_id);
	}

	/**
	 * Получение 5ти случайных книг
	 */
	private function gerRandFiveBooks () {
		$total                   = $this->getCountBooks();
		$book_id                 = $this->getRandBooks($total);
		$this->results['random'] = $this->getBooks($book_id);
	}

	/**
	 * Получение авторов, чьи книги на руках не менее, чем у трех читателей.
	 */
	private function getThatHaveMoreThreeReaders () {
		$book_id = $this->getBooksHaveMoreThreeReaders();
		$author_id = $this->getAuthorsForBooks($book_id);
		$this->results['authorsHaveMoreThreeReaders'] = $this->getAuthors($author_id);
	}

	/**
	 * Получение ID книг, у которых более трех читателей.
	 * @return array|bool
	 */
	private function getBooksHaveMoreThreeReaders () {
		$sql = 'SELECT book_id, COUNT(reader_id) AS `readerCount`
				FROM books_readers
				GROUP BY book_id
				HAVING readerCount>3';
		return Yii::app()->db->createCommand($sql)->queryColumn();
	}

	/**
	 * Получение ID авторов для переданных ID книг
	 * @param array $book_id массив ID книг
	 * @return array|bool
	 */
	private function getAuthorsForBooks ($book_id) {
		$sql = 'SELECT author_id
				FROM books_authors
				WHERE book_id IN ('.implode(',', $book_id).')
				GROUP BY author_id';
		return Yii::app()->db->createCommand($sql)->queryColumn();
	}

	/**
	 * Получение имени авторов по переданным ID
	 * @param array $author_id массив ID авторов
	 * @return array
	 */
	private function getAuthors ($author_id) {
		$sql    = 'SELECT name
				FROM authors
				WHERE `id` IN ('.implode(',', $author_id).')
				LIMIT 10';
		$result = Yii::app()->db->createCommand($sql);
		/**
		 * @var CDBCommand $result
		 */
		return $result->queryAll();
	}

	/**
	 * Получение ID авторов, для переданных ID книг, при условии, что у этих книг не менее, чем три автора
	 * @param array $book_id массив ID книг
	 * @return array
	 */
	private function getBooksThreeAuthors ($book_id) {
		$sql    = 'SELECT book_id, COUNT(author_id) AS `countAuthor`
				FROM books_authors
				WHERE book_id IN ('.implode(', ', $book_id).')
				GROUP BY book_id
				HAVING `countAuthor`>=3';
		$result = Yii::app()->db->createCommand($sql);
		/**
		 * @var CDBCommand $result
		 */
		return $result->queryColumn();
	}

	/**
	 * Получение списка всех книг, которые на руках.
	 * @return array
	 */
	private function getThatRead () {
		/**
		 * TODO: группировка по книгам только для подстраховки, по идее одна книга - один читатель. Так что просто ради предусмотрения глюков в базе
		 */
		$sql    = 'SELECT book_id
				FROM books_readers
				GROUP BY book_id';
		$result = Yii::app()->db->createCommand($sql);
		/**
		 * @var CDBCommand $result
		 */
		return $result->queryColumn();
	}

	/**
	 * Получение имени книг по переданным ID
	 * @param array $books_id массив ID книг
	 * @return array
	 */
	private function getBooks ($books_id) {
		$sql    = 'SELECT name
				FROM books
				WHERE `id` IN ('.implode(',', $books_id).')
				LIMIT 10';
		$result = Yii::app()->db->createCommand($sql);
		/**
		 * @var CDBCommand $result
		 */
		return $result->queryAll();
	}

	/**
	 * Общее количество книг в базе
	 * @return int
	 */
	private function getCountBooks () {
		$sql = 'SELECT COUNT(id)
				FROM books';
		return Yii::app()->db->createCommand($sql)->queryScalar();
	}

	/**
	 * Получение ID для 5ти случайных книг
	 * @param int $total всего книг в базе
	 * @param int $limit лимит случайныз записей для выборки
	 * @return array
	 */
	private function getRandBooks ($total, $limit = 5) {
		set_time_limit(1);
		$result     = array ();
		while(sizeof($result)!=$limit && !$this->isMaxCountBooks($total, $result)) {
			$rand = rand(0, $total - 1);
			if (!in_array($rand, $result)) {
				$result[] = $rand;
			}
		}
		return $result;
	}

	/**
	 * Сравнивает общее количество книг в базе и количество отобранных ID в массиве
	 * @param int $total общее количество книг в базе
	 * @param array $result массив оторанных ID
	 * @return bool
	 */
	private function isMaxCountBooks ($total, $result) {
		return sizeof($result) == $total;
	}
}
