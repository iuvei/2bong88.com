<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fullName'); ?>
		<?php echo $form->textField($model,'fullName',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit'); ?>
		<?php echo $form->textField($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'balance'); ?>
		<?php echo $form->textField($model,'balance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yesterdayBalance'); ?>
		<?php echo $form->textField($model,'yesterdayBalance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'betCredit'); ?>
		<?php echo $form->textField($model,'betCredit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'outStanding'); ?>
		<?php echo $form->textField($model,'outStanding'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'memberTurnover'); ?>
		<?php echo $form->textField($model,'memberTurnover'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastLogin'); ?>
		<?php echo $form->textField($model,'lastLogin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ipLogin'); ?>
		<?php echo $form->textField($model,'ipLogin',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Payname'); ?>
		<?php echo $form->textField($model,'Payname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PayAccount'); ?>
		<?php echo $form->textField($model,'PayAccount',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->