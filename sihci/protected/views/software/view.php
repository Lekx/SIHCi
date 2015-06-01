<?php
/* @var $this SoftwareController */
/* @var $model Software */

$this->breadcrumbs=array(
	'Softwares'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
	
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h3>Gestionar Registro de propiedad intelectual-Software: <?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		/*'id',
		'id_curriculum',*/

		'country',
		'participation_type',
		'title',
		'beneficiary',
		'entity',
		'manwork_hours',
		'end_date',
		'sector',
		'organization',
		'second_level',
		'resumen',
		'objective',
		'contribution',
		'impact_value',
		'innovation_trascen',
		'transfer_mechanism',
		'hr_formation',
		'economic_support',
		array(
			'label'=>'Archivo',
			'type'=>'raw',
			'value'=>CHtml::link('Ver archivo', Yii::app()->baseUrl.$model->path,array("target"=>"_blank")),
		),
		/*'creation_date',
		'path',*/
	),
)); ?>
