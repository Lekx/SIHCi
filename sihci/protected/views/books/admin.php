<?php
/* @var $this BooksController */
/* @var $model Books */
	//LI05-Listar registros
$this->breadcrumbs=array(
	'Books'=>array('index'),
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
	$('#books-grid').yiiGridView('update', {
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

<h3>Gestionar Registo de Libros</h3>


<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'books-grid',
	'dataProvider'=>$model->search(),
		'columns'=>array(

		array('name' =>'Título del libro', 'type'=>'html','id'=>'book_title','value'=>'CHtml::encode($data->book_title)'),
		array('name' => 'ISBN','type'=>'html','id'=>'isbn','value'=>'CHtml::encode($data->isbn)'),
		array('name' => 'Editorial','type'=>'html','id'=>'publisher','value'=>'CHtml::encode($data->publisher)'),
		array('name' =>'Edición', 'type'=>'html','id'=>'edition','value'=>'CHtml::encode($data->edition)'),
		array('name' => 'Volumen','type'=>'html','id'=>'volume','value'=>'CHtml::encode($data->volume)'),
		
		
		
		/*
		'id',
		'id_curriculum',
		'isbn',
		'book_title',
		'publisher',		
		'edition',
		'publishing_year',
		'release_date',
		'volume',
		'pages',
		'copies_issued',
		'work_type',
		'idioma',
		'traductor_type',
		'traductor',
		'area',
		'discipline',
		'subdiscipline',
		'path',
		'keywords',
		'creation_date',
		*/
		array('class'=>'CButtonColumn'),
	),
)); ?>
