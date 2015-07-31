<?php


$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Patrocinios', 'url'=>array('sponsorship/admin'),'itemOptions'=>array('class' => 'menuitem 1 now')),
		array('label'=>'Crear', 'url'=>array('sponsorship/create'),'itemOptions'=>array('class' => 'sub')),
		array('label'=>'Gestionar', 'url'=>array('sponsorship/admin'),'itemOptions'=>array('class' => 'sub')),


	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),

	);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/ProgramasDesarrolloTecnologico.png" alt="">
            <h1>Proyectos</h1>
            <hr>
        </div>

<h3>Gestionar patrocinio: <?php echo $model->project_name; ?></h3>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user_sponsorer',
		'id_user_researcher',
		'project_name',
		'description',
		'keywords',
		'status',
	),
)); ?>
