<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */

$this->breadcrumbs=array(
	'Knowledge Applications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está usted seguro de eliminar este registro?')),
	//array('label'=>'Desplagar', 'url'=>array('index')),
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h4>Registro de aplicación del conocimiento con fecha <?php echo '"'.substr($model->creation_date, 0, 10).'"'; ?></h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		/*'id',
		'id_curriculum',*/
		'term1',
		'term2',
		'term3',
		'term4',
		'term5',
	),
)); ?>
