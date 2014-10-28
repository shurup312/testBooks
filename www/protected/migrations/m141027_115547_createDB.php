<?php

class m141027_115547_createDB extends CDbMigration {

	public function up () {
		$this->createTable(
			 'books',
			 array (
				 'id'           => 'pk',
				 'name'         => 'varchar(64)',
				 'date_created' => 'timestamp NOT NULL',
				 'date_updated' => 'timestamp NOT NULL',
			 ),
			 'COLLATE="utf8_general_ci" ENGINE=MyISAM'
		);
		$this->createTable(
			 'authors',
			 array (
				 'id'           => 'pk',
				 'name'         => 'varchar(64)',
				 'date_created' => 'timestamp NOT NULL',
				 'date_updated' => 'timestamp NOT NULL',
			 ),
			 'COLLATE="utf8_general_ci" ENGINE=MyISAM'
		);
		$this->createTable(
			 'readers',
			 array (
				 'id'           => 'pk',
				 'name'         => 'varchar(64)',
				 'date_created' => 'timestamp NOT NULL',
				 'date_updated' => 'timestamp NOT NULL',
			 ),
			 'COLLATE="utf8_general_ci" ENGINE=MyISAM'
		);
		$this->createTable(
			 'books_authors',
			 array (
				 'id'        => 'pk',
				 'book_id'   => 'int default "0"',
				 'author_id' => 'int default "0"',
			 )
		);
		$this->createTable(
			 'books_readers',
			 array (
				 'id'        => 'pk',
				 'book_id'   => 'int default "0"',
				 'reader_id' => 'int default "0"',
			 )
		);
		$this->execute("ALTER TABLE `books_authors` ADD KEY (`book_id`, `author_id`)");
		$this->execute("ALTER TABLE `books_readers` ADD KEY (`book_id`, `reader_id`)");
	}

	public function down () {
		echo "m141027_115547_createDB does not support migration down.\n";
		return false;
	}
}
