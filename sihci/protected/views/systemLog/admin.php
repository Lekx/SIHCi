
<?php
/* @var $this AdminSystemLogController */
/* @var $model SystemLog */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#system-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión</h1>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'system-log-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'id_user',
		'section',
		'details',
		'action',
		'datetime',
		
	),
)); ?>
