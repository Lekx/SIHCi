
<h1>Detalles #</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		array(	"name"=>'Email',
				"value"=>$model['email']),
		array(	"name"=>'Nombre(s)',
				"value"=>$model['names']),
		array(	"name"=>'Apellido paterno',
				"value"=>$model['last_name1']),
		array(	"name"=>'Apellido materno',
				"value"=>$model['last_name2']),
		array(	"name"=>'Estado civil',
				"value"=>$model['marital_status']),
		array(	"name"=>'Sexo',
				"value"=>$model['genre']),
		array(	"name"=>'Fecha de nacimiento',
				"value"=>$model['birth_date']),
		array(	"name"=>'Email',
				"value"=>$model['state_of_birth']),
		array(	"name"=>'Curp/Pasaporte',
				"value"=>$model['curp_passport']),
		array(	"name"=>'Foto',
				"value"=>$model['photo_url']),
		array(	"name"=>'RFC',
				"value"=>$model['person_rfc']),
		array(	"name"=>'Nombre de la empresa',
				"value"=>$model['sponsor_name']),
		array(	"name"=>'Tipo',
				"value"=>$model['type']),
		array(	"name"=>'Sitio Web',
				"value"=>$model['website']),
		array(	"name"=>'Sector',
				"value"=>$model['sector']),
		array(	"name"=>'Clase',
				"value"=>$model['class']),
		array(	"name"=>'Rama',
				"value"=>$model['branch']),
		array(	"name"=>'Actividad principal',
				"value"=>$model['main_activity']),
		array(	"name"=>'Estructura juridica',
				"value"=>$model['legal_structure']),
		array(	"name"=>'Numero de trabajadores',
				"value"=>$model['employeess_number']),
		array(	"name"=>'Tipo de contacto',
				"value"=>$model['typecontact']),
		array(	"name"=>'Valor',
				"value"=>$model['value']),
		array(	"name"=>'Nombre completo',
				"value"=>$model['fullname']),
		array(	"name"=>'Nombre del documento',
				"value"=>$model['file_name']),
		array(	"name"=>'Vista previa del documento',
				"value"=>$model['path']),
		


		
	),
));?>


