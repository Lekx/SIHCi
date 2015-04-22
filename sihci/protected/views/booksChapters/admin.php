<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Capitulo', 'url'=>array('index')),
	array('label'=>'Crear Capitulo', 'url'=>array('create')),
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

<h1>Administar Capitulos de Libros</h1>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'books-chapters-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'id_curriculum',
		'chapter_title',
		'book_title',
		'publishing_year',
		'publishers',
		/*
		'editorial',
		'volume',
		'pages',
		'citations',
		'total_of_authors',
		'area',
		'discipline',
		'subdiscipline',
		'creation_date',
		'url_doc',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
