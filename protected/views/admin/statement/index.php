<?php
/* @var $this StatementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Statements',
);

$this->menu=array(
	array('label'=>'Create Statement', 'url'=>array('create')),
	array('label'=>'Manage Statement', 'url'=>array('admin')),
);
?>

<h1>Statements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
