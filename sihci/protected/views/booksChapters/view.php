<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	$model->id, 
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear ', 'url'=>array('create')),
);
?>
						
 <h1>Capítulos de libros</h1> 
<?php $modelAuthor = BooksChaptersAuthors::model()->findAllByAttributes(array('id_books_chapters'=>$model->id));
	foreach ($modelAuthor as $key => $value){  ?>	
<?php 
	 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'id_curriculum',
		'chapter_title',
		'book_title',
		'publishing_year',
		'publishers',
		'editorial',
		//'volume',
		//'pages',
		//'citations',
		//'total_of_authors',
		'area',
		'discipline',
		'subdiscipline',
		//'creation_date',
		//'url_doc',
		 array(
			'label'=>'Archivo',
			'type'=>'raw',
			'value'=>CHtml::link('Ver archivo', Yii::app()->createUrl($model->url_doc), array("target"=>"_blank")),
			),
		array(
			'label'=>'Nombre(s)',
			'name'=>'names',
			'value'=>$value->names,
			),
		array(
			'label'=>'Apellido Paterno',
			'name'=>'last_names1',
			'value'=>$value->last_name1,
			),
		array(
			'label'=>'Apellido Materno',
			'name'=>'last_names2',
			'value'=>$value->last_name2,
			),
		array(
			'label'=>'Posición',
			'name'=>'positions',
			'value'=>$value->position,
			),  
	),

));  ?>
<?php }?>
