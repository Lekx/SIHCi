<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */
//DP06-Barra de búsqueda
$this->breadcrumbs=array(
	'Press Notes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#press-notes-grid').yiiGridView('update', {
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

<h4>Gestionar Difusiones de Prensa:</h4>

<div class="search-form" style="display:block" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'press-notes-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(

		array('name'=>'Tipo de participación','type'=>'html','id'=>'type','value'=>'CHtml::encode($data->type)'),
		array('name'=>'Dirigido a ','type'=>'html','id'=>'directed_to','value'=>'CHtml::encode($data->directed_to)'),
		array('name'=>'Título de la publicación','type'=>'html','id'=>'title','value'=>'CHtml::encode($data->title)'),
		array('name'=>'Dependencia responsable','type'=>'html','id'=>'responsible_agency','value'=>'CHtml::encode($data->responsible_agency)'),
		array('name'=>'Nota periodistica','type'=>'html','id'=>'note','value'=>'CHtml::encode($data->note)'),
		
		/*
		'id',
		'id_curriculum',
		'type',
		'directed_to',
		'date',
		'title',
		'responsible_agency',
		'note',
		'is_national',
		'creation_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
