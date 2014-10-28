<?php
/* @var $this BooksReadersController */
/* @var $model BooksReaders */

$this->breadcrumbs=array(
	'Books Readers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BooksReaders', 'url'=>array('index')),
	array('label'=>'Create BooksReaders', 'url'=>array('create')),
	array('label'=>'Update BooksReaders', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BooksReaders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BooksReaders', 'url'=>array('admin')),
);
?>

<h1>View BooksReaders #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'book_id',
		'reader_id',
		'id',
	),
)); ?>
