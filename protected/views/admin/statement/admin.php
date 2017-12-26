<?php
/* @var $this StatementController */
/* @var $model Statement */

$this->breadcrumbs=array(
	'Statements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Statement', 'url'=>array('index')),
	array('label'=>'Create Statement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#statement-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Statements</h1>

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
	'id'=>'statement-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'username',
		array(
		
		'name'=>'time',
		'value'=>'date("d/m/y,H:i:s",$data->time)',
		),
		
		'turnover',
		'credit',
		'com',
		/*
		'balance',
		'type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('statement-grid');
    }
</script>
<div class="button-bottom">

    <?php echo CHtml::ajaxSubmitButton('Xóa tất cả', array('statement/AjaxUpdate', 'act' => 'doDeleteAll'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("Bạn có chắc chắn muốn xóa")
        }',)); ?>
		<?php echo CHtml::ajaxSubmitButton('Reset dữ liệu user', array('statement/ResetUser', 'act' => 'resetAll'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("bạn chắc muốn reset? toàn bộ credit và betCredit sẽ về 1000, outstanding và balance của user sẽ về 0???")
        }',)); ?>
	
</div>
<?php $this->endWidget(); ?>