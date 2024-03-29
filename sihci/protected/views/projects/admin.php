<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Proyectos'=>array('admin'),
	'Gestión',
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Invitaciones', 'url'=>array('/admin'),'itemOptions'=>array('class' => 'menuitem 2')),
	array('label'=>'Proyectos de Investigación', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'menuitem 1 now')),
		array('label'=>'Crear', 'url'=>array('projects/create'),'itemOptions'=>array('class' => 'sub')),
		array('label'=>'Gestionar', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'sub')),


	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#projects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");



?>

<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Gestionar proyectos de invitación:</h3>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projects-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		//'id_curriculum',
		array(
			'name'=>'is_sponsored',
			'type'=>'html','id'=>'is_sponsored','value'=>'CHtml::encode($data->is_sponsored)',
			'value'=>'$data->is_sponsored == "1" ? "Si" : "No"',
			
		),
		array('name'=>'Título','type'=>'html','id'=>'title','value'=>'CHtml::encode($data->title)'),

		//'title',
		array(
			'name'=>'discipline',
			'type'=>'html','id'=>'discipline','value'=>'CHtml::encode($data->discipline)',
			'value'=>'$data->discipline == "-1" ? "" : $data->discipline',
			
			),
		/*array(
			'name'=>'research_type',
			'value'=>'$data->research_type == "-1" ? "" : $data->research_type',
			),
		array(
			'name'=>'priority_topic',
			'value'=>'$data->priority_topic == "-1" ? "" : $data->priority_topic',
			),*/
		array(
			'name'=>'develop_uh',
			'type'=>'html','id'=>'develop_uh','value'=>'CHtml::encode($data->develop_uh)',
			'value'=>'$data->develop_uh == "-1" ? "" : $data->develop_uh',
			
			),

		array(
			'name'=>'folio',
			'type'=>'html','id'=>'folio','value'=>'CHtml::encode($data->folio)',
			'value'=>'$data->folio == "-1" ? "" : $data->folio',

			),

		array(
			'name'=>'registration_number',
			'type'=>'html','id'=>'registration_number','value'=>'CHtml::encode($data->registration_number)',
			'value'=>'$data->registration_number == "-1" ? "" : $data->registration_number',
			),
		array('name'=>'Estatus','type'=>'html','id'=>'status','value'=>'CHtml::encode($data->status)'),
			//'status',

		/*
		'sub_topic',
		'justify',
		'is_sni',
		
		'institution_colaboration',
		'national_institutions',
		'participant_institutions',
		'international_institutions_',
		'participant_institutions_international',
		'colaboration_type',
		'has_adtl_caracteristics_a',
		'adtl_caracteristics_a',
		'has_adtl_caracteristics_b',
		'adtl_caracteristics_b',
		'has_adtl_caracteristics_c',
		'adtl_caracteristics_c',
		'has_adtl_caracteristics_d',
		'adtl_caracteristics_d',
		'has_adtl_caracteristics_e',
		'adtl_caracteristics_e',
		'has_adtl_caracteristics_f',
		'adtl_caracteristics_f',
		'has_adtl_caracteristics_g',
		'adtl_caracteristics_g',

		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
