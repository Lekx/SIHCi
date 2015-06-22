<h1>Detalles del patrocinio: <?php echo $model["project_name"];?> </h1>

<?php 
// print_r($model);
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		
		array(	"name"=>'Encargado',
				"value"=>$model['sponsor_name']),
		array(	"name"=>'Nombre del Proyecto',
				"value"=>$model['project_name']),
		array(	"name"=>'Descripción',
				"value"=>$model['description']),
		array(	"name"=>'Palabras Claves',
				"value"=>$model['keywords']),
		array(	"name"=>'Estatus',
				"value"=>$model['status']),
		array(	"name"=>'Fecha de Creación',
				"value"=>$model['creation_date']),
		
	),
));?>
