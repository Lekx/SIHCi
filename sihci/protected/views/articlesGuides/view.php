<?php
/* @var $this ArticlesGuidesController */
/* @var $model ArticlesGuides */

$this->breadcrumbs=array(
	'Articles Guides'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create'))
	);
?>

<h1>Registro  <?php echo $model->isbn; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'isbn',
		'title',
		'editorial',
		'edicion',
		'publishing_year',
		'volumen',
		'volumen_no',
		'start_page',
		'end_page',
		'article_type',
		'copies_issued',
		'magazine',
		'area',
		'discipline',
		'subdiscipline',
		'keywords',
		'type',
		array(
			'label'=>'Archivo',
			'type'=>'raw',
			'value'=>CHtml::link('Ver archivo', Yii::app()->baseUrl.$model->url_document,array("target"=>"_blank")),
		),
		/*'url_document',
		'id',
		'id_resume',
		'creation_date',*/
	),
)); ?>
<?php $modelAuthor = ArtGuidesAuthor::model()->findAllByAttributes(array('id_art_guides'=>$model->id));
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
