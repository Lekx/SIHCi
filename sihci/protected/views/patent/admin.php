<?php
/* @var $this PatentController */
/* @var $model Patent */
$this->breadcrumbs=array(
	'Patents'=>array('index'),
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
    $('#patent-grid').yiiGridView('update', {
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

<h3>Gestionar Registro de propiedad intelectual-Patentes:</h3>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patent-grid',
	'dataProvider'=>$model->search(),
    'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'columns'=>array(
		
		array('name'=>'Nombre','type'=>'html','id'=>'name','value'=>'CHtml::encode($data->name)'),
		array('name'=>'Propietario ','type'=>'html','id'=>'owner','value'=>'CHtml::encode($data->owner)'),
		array('name'=>'Número de registro o de solicitud','type'=>'html','id'=>'application_number','value'=>'CHtml::encode($data->application_number)'),
		array('name'=>'Estado de la patente','type'=>'html','id'=>'state','value'=>'CHtml::encode($data->state)'),
		array('name'=>'Tipo de aplicación','type'=>'html','id'=>'application_type','value'=>'CHtml::encode($data->application_type)'),
		
		/*'id',
		'name',
		'presentation_date',
		'owner',
		'application_number',
		'state',
		'application_type',
		'country',
		'participation_type',
		'id_curriculum',
		'patent_type',
		'consession_date',
		'record',
		'international_clasification',
		'title',
		'resumen',
		'industrial_exploitation',
		'resource_operator',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>