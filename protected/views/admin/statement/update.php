<?php
/* @var $this StatementController */
/* @var $model Statement */

$this->breadcrumbs=array(
	'Statements'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Statement', 'url'=>array('index')),
	array('label'=>'Create Statement', 'url'=>array('create')),
	array('label'=>'View Statement', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Statement', 'url'=>array('admin')),
);
?>

<h1>Update Statement <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>