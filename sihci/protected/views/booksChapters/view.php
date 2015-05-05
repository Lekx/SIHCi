<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */

$this->breadcrumbs=array(
	'Books Chapters'=>array('index'),
	$model->id, 
);

$this->menu=array(
	//array('label'=>'Listar Capitulo', 'url'=>array('index')),
	array('label'=>'Crear ', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro de eliminar este registro?')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>
						
 <h1>Cap&iacutetulos de libros</h1> 

<?php $this->widget('zii.widgets.CDetailView', array(
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
		'url_doc',
		 array(
			'label'=>'Archivo',
			'type'=>'raw',
			'value'=>CHtml::link('Ver archivo', Yii::app()->createUrl($model->url_doc), array("target"=>"_blank")),
			),	
		array(
			'label'=>'Nombre(s)',
			'name'=>'names',
			'value'=>BooksChaptersAuthors::model()->findByAttributes(array('id_books_chapters'=>$model->id))->names,
			),
		array(
			'label'=>'Apellido Paterno',
			'name'=>'last_names1',
			'value'=>BooksChaptersAuthors::model()->findByAttributes(array('id_books_chapters'=>$model->id))->last_name1,
			),
		array(
			'label'=>'Apellido Materno',
			'name'=>'last_names2',
			'value'=>BooksChaptersAuthors::model()->findByAttributes(array('id_books_chapters'=>$model->id))->last_name2,
			),
		array(
			'label'=>'Posición',
			'name'=>'positions',
			'value'=>BooksChaptersAuthors::model()->findByAttributes(array('id_books_chapters'=>$model->id))->position,
			),
	
		
	),

)); ?>
