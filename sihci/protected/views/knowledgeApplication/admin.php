<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */

$this->breadcrumbs=array(
	'Aplicación de conocimiento'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('index')),
	array('label'=>'Graduados de posgrado ', 'url'=>array('admin')),
	array('label'=>'Difusión de prensa ', 'url'=>array('admin')),
	array('label'=>'Aplicacion de conocimiento ', 'url'=>array('admin')),
	array('label'=>'Resgirtro patente ', 'url'=>array('admin')),
	array('label'=>'Resgirtro derecho de autor', 'url'=>array('admin')),
	array('label'=>'Resgirtro software', 'url'=>array('admin')),
	array('label'=>'Articulos y guías', 'url'=>array('admin')),
	array('label'=>'Libros ', 'url'=>array('admin')),
	array('label'=>'Capítulo de libros ', 'url'=>array('admin')),
	array('label'=>'Participación en congresos ', 'url'=>array('admin')),
	array('label'=>'Tesis Dirigidas ', 'url'=>array('admin')),
	array('label'=>'Certificaciones por consejos ', 'url'=>array('admin')),
	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	
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
