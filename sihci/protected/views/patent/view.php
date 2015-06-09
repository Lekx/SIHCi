<?php
/* @var $this PatentController */
/* @var $model Patent */

$this->breadcrumbs=array(
	'Patents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h3>Gestionar Registro de propiedad intelectual-Patentes:</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		/*'id',
		'id_curriculum',*/
		'country',
		'participation_type',
		'name',
		'state',
		'application_type',
		'application_number',
		'patent_type',
		'consession_date',
		'record',
		'presentation_date',
		'international_clasification',
		'title',
		'owner',
		'resumen',
		'industrial_exploitation',
		'resource_operator',
	),
)); ?>
