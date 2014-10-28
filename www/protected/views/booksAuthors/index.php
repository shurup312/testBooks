<?php
/* @var $this BooksAuthorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books Authors',
);

$this->menu=array(
	array('label'=>'Create BooksAuthors', 'url'=>array('create')),
	array('label'=>'Manage BooksAuthors', 'url'=>array('admin')),
);
?>

<h1>Books Authors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
