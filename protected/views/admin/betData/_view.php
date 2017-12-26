<?php
/* @var $this BetDataController */
/* @var $data betData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BPstake')); ?>:</b>
	<?php echo CHtml::encode($data->BPstake); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BPBetKey')); ?>:</b>
	<?php echo CHtml::encode($data->BPBetKey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('btnBPSubmit')); ?>:</b>
	<?php echo CHtml::encode($data->btnBPSubmit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HorseBPstake')); ?>:</b>
	<?php echo CHtml::encode($data->HorseBPstake); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HorseBPBetKey')); ?>:</b>
	<?php echo CHtml::encode($data->HorseBPBetKey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stakeRequest')); ?>:</b>
	<?php echo CHtml::encode($data->stakeRequest); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('oddsRequest')); ?>:</b>
	<?php echo CHtml::encode($data->oddsRequest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oddChange1')); ?>:</b>
	<?php echo CHtml::encode($data->oddChange1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oddChange2')); ?>:</b>
	<?php echo CHtml::encode($data->oddChange2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MINBET')); ?>:</b>
	<?php echo CHtml::encode($data->MINBET); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MAXBET')); ?>:</b>
	<?php echo CHtml::encode($data->MAXBET); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bettype')); ?>:</b>
	<?php echo CHtml::encode($data->bettype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lowerminmesg')); ?>:</b>
	<?php echo CHtml::encode($data->lowerminmesg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('highermaxmesg')); ?>:</b>
	<?php echo CHtml::encode($data->highermaxmesg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('areyousuremesg')); ?>:</b>
	<?php echo CHtml::encode($data->areyousuremesg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('areyousuremesg1')); ?>:</b>
	<?php echo CHtml::encode($data->areyousuremesg1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incorrectStakeMesg')); ?>:</b>
	<?php echo CHtml::encode($data->incorrectStakeMesg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oddsWarning')); ?>:</b>
	<?php echo CHtml::encode($data->oddsWarning); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('betconfirmmesg')); ?>:</b>
	<?php echo CHtml::encode($data->betconfirmmesg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('siteType')); ?>:</b>
	<?php echo CHtml::encode($data->siteType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidStake10')); ?>:</b>
	<?php echo CHtml::encode($data->hidStake10); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidStake20')); ?>:</b>
	<?php echo CHtml::encode($data->hidStake20); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidStake2')); ?>:</b>
	<?php echo CHtml::encode($data->hidStake2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sporttype')); ?>:</b>
	<?php echo CHtml::encode($data->sporttype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oddsType')); ?>:</b>
	<?php echo CHtml::encode($data->oddsType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cbAcceptBetterOdds')); ?>:</b>
	<?php echo CHtml::encode($data->cbAcceptBetterOdds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('matchid')); ?>:</b>
	<?php echo CHtml::encode($data->matchid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lblBetKind')); ?>:</b>
	<?php echo CHtml::encode($data->lblBetKind); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lblHome')); ?>:</b>
	<?php echo CHtml::encode($data->lblHome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lblAway')); ?>:</b>
	<?php echo CHtml::encode($data->lblAway); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lblLeaguename')); ?>:</b>
	<?php echo CHtml::encode($data->lblLeaguename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lbloddsStatus')); ?>:</b>
	<?php echo CHtml::encode($data->lbloddsStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeBet')); ?>:</b>
	<?php echo CHtml::encode($data->timeBet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lblScoreValue')); ?>:</b>
	<?php echo CHtml::encode($data->lblScoreValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lblBetKindValue')); ?>:</b>
	<?php echo CHtml::encode($data->lblBetKindValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lblSportKind')); ?>:</b>
	<?php echo CHtml::encode($data->lblSportKind); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lblChoiceValue')); ?>:</b>
	<?php echo CHtml::encode($data->lblChoiceValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('winLost')); ?>:</b>
	<?php echo CHtml::encode($data->winLost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipBet')); ?>:</b>
	<?php echo CHtml::encode($data->ipBet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('haftScore')); ?>:</b>
	<?php echo CHtml::encode($data->haftScore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullScore')); ?>:</b>
	<?php echo CHtml::encode($data->fullScore); ?>
	<br />

	*/ ?>

</div>