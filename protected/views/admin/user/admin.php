<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

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
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'username',
		'password',
		'fullName',
		'betCredit',
		'ipLogin',
		/*
		'yesterdayBalance',
		'betCredit',
		'outStanding',
		'memberTurnover',
		'lastLogin',
		'ipLogin',
		'status',
		'Payname',
		'PayAccount',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<script>
    function reloadGrid(data) {
        $.fn.yiiGridView.update('user-grid');
    }
</script>
<div class="button-bottom">

    <?php echo CHtml::ajaxSubmitButton('Xóa tất cả', array('user/AjaxUpdate', 'act' => 'doDeleteAll'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("Bạn có chắc chắn muốn xóa")
        }',)); ?>
		<?php echo CHtml::ajaxSubmitButton('Reset dữ liệu user', array('user/AjaxUpdate', 'act' => 'resetAll'), array('success' => 'reloadGrid', 'beforeSend' => 'function(){
            return confirm("bạn chắc muốn reset? toàn bộ credit và betCredit sẽ về 1000, outstanding và balance của user sẽ về 0???")
        }',)); ?>
	
</div>
<?php $this->endWidget(); ?>
