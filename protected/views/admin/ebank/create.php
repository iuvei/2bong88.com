<?php
/* @var $this EbankController */
/* @var $model Ebank */

$this->breadcrumbs=array(
	'Ebanks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ebank', 'url'=>array('index')),
	array('label'=>'Manage Ebank', 'url'=>array('admin')),
);
?>

<h1>Create Ebank</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>