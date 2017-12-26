<?php
/* @var $this StatementController */
/* @var $model Statement */

$this->breadcrumbs=array(
	'Statements'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Statement', 'url'=>array('index')),
	array('label'=>'Create Statement', 'url'=>array('create')),
	array('label'=>'Update Statement', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Statement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Statement', 'url'=>array('admin')),
);
?>

<h1>View Statement #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'username',
		'time',
		'turnover',
		'credit',
		'com',
		'balance',
		'type',
	),
)); ?>
