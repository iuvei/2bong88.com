<?php
/* @var $this BetDataController */
/* @var $model betData */

$this->breadcrumbs=array(
	'Bet Datas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List betData', 'url'=>array('index')),
	array('label'=>'Create betData', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bet-data-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Bet Datas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableAjaxValidation' => TRUE,
        ));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bet-data-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'BPstake',
		'username',
		/*'BPBetKey',*/
		/*'btnBPSubmit',*/
		'bettype',
		'lbloddsStatus',
		'lblHome',
		'lblAway',
		'lblBetKind',
		
		'lblBetKindValue',
		'haftScore',
		'fullScore',
		'winLost',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('bet-data-grid');
    }
</script>
<div class="button-bottom">

    <?php echo CHtml::ajaxSubmitButton('Xóa tất cả', array('betData/AjaxUpdate', 'act' => 'doDeleteAll'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("Bạn có chắc chắn muốn xóa")
        }',)); ?>
	
</div>
<?php $this->endWidget(); ?>
