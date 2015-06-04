<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */

$this->breadcrumbs=array(
	'Directed Thesises'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear ', 'url'=>array('create')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h3>Gestionar Registro de Tesis Dirigidas: <?php echo $model->title; ?></h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
     'htmlOptions'=>array('class'=>'detail-view','enctype'=>'multipart/form-data'),
	'attributes'=>array(
		//'id',
		//'id_curriculum',
		'title',
		'conclusion_date',
		'author',
		array(               
                'label'=>'Archivo',
                'type'=>'raw',
                'value'=>CHtml::link('Ver archivo', Yii::app()->baseUrl.$model->path,array("target"=>"_blank")),
             ),
		//'path',
		'grade',
		'sector',
		'organization',	
		'second_level',
		'area',
		'discipline',
		'subdisciplina',
	),
	 
	
)); ?>
