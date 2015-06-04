<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */

$this->breadcrumbs=array(
	'Aplicación de conocimiento'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#knowledge-application-grid').yiiGridView('update', {
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

<h4>Gestionar Aplicación del Conocimiento:</h4>


<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'knowledge-application-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		
		array('name'=>'Pregunta 1','type'=>'html','id'=>'term1','value'=>'CHtml::encode($data->term1)'),
		array('name'=>'Pregunta 2','type'=>'html','id'=>'term2','value'=>'CHtml::encode($data->term2)'),
		array('name'=>'Pregunta 3','type'=>'html','id'=>'term3','value'=>'CHtml::encode($data->term3)'),
		array('name'=>'Pregunta 4','type'=>'html','id'=>'term4','value'=>'CHtml::encode($data->term4)'),
		array('name'=>'Pregunta 5','type'=>'html','id'=>'term5','value'=>'CHtml::encode($data->term5)'),

		/*
		'id',
		'id_curriculum',
		'term1',
		'term2',
		'term3',
		'term4',
		'term5',
		*/

	array('class'=>'CButtonColumn'),
	),
)); ?>
