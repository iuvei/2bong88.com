<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type_order'); ?>
		<?php echo $form->textField($model,'type_order',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'type_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sended'); ?>
		<?php echo $form->textField($model,'sended'); ?>
		<?php echo $form->error($model,'sended'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_create'); ?>
		<?php echo $form->textField($model,'time_create'); ?>
		<?php echo $form->error($model,'time_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array("incomplete"=>'Chưa thanh toán',"recieved"=>'Đang xử lý','error'=>'error','completed'=>'Hoàn thành')); ?>
		
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ip'); ?>
		<?php echo $form->textField($model,'Ip',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdUser'); ?>
		<?php echo $form->textField($model,'IdUser'); ?>
		<?php echo $form->error($model,'IdUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'try'); ?>
		<?php echo $form->textField($model,'try'); ?>
		<?php echo $form->error($model,'try'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'viewed'); ?>
		<?php echo $form->textField($model,'viewed'); ?>
		<?php echo $form->error($model,'viewed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ToAccount'); ?>
		<?php echo $form->textField($model,'ToAccount',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ToAccount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AmountVND'); ?>
		<?php echo $form->textField($model,'AmountVND'); ?>
		<?php echo $form->error($model,'AmountVND'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AmountUSD'); ?>
		<?php echo $form->textField($model,'AmountUSD'); ?>
		<?php echo $form->error($model,'AmountUSD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ToAccountName'); ?>
		<?php echo $form->textField($model,'ToAccountName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ToAccountName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ToBankName'); ?>
		<?php echo $form->textField($model,'ToBankName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ToBankName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cookie'); ?>
		<?php echo $form->textField($model,'Cookie',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'Cookie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FromAccount'); ?>
		<?php echo $form->textField($model,'FromAccount',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FromAccount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FromAccountName'); ?>
		<?php echo $form->textField($model,'FromAccountName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'FromAccountName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FromBankName'); ?>
		<?php echo $form->textField($model,'FromBankName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'FromBankName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->