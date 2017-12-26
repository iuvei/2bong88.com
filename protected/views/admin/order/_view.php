<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_order')); ?>:</b>
	<?php echo CHtml::encode($data->type_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sended')); ?>:</b>
	<?php echo CHtml::encode($data->sended); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_create')); ?>:</b>
	<?php echo CHtml::encode($data->time_create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ip')); ?>:</b>
	<?php echo CHtml::encode($data->Ip); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('IdUser')); ?>:</b>
	<?php echo CHtml::encode($data->IdUser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('try')); ?>:</b>
	<?php echo CHtml::encode($data->try); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viewed')); ?>:</b>
	<?php echo CHtml::encode($data->viewed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ToAccount')); ?>:</b>
	<?php echo CHtml::encode($data->ToAccount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AmountVND')); ?>:</b>
	<?php echo CHtml::encode($data->AmountVND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AmountUSD')); ?>:</b>
	<?php echo CHtml::encode($data->AmountUSD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ToAccountName')); ?>:</b>
	<?php echo CHtml::encode($data->ToAccountName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ToBankName')); ?>:</b>
	<?php echo CHtml::encode($data->ToBankName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cookie')); ?>:</b>
	<?php echo CHtml::encode($data->Cookie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FromAccount')); ?>:</b>
	<?php echo CHtml::encode($data->FromAccount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FromAccountName')); ?>:</b>
	<?php echo CHtml::encode($data->FromAccountName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FromBankName')); ?>:</b>
	<?php echo CHtml::encode($data->FromBankName); ?>
	<br />

	*/ ?>

</div>