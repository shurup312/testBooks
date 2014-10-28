<?php
/* @var $this BooksAuthorsController */
/* @var $model BooksAuthors */

$this->breadcrumbs=array(
	'Books Authors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BooksAuthors', 'url'=>array('index')),
	array('label'=>'Create BooksAuthors', 'url'=>array('create')),
	array('label'=>'View BooksAuthors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BooksAuthors', 'url'=>array('admin')),
);
?>

<h1>Update BooksAuthors <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>