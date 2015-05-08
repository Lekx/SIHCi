<?php
/* @var $this ArticlesGuidesController */
/* @var $model ArticlesGuides */

$this->breadcrumbs=array(
	'Articles Guides'=>array('index'),
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
	$('#articles-guides-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Artículos y Guías</h1>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'articles-guides-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'edicion',
		'editorial',
		'isbn',
		'volumen',
		'volumen_no',
		'article_type',
		'publishing_year',
		/*
		'id',
		'id_resume',
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
