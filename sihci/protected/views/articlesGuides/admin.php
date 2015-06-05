<?php
/* @var $this ArticlesGuidesController */
/* @var $model ArticlesGuides */

$this->breadcrumbs=array(
	'Articles Guides'=>array('index'),
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
	$('#articles-guides-grid').yiiGridView('update', {
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

<h3>Gestionar Registro de Artículos y Guías:</h3>


<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'articles-guides-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'columns'=>array(	
		
		array('name' =>'Título', 'type'=>'html','id'=>'title','value'=>'CHtml::encode($data->title)'),
		array('name' =>'Edición', 'type'=>'html','id'=>'edicion','value'=>'CHtml::encode($data->edicion)'),
		array('name' => 'Editorial','type'=>'html','id'=>'editorial','value'=>'CHtml::encode($data->editorial)'),
		array('name' => 'ISBN','type'=>'html','id'=>'isbn','value'=>'CHtml::encode($data->isbn)'),
		array('name' => 'Volumen','type'=>'html','id'=>'volumen','value'=>'CHtml::encode($data->volumen)'),
		array('name' => 'Número de volumen','type'=>'html','id'=>'volumen_no','value'=>'CHtml::encode($data->volumen_no)'),
		array('name' => 'Tipo de articulo','type'=>'html','id'=>'article_type','value'=>'CHtml::encode($data->article_type)'),
		array('name' => 'Año de publicación','type'=>'html','id'=>'publishing_year','value'=>'CHtml::encode($data->publishing_year)'),

		/*
		'edicion',
		'editorial',
		'isbn',
		'title',
		'volumen',
		'volumen_no',
		'article_type',
		'publishing_year',
		'start_page',
		'end_page',
		'copies_issued',
		'magazine',
		'area',
		'discipline',
		'subdiscipline',
		'url_document',
		'keywords',
		'type',
		'creation_date',
		'id',
		'id_resume',
		*/
		array('class'=>'CButtonColumn')),
)); ?>
