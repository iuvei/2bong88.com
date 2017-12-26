<?php
/* @var $this PaymentController */
/* @var $model Payment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<p class="note label label-success"><?php echo $dataOkie ?></p>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'userPm'); ?>
		<?php echo $form->textField($model,'userPm',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'userPm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passwordPm'); ?>
		<?php echo $form->passwordField($model,'passwordPm',array('size'=>60,'maxlength'=>300,'value'=>'')); ?>
		<?php echo $form->error($model,'passwordPm'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'hashPm'); ?>
		<?php echo $form->passwordField($model,'hashPm',array('size'=>60,'maxlength'=>300,'value'=>'')); ?>
		<?php echo $form->error($model,'hashPm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdPm'); ?>
		<?php echo $form->textField($model,'IdPm',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'IdPm'); ?>
	</div>
	<hr>
	<div class="row">
		<?php echo $form->labelEx($model,'userUpay'); ?>
		<?php echo $form->textField($model,'userUpay',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'userUpay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passUpay'); ?>
		<?php echo $form->passwordField($model,'passUpay',array('size'=>60,'maxlength'=>300,'value'=>'')); ?>
		<?php echo $form->error($model,'passUpay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phoneUpay'); ?>
		<?php echo $form->textField($model,'phoneUpay',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'phoneUpay'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->