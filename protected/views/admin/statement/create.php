<?php
/* @var $this StatementController */
/* @var $model Statement */

$this->breadcrumbs=array(
	'Statements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Statement', 'url'=>array('index')),
	array('label'=>'Manage Statement', 'url'=>array('admin')),
);
?>

<h1>Create Statement</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>