<?php
/* @var $this BooksAuthorsController */
/* @var $model BooksAuthors */

$this->breadcrumbs=array(
	'Books Authors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BooksAuthors', 'url'=>array('index')),
	array('label'=>'Manage BooksAuthors', 'url'=>array('admin')),
);
?>

<h1>Create BooksAuthors</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>