<?php
/* @var $this EbankController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ebanks',
);

$this->menu=array(
	array('label'=>'Create Ebank', 'url'=>array('create')),
	array('label'=>'Manage Ebank', 'url'=>array('admin')),
);
?>

<h1>Ebanks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
