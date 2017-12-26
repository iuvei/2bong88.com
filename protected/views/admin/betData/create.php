<?php
/* @var $this BetDataController */
/* @var $model betData */

$this->breadcrumbs=array(
	'Bet Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List betData', 'url'=>array('index')),
	array('label'=>'Manage betData', 'url'=>array('admin')),
);
?>

<h1>Create betData</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>