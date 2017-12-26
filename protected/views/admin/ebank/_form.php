<?php
/* @var $this EbankController */
/* @var $model Ebank */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ebank-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'BtcId'); ?>
		<?php echo $form->textField($model,'BtcId',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'BtcId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BtcPass'); ?>
		<?php echo $form->textField($model,'BtcPass',array('size'=>60,'maxlength'=>200,'value'=>'')); ?>
		<?php echo $form->error($model,'BtcPass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BtcSencondPass'); ?>
		<?php echo $form->textField($model,'BtcSencondPass',array('size'=>60,'maxlength'=>200,'value'=>'')); ?>
		<?php echo $form->error($model,'BtcSencondPass'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'BtcRate'); ?>
		<?php echo $form->textField($model,'BtcRate',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'BtcRate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WmzEmail'); ?>
		<?php echo $form->textField($model,'WmzEmail',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'WmzEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WmzPass'); ?>
		<?php echo $form->textField($model,'WmzPass',array('size'=>60,'maxlength'=>200,'value'=>'')); ?>
		<?php echo $form->error($model,'WmzPass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WmzId'); ?>
		<?php echo $form->textField($model,'WmzId',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'WmzId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->