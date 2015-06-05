<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
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
	$('#books-chapters-grid').yiiGridView('update', {
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
<h3>Gestionar Registro de Cap&iacute;tulos de libros:</h3>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'books-chapters-grid',
	'dataProvider'=>$model->search(),
	'filterPosition'=>'header',
    'selectableRows'=>1,
    'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('view').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'columns'=>array(
		//'id',
		//'id_curriculum',
		array('name'=>'ISBN','type'=>'html','id'=>'isbn','value'=>'CHtml::encode($data->isbn)'),
		array('name'=>'Cap&iacute;tulo de Libro','type'=>'html','id'=>'chapter_title','value'=>'CHtml::encode($data->chapter_title)'),
		array('name'=>'T&iacute;tulo de Libro','type'=>'html','id'=>'book_title','value'=>'CHtml::encode($data->book_title)'),
		array('name'=>'Editores','type'=>'html','id'=>'publishers','value'=>'CHtml::encode($data->publishers)'),
		array('name'=>'Editorial','type'=>'html','id'=>'editorial','value'=>'CHtml::encode($data->editorial)'),
		array('name'=>'Área','type'=>'html','id'=>'area','value'=>'CHtml::encode($data->area)'),
		//'editorial',
		//'volume',
		//'pages',
		//'citations',
		//'total_of_authors',
		//'area',
		'discipline',
		'subdiscipline',
		'keywords', 
		//'creation_date',
		//'url_doc',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
