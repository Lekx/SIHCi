<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->title,
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Invitaciones', 'url'=>array('projects/sponsoredAdmin'),'itemOptions'=>array('class' => 'menuitem 2')),
	array('label'=>'Proyectos de Investigación', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'menuitem 1 now')),
		array('label'=>'Crear', 'url'=>array('projects/create'),'itemOptions'=>array('class' => 'sub')),
		array('label'=>'Gestionar', 'url'=>array('projects/admin'),'itemOptions'=>array('class' => 'sub')),


	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	
	);
?>


<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Gestionar proyectos de invitación: <?php echo $model->id ?></h3>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'title',
		'discipline',
		'research_type',
		'priority_topic',
		'sub_topic',
		'justify',
		'is_sni',
		'develop_uh',
		'institution_colaboration',
		'national_institutions',
		'participant_institutions',
		'international_institutions_',
		'participant_institutions_international',
		'colaboration_type',
		'adtl_caracteristics_a',
		'adtl_caracteristics_b',
		'adtl_caracteristics_c',
		'adtl_caracteristics_d',
		'adtl_caracteristics_e',
		'adtl_caracteristics_f',
		'adtl_caracteristics_g',
		'status',
		'folio',
		'is_sponsored',
		'registration_number',
	),
)); ?>
