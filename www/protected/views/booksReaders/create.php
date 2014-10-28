<?php
/* @var $this BooksReadersController */
/* @var $model BooksReaders */

$this->breadcrumbs=array(
	'Books Readers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BooksReaders', 'url'=>array('index')),
	array('label'=>'Manage BooksReaders', 'url'=>array('admin')),
);
?>

<h1>Create BooksReaders</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>