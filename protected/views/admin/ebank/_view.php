<?php
/* @var $this EbankController */
/* @var $data Ebank */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BtcId')); ?>:</b>
	<?php echo CHtml::encode($data->BtcId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BtcPass')); ?>:</b>
	<?php echo CHtml::encode($data->BtcPass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BtcSencondPass')); ?>:</b>
	<?php echo CHtml::encode($data->BtcSencondPass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WmzEmail')); ?>:</b>
	<?php echo CHtml::encode($data->WmzEmail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WmzPass')); ?>:</b>
	<?php echo CHtml::encode($data->WmzPass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WmzId')); ?>:</b>
	<?php echo CHtml::encode($data->WmzId); ?>
	<br />


</div>