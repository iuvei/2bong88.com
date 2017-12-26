<?php
/* @var $this BetDataController */
/* @var $model betData */
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
		<?php echo $form->label($model,'BPstake'); ?>
		<?php echo $form->textField($model,'BPstake'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BPBetKey'); ?>
		<?php echo $form->textField($model,'BPBetKey',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'btnBPSubmit'); ?>
		<?php echo $form->textField($model,'btnBPSubmit',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HorseBPstake'); ?>
		<?php echo $form->textField($model,'HorseBPstake',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HorseBPBetKey'); ?>
		<?php echo $form->textField($model,'HorseBPBetKey',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stakeRequest'); ?>
		<?php echo $form->textField($model,'stakeRequest',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oddsRequest'); ?>
		<?php echo $form->textField($model,'oddsRequest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oddChange1'); ?>
		<?php echo $form->textField($model,'oddChange1',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oddChange2'); ?>
		<?php echo $form->textField($model,'oddChange2',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MINBET'); ?>
		<?php echo $form->textField($model,'MINBET'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MAXBET'); ?>
		<?php echo $form->textField($model,'MAXBET'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bettype'); ?>
		<?php echo $form->textField($model,'bettype'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lowerminmesg'); ?>
		<?php echo $form->textArea($model,'lowerminmesg',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'highermaxmesg'); ?>
		<?php echo $form->textArea($model,'highermaxmesg',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'areyousuremesg'); ?>
		<?php echo $form->textArea($model,'areyousuremesg',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'areyousuremesg1'); ?>
		<?php echo $form->textArea($model,'areyousuremesg1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incorrectStakeMesg'); ?>
		<?php echo $form->textArea($model,'incorrectStakeMesg',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oddsWarning'); ?>
		<?php echo $form->textArea($model,'oddsWarning',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'betconfirmmesg'); ?>
		<?php echo $form->textArea($model,'betconfirmmesg',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'siteType'); ?>
		<?php echo $form->textField($model,'siteType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidStake10'); ?>
		<?php echo $form->textField($model,'hidStake10',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidStake20'); ?>
		<?php echo $form->textField($model,'hidStake20',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidStake2'); ?>
		<?php echo $form->textField($model,'hidStake2',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sporttype'); ?>
		<?php echo $form->textField($model,'sporttype'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oddsType'); ?>
		<?php echo $form->textField($model,'oddsType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cbAcceptBetterOdds'); ?>
		<?php echo $form->textField($model,'cbAcceptBetterOdds'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'matchid'); ?>
		<?php echo $form->textField($model,'matchid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lblBetKind'); ?>
		<?php echo $form->textField($model,'lblBetKind',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lblHome'); ?>
		<?php echo $form->textField($model,'lblHome',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lblAway'); ?>
		<?php echo $form->textField($model,'lblAway',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lblLeaguename'); ?>
		<?php echo $form->textField($model,'lblLeaguename',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lbloddsStatus'); ?>
		<?php echo $form->textField($model,'lbloddsStatus',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeBet'); ?>
		<?php echo $form->textField($model,'timeBet'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lblScoreValue'); ?>
		<?php echo $form->textField($model,'lblScoreValue',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lblBetKindValue'); ?>
		<?php echo $form->textField($model,'lblBetKindValue',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lblSportKind'); ?>
		<?php echo $form->textField($model,'lblSportKind',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lblChoiceValue'); ?>
		<?php echo $form->textField($model,'lblChoiceValue',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'winLost'); ?>
		<?php echo $form->textField($model,'winLost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ipBet'); ?>
		<?php echo $form->textField($model,'ipBet',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'haftScore'); ?>
		<?php echo $form->textField($model,'haftScore',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fullScore'); ?>
		<?php echo $form->textField($model,'fullScore',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->