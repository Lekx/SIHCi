<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $model AdminSpecialtyAreas */
//AE04-Listar datos
$this->breadcrumbs=array(
	'Admin Specialty Areases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Registro de <?php echo $model->specialty; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'specialty',
		'subspecialty',
	),
)); ?>


	<?php $modelSpecialtyAreas = AdSpecialtyAreas::model()->findAllByAttributes(array('id_specialty_areas'=>$model->id));
	 foreach ($modelSpecialtyAreas as $key => $value)
	 {  ?> 
		<?php 
			  $this->widget('zii.widgets.CDetailView', array(
			 'data'=>$model,
			 'attributes'=>array(
			  
			  array(
			   'label'=>'Subespecialidad',
			   'name'=>'names',
			   'value'=>$value->ext_subspecialty,
			   ),			  
			  ),

			 ));  
		?>
	<?php } ?>
