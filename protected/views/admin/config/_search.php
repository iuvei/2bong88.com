<?php
/* @var $this ConfigController */
/* @var $model Config */
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
		<?php echo $form->label($model,'siteTitle'); ?>
		<?php echo $form->textField($model,'siteTitle',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'siteKeyword'); ?>
		<?php echo $form->textField($model,'siteKeyword',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'siteDes'); ?>
		<?php echo $form->textField($model,'siteDes',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IMEI'); ?>
		<?php echo $form->textField($model,'IMEI',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'key'); ?>
		<?php echo $form->textField($model,'key',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'option_auto'); ?>
		<?php echo $form->textField($model,'option_auto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yahoo'); ?>
		<?php echo $form->textField($model,'yahoo',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Viber'); ?>
		<?php echo $form->textField($model,'Viber',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Skype'); ?>
		<?php echo $form->textField($model,'Skype',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Facebook'); ?>
		<?php echo $form->textField($model,'Facebook',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fanpage'); ?>
		<?php echo $form->textField($model,'Fanpage',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copyright'); ?>
		<?php echo $form->textField($model,'copyright',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'siteOffline'); ?>
		<?php echo $form->textField($model,'siteOffline'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'textOffline'); ?>
		<?php echo $form->textArea($model,'textOffline',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'supportContent'); ?>
		<?php echo $form->textArea($model,'supportContent',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guideContent'); ?>
		<?php echo $form->textArea($model,'guideContent',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allowReg'); ?>
		<?php echo $form->textField($model,'allowReg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GetBalance'); ?>
		<?php echo $form->textField($model,'GetBalance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'balancePm'); ?>
		<?php echo $form->textField($model,'balancePm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'balanceUpay'); ?>
		<?php echo $form->textField($model,'balanceUpay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'balanceVCB'); ?>
		<?php echo $form->textField($model,'balanceVCB'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userB88ag'); ?>
		<?php echo $form->textField($model,'userB88ag',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passB88ag'); ?>
		<?php echo $form->textField($model,'passB88ag',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pageCapt'); ?>
		<?php echo $form->textField($model,'pageCapt',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keyB88ag'); ?>
		<?php echo $form->textField($model,'keyB88ag',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->