<?php
/* @var $this BooksController */
/* @var $model Books */

$this->breadcrumbs=array(
	'Books'=>array('index'),
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
	$('#books-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Libros</h1>


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
