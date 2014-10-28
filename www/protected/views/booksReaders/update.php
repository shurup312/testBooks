<?php
/* @var $this BooksReadersController */
/* @var $model BooksReaders */

$this->breadcrumbs=array(
	'Books Readers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BooksReaders', 'url'=>array('index')),
	array('label'=>'Create BooksReaders', 'url'=>array('create')),
	array('label'=>'View BooksReaders', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BooksReaders', 'url'=>array('admin')),
);
?>

<h1>Update BooksReaders <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>