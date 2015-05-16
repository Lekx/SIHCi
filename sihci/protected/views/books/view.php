<?php
/* @var $this BooksController */
/* @var $model Books */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Registro <?php echo $model->book_title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'isbn',
		'book_title',
		'publisher',
		'editorial',
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
		'keywords',
		array(
			'label'=>'Archivo',
			'type'=>'raw',
			'value'=>CHtml::link('Ver archivo', Yii::app()->baseUrl.$model->path,array("target"=>"_blank")),
		),
		/*
		'id',
		'id_curriculum',
		'creation_date',
		*/
	),
)); ?>

	<?php $modelAuthor = BooksAuthors::model()->findAllByAttributes(array('id_book'=>$model->id));
	 foreach ($modelAuthor as $key => $value)
	 {  ?> 
		<?php 
			  $this->widget('zii.widgets.CDetailView', array(
			 'data'=>$model,
			 'attributes'=>array(
			  
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

			));  
		?>
	<?php } ?>
