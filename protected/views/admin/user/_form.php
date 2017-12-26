<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>300,'value'=>"")); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fullName'); ?>
		<?php echo $form->textField($model,'fullName',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'fullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit'); ?>
		<?php echo $form->error($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'balance'); ?>
		<?php echo $form->textField($model,'balance'); ?>
		<?php echo $form->error($model,'balance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'yesterdayBalance'); ?>
		<?php echo $form->textField($model,'yesterdayBalance'); ?>
		<?php echo $form->error($model,'yesterdayBalance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'betCredit'); ?>
		<?php echo $form->textField($model,'betCredit'); ?>
		<?php echo $form->error($model,'betCredit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'outStanding'); ?>
		<?php echo $form->textField($model,'outStanding'); ?>
		<?php echo $form->error($model,'outStanding'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'memberTurnover'); ?>
		<?php echo $form->textField($model,'memberTurnover'); ?>
		<?php echo $form->error($model,'memberTurnover'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastLogin'); ?>
		<?php echo $form->textField($model,'lastLogin'); ?>
		<?php echo $form->error($model,'lastLogin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipLogin'); ?>
		<?php echo $form->textField($model,'ipLogin',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ipLogin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('1'=>'hoạt động','0'=>'Bị ban')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Payname'); ?>
		<?php echo $form->textField($model,'Payname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Payname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PayAccount'); ?>
		<?php echo $form->textField($model,'PayAccount',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'PayAccount'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'bonusBalance'); ?>
		<?php echo $form->textField($model,'bonusBalance',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'bonusBalance'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->