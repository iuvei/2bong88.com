<?php
/* @var $this BetDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bet Datas',
);

$this->menu=array(
	array('label'=>'Create betData', 'url'=>array('create')),
	array('label'=>'Manage betData', 'url'=>array('admin')),
);
?>

<h1>Bet Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
