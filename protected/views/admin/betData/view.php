<?php
/* @var $this BetDataController */
/* @var $model betData */

$this->breadcrumbs=array(
	'Bet Datas'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List betData', 'url'=>array('index')),
	array('label'=>'Create betData', 'url'=>array('create')),
	array('label'=>'Update betData', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete betData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage betData', 'url'=>array('admin')),
);
?>

<h1>View betData #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'BPstake',
		'BPBetKey',
		'btnBPSubmit',
		'HorseBPstake',
		'HorseBPBetKey',
		'stakeRequest',
		'oddsRequest',
		'oddChange1',
		'oddChange2',
		'MINBET',
		'MAXBET',
		'bettype',
		'lowerminmesg',
		'highermaxmesg',
		'areyousuremesg',
		'areyousuremesg1',
		'incorrectStakeMesg',
		'oddsWarning',
		'betconfirmmesg',
		'siteType',
		'hidStake10',
		'hidStake20',
		'hidStake2',
		'sporttype',
		'username',
		'oddsType',
		'cbAcceptBetterOdds',
		'matchid',
		'lblBetKind',
		'lblHome',
		'lblAway',
		'lblLeaguename',
		'lbloddsStatus',
		'timeBet',
		'lblScoreValue',
		'lblBetKindValue',
		'lblSportKind',
		'lblChoiceValue',
		'winLost',
		'ipBet',
		'haftScore',
		'fullScore',
	),
)); ?>
