<?php
/* @var $this PaymentController */
/* @var $data Payment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userPm')); ?>:</b>
	<?php echo CHtml::encode($data->userPm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passwordPm')); ?>:</b>
	<?php echo CHtml::encode($data->passwordPm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdPm')); ?>:</b>
	<?php echo CHtml::encode($data->IdPm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userUpay')); ?>:</b>
	<?php echo CHtml::encode($data->userUpay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passUpay')); ?>:</b>
	<?php echo CHtml::encode($data->passUpay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phoneUpay')); ?>:</b>
	<?php echo CHtml::encode($data->phoneUpay); ?>
	<br />


</div>