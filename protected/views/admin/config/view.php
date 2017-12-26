<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Configs'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Config', 'url'=>array('index')),
	array('label'=>'Create Config', 'url'=>array('create')),
	array('label'=>'Update Config', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Config', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Config', 'url'=>array('admin')),
);
?>

<h1>View Config #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'siteTitle',
		'siteKeyword',
		'siteDes',
		'IMEI',
		'key',
		'option_auto',
		'phone',
		'yahoo',
		'email',
		'Viber',
		'Skype',
		'Facebook',
		'Fanpage',
		'address',
		'copyright',
		'siteOffline',
		'textOffline',
		'supportContent',
		'guideContent',
		'allowReg',
		'GetBalance',
		'balancePm',
		'balanceUpay',
		'balanceVCB',
		'userB88ag',
		'passB88ag',
		'pageCapt',
		'keyB88ag',
	),
)); ?>
