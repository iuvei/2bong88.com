<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullName')); ?>:</b>
	<?php echo CHtml::encode($data->fullName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit')); ?>:</b>
	<?php echo CHtml::encode($data->credit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('balance')); ?>:</b>
	<?php echo CHtml::encode($data->balance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yesterdayBalance')); ?>:</b>
	<?php echo CHtml::encode($data->yesterdayBalance); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('betCredit')); ?>:</b>
	<?php echo CHtml::encode($data->betCredit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('outStanding')); ?>:</b>
	<?php echo CHtml::encode($data->outStanding); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memberTurnover')); ?>:</b>
	<?php echo CHtml::encode($data->memberTurnover); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastLogin')); ?>:</b>
	<?php echo CHtml::encode($data->lastLogin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipLogin')); ?>:</b>
	<?php echo CHtml::encode($data->ipLogin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Payname')); ?>:</b>
	<?php echo CHtml::encode($data->Payname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PayAccount')); ?>:</b>
	<?php echo CHtml::encode($data->PayAccount); ?>
	<br />

	*/ ?>

</div>