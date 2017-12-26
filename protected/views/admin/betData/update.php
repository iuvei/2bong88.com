<?php
/* @var $this BetDataController */
/* @var $model betData */

$this->breadcrumbs=array(
	'Bet Datas'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List betData', 'url'=>array('index')),
	array('label'=>'Create betData', 'url'=>array('create')),
	array('label'=>'View betData', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage betData', 'url'=>array('admin')),
);
?>

<h1>Update betData <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>