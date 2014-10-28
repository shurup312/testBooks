<?php
/* @var $this BooksReadersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books Readers',
);

$this->menu=array(
	array('label'=>'Create BooksReaders', 'url'=>array('create')),
	array('label'=>'Manage BooksReaders', 'url'=>array('admin')),
);
?>

<h1>Books Readers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
