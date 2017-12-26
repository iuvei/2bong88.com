<?php
/* @var $this EbankController */
/* @var $model Ebank */

$this->breadcrumbs=array(
	'Ebanks'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ebank', 'url'=>array('index')),
	array('label'=>'Create Ebank', 'url'=>array('create')),
	array('label'=>'View Ebank', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Ebank', 'url'=>array('admin')),
);
?>

<h1>Update Ebank <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>