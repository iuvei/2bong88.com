<?php
/* @var $this BetDataController */
/* @var $model betData */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bet-data-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'BPstake'); ?>
		<?php echo $form->textField($model,'BPstake'); ?>
		<?php echo $form->error($model,'BPstake'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BPBetKey'); ?>
		<?php echo $form->textField($model,'BPBetKey',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'BPBetKey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'btnBPSubmit'); ?>
		<?php echo $form->textField($model,'btnBPSubmit',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'btnBPSubmit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HorseBPstake'); ?>
		<?php echo $form->textField($model,'HorseBPstake',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'HorseBPstake'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HorseBPBetKey'); ?>
		<?php echo $form->textField($model,'HorseBPBetKey',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'HorseBPBetKey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stakeRequest'); ?>
		<?php echo $form->textField($model,'stakeRequest',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'stakeRequest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oddsRequest'); ?>
		<?php echo $form->textField($model,'oddsRequest'); ?>
		<?php echo $form->error($model,'oddsRequest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oddChange1'); ?>
		<?php echo $form->textField($model,'oddChange1',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'oddChange1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oddChange2'); ?>
		<?php echo $form->textField($model,'oddChange2',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'oddChange2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MINBET'); ?>
		<?php echo $form->textField($model,'MINBET'); ?>
		<?php echo $form->error($model,'MINBET'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MAXBET'); ?>
		<?php echo $form->textField($model,'MAXBET'); ?>
		<?php echo $form->error($model,'MAXBET'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bettype'); ?>
		<?php echo $form->textField($model,'bettype'); ?>
		<?php echo $form->error($model,'bettype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lowerminmesg'); ?>
		<?php echo $form->textArea($model,'lowerminmesg',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'lowerminmesg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'highermaxmesg'); ?>
		<?php echo $form->textArea($model,'highermaxmesg',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'highermaxmesg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'areyousuremesg'); ?>
		<?php echo $form->textArea($model,'areyousuremesg',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'areyousuremesg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'areyousuremesg1'); ?>
		<?php echo $form->textArea($model,'areyousuremesg1',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'areyousuremesg1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'incorrectStakeMesg'); ?>
		<?php echo $form->textArea($model,'incorrectStakeMesg',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'incorrectStakeMesg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oddsWarning'); ?>
		<?php echo $form->textArea($model,'oddsWarning',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'oddsWarning'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'betconfirmmesg'); ?>
		<?php echo $form->textArea($model,'betconfirmmesg',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'betconfirmmesg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siteType'); ?>
		<?php echo $form->textField($model,'siteType'); ?>
		<?php echo $form->error($model,'siteType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidStake10'); ?>
		<?php echo $form->textField($model,'hidStake10',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'hidStake10'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidStake20'); ?>
		<?php echo $form->textField($model,'hidStake20',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'hidStake20'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidStake2'); ?>
		<?php echo $form->textField($model,'hidStake2',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'hidStake2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sporttype'); ?>
		<?php echo $form->textField($model,'sporttype'); ?>
		<?php echo $form->error($model,'sporttype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oddsType'); ?>
		<?php echo $form->textField($model,'oddsType'); ?>
		<?php echo $form->error($model,'oddsType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cbAcceptBetterOdds'); ?>
		<?php echo $form->textField($model,'cbAcceptBetterOdds'); ?>
		<?php echo $form->error($model,'cbAcceptBetterOdds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'matchid'); ?>
		<?php echo $form->textField($model,'matchid'); ?>
		<?php echo $form->error($model,'matchid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lblBetKind'); ?>
		<?php echo $form->textField($model,'lblBetKind',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lblBetKind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lblHome'); ?>
		<?php echo $form->textField($model,'lblHome',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lblHome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lblAway'); ?>
		<?php echo $form->textField($model,'lblAway',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lblAway'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lblLeaguename'); ?>
		<?php echo $form->textField($model,'lblLeaguename',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lblLeaguename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lbloddsStatus'); ?>
		<?php echo $form->textField($model,'lbloddsStatus',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lbloddsStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timeBet'); ?>
		<?php echo $form->textField($model,'timeBet'); ?>
		<?php echo $form->error($model,'timeBet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lblScoreValue'); ?>
		<?php echo $form->textField($model,'lblScoreValue',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lblScoreValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lblBetKindValue'); ?>
		<?php echo $form->textField($model,'lblBetKindValue',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lblBetKindValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lblSportKind'); ?>
		<?php echo $form->textField($model,'lblSportKind',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lblSportKind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lblChoiceValue'); ?>
		<?php echo $form->textField($model,'lblChoiceValue',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'lblChoiceValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'winLost'); ?>
		<?php echo $form->textField($model,'winLost'); ?>
		<?php echo $form->error($model,'winLost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipBet'); ?>
		<?php echo $form->textField($model,'ipBet',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ipBet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'haftScore'); ?>
		<?php echo $form->textField($model,'haftScore',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'haftScore'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fullScore'); ?>
		<?php echo $form->textField($model,'fullScore',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'fullScore'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->