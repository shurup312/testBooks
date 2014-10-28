<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?=CHtml::link('Авторы','/authors/admin');?><br />
<?=CHtml::link('Книги','/books/admin');?><br />
<?=CHtml::link('Читатели','/readers/admin');?><br />
<?=CHtml::link('Привязка читателей к книгам','/booksreaders/admin');?><br />
<?=CHtml::link('Привязка авторов к книгам','/booksauthors/admin');?><br />
<?=CHtml::link('Отчет','/report/index');?><br />
