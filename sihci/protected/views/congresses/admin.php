<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'Listar Congreso', 'url'=>array('index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#congresses-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h3>Gestionar Registro de Participaci&oacuten en Congresos</h3>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'congresses-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'columns'=>array(

		array('name'=>'Título de trabajo','type'=>'html','id'=>'work_title','value'=>'CHtml::encode($data->work_title)'),
		array('name'=>'Congreso','type'=>'html','id'=>'congress','value'=>'CHtml::encode($data->congress)'),
		array('name'=>'Tipo','type'=>'html','id'=>'keywords','value'=>'CHtml::encode($data->keywords)'),
		array('name'=>'Año','type'=>'html','id'=>'year','value'=>'CHtml::encode($data->year)'),
		
		//'id',
		//'id_curriculum',
		//'work_title',
		//'year',
		//'congress',
		//'type',
		/*
		'country',
		'work_type',
		'keywords',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
