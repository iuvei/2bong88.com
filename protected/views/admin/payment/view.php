<?php
/* @var $this PaymentController */
/* @var $model Payment */

$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'Update Payment', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Payment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
?>

<h1>View Payment #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'userPm',
		'passwordPm',
		'IdPm',
		'userUpay',
		'passUpay',
		'phoneUpay',
	),
)); ?>
