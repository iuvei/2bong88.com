<?php
/* @var $this OrderController */
/* @var $model Order */
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
		<?php echo $form->label($model,'type_order'); ?>
		<?php echo $form->textField($model,'type_order',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sended'); ?>
		<?php echo $form->textField($model,'sended'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_create'); ?>
		<?php echo $form->textField($model,'time_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ip'); ?>
		<?php echo $form->textField($model,'Ip',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdUser'); ?>
		<?php echo $form->textField($model,'IdUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'try'); ?>
		<?php echo $form->textField($model,'try'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'viewed'); ?>
		<?php echo $form->textField($model,'viewed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ToAccount'); ?>
		<?php echo $form->textField($model,'ToAccount',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AmountVND'); ?>
		<?php echo $form->textField($model,'AmountVND'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AmountUSD'); ?>
		<?php echo $form->textField($model,'AmountUSD'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ToAccountName'); ?>
		<?php echo $form->textField($model,'ToAccountName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ToBankName'); ?>
		<?php echo $form->textField($model,'ToBankName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cookie'); ?>
		<?php echo $form->textField($model,'Cookie',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FromAccount'); ?>
		<?php echo $form->textField($model,'FromAccount',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FromAccountName'); ?>
		<?php echo $form->textField($model,'FromAccountName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FromBankName'); ?>
		<?php echo $form->textField($model,'FromBankName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->