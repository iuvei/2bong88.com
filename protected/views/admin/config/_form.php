<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'siteTitle'); ?>
		<?php echo $form->textField($model,'siteTitle',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'siteTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siteKeyword'); ?>
		<?php echo $form->textField($model,'siteKeyword',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'siteKeyword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siteDes'); ?>
		<?php echo $form->textField($model,'siteDes',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'siteDes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IMEI'); ?>
		<?php echo $form->textField($model,'IMEI',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'IMEI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'key'); ?>
		<?php echo $form->textField($model,'key',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'option_auto'); ?>
		<?php echo $form->textField($model,'option_auto'); ?>
		<?php echo $form->error($model,'option_auto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'yahoo'); ?>
		<?php echo $form->textField($model,'yahoo',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'yahoo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Viber'); ?>
		<?php echo $form->textField($model,'Viber',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Viber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Skype'); ?>
		<?php echo $form->textField($model,'Skype',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Skype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Facebook'); ?>
		<?php echo $form->textField($model,'Facebook',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fanpage'); ?>
		<?php echo $form->textField($model,'Fanpage',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Fanpage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'copyright'); ?>
		<?php echo $form->textField($model,'copyright',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'copyright'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siteOffline'); ?>
		<?php echo $form->textField($model,'siteOffline'); ?>
		<?php echo $form->error($model,'siteOffline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textOffline'); ?>
		<?php echo $form->textArea($model,'textOffline',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textOffline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supportContent'); ?>
		<?php echo $form->textArea($model,'supportContent',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'supportContent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guideContent'); ?>
		<?php echo $form->textArea($model,'guideContent',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'guideContent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allowReg'); ?>
		<?php echo $form->textField($model,'allowReg'); ?>
		<?php echo $form->error($model,'allowReg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GetBalance'); ?>
		<?php echo $form->textField($model,'GetBalance'); ?>
		<?php echo $form->error($model,'GetBalance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'balancePm'); ?>
		<?php echo $form->textField($model,'balancePm'); ?>
		<?php echo $form->error($model,'balancePm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'balanceUpay'); ?>
		<?php echo $form->textField($model,'balanceUpay'); ?>
		<?php echo $form->error($model,'balanceUpay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'balanceVCB'); ?>
		<?php echo $form->textField($model,'balanceVCB'); ?>
		<?php echo $form->error($model,'balanceVCB'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userB88ag'); ?>
		<?php echo $form->textField($model,'userB88ag',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'userB88ag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passB88ag'); ?>
		<?php echo $form->textField($model,'passB88ag',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'passB88ag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pageCapt'); ?>
		<?php echo $form->textField($model,'pageCapt',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'pageCapt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keyB88ag'); ?>
		<?php echo $form->textField($model,'keyB88ag',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'keyB88ag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->