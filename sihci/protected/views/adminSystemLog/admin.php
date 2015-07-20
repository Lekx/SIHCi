<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */
$this->breadcrumbs=array(
	'Bitácora'=>array('admin'),
	'Gestionar',
);
$this->menu=array(
	//array('label'=>'List SystemLog', 'url'=>array('index')),
	//array('label'=>'Create SystemLog', 'url'=>array('create')),
	array('label'=>'Exportar Bitácora a PDF', 'url'=>array('pdf')),
);

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

<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Bitacora</h1>
            <hr>
        </div>

<h3>Getionar:</h3>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'system-log-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',

	'columns'=>array(
			array('name'=>'Número de Movimiento','type'=>'html','id'=>'id','value'=>'CHtml::encode($data->id)'),
			array('header'=>'Nombre de usuario',
				'type'=>'html',
				'id'=>'id_user',
				'value'=>'Persons::model()->findByAttributes(array("id_user"=>$data->id_user)) != null ? Persons::model()->findByAttributes(array("id_user"=>$data->id_user))->names : "Usuario eliminado"'),
			array('name'=>'Sección','type'=>'html','id'=>'section','value'=>'CHtml::encode($data->section)'),
			array('name'=>'Detalles','type'=>'html','id'=>'details','value'=>'CHtml::encode($data->details)'),
			array('name'=>'Acción','type'=>'html','id'=>'action','value'=>'CHtml::encode($data->action)'),
			array('name'=>'Fecha','type'=>'html','id'=>'datetime','value'=>'CHtml::encode($data->datetime)'),


		array(
			'class'=>'CButtonColumn',
		),
	),
));
 ?>
