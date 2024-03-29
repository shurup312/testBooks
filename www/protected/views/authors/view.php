<?php
/* @var $this AuthorsController */
/* @var $model Authors */

$this->breadcrumbs=array(
	'Authors'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Authors', 'url'=>array('index')),
	array('label'=>'Create Authors', 'url'=>array('create')),
	array('label'=>'Update Authors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Authors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Authors', 'url'=>array('admin')),
);
?>

<h1>View Authors #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'date_created',
		'date_updated',
	),
)); ?>
