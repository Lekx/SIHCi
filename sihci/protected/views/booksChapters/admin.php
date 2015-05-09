<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
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

<h1>Cap&iacute;tulos de libros</h1>

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
		array('name'=>'Cap&iacute;tulo de Libro','type'=>'html','id'=>'chapter_title','value'=>'CHtml::encode($data->chapter_title)'),
		array('name'=>'T&iacute;tulo de Libro','type'=>'html','id'=>'book_title','value'=>'CHtml::encode($data->book_title)'),
		array('name'=>'Año de publicaci&oacute;n','type'=>'html','id'=>'publishing_year','value'=>'CHtml::encode($data->publishing_year)'),
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
		//'creation_date',
		//'url_doc',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
