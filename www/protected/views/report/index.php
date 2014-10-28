<?
/**
 * @var array $report
 */
?>
<div>
	<h4>На руках у читателей, и не менее 3х авторов</h4>
	<?
	foreach($report['readAndThreeAuthor'] as $item) {
		?><?=$item['name'];?><br /><?
	}
	?>
</div>
<br/><br/>
<div>
	<h4>Авторы, чьи книги на руках более чем у трех читателей</h4>
	<?
	foreach($report['authorsHaveMoreThreeReaders'] as $item) {
		?><?=$item['name'];?><br /><?
	}
	?>
</div>
<br/><br/>
<div>
	<h4>5 случайных книг</h4>
	<?
	foreach($report['random'] as $item) {
		?><?=$item['name'];?><br /><?
	}
	?>
</div>
