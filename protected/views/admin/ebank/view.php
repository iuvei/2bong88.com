<?php
/* @var $this EbankController */
/* @var $model Ebank */

$this->breadcrumbs=array(
	'Ebanks'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Ebank', 'url'=>array('index')),
	array('label'=>'Create Ebank', 'url'=>array('create')),
	array('label'=>'Update Ebank', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Ebank', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ebank', 'url'=>array('admin')),
);
?>

<h1>View Ebank #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'BtcId',
		'BtcPass',
		'BtcSencondPass',
		'WmzEmail',
		'WmzPass',
		'WmzId',
	),
)); ?>
