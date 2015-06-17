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
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Gestión Lineas De Investigación</h1>
            <hr>
        </div>

 <h3>Áreas de especialidad: <?php echo $model->specialty; ?></h3>


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
