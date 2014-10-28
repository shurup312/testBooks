<?php
/* @var $this BooksAuthorsController */
/* @var $model BooksAuthors */

$this->breadcrumbs=array(
	'Books Authors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BooksAuthors', 'url'=>array('index')),
	array('label'=>'Create BooksAuthors', 'url'=>array('create')),
	array('label'=>'Update BooksAuthors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BooksAuthors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BooksAuthors', 'url'=>array('admin')),
);
?>

<h1>View BooksAuthors #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'book_id',
		'author_id',
		'id',
	),
)); ?>
