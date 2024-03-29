<h1>Detalles #</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		
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
		array(	"name"=>'Pais',
				"value"=>$model['country']),
		//Table adreesess
		array(	"name"=>'Codigo Postal',
				"value"=>$model['zip_code']),
		array(	"name"=>'Estado',
				"value"=>$model['state']),
		array(	"name"=>'Delegacion',
				"value"=>$model['delegation']),
		array(	"name"=>'Ciudad',
				"value"=>$model['city']),
		array(	"name"=>'Municipio',
				"value"=>$model['town']),
		array(	"name"=>'Colonia',
				"value"=>$model['colony']),
		array(	"name"=>'Calle',
				"value"=>$model['street']),
		array(	"name"=>'Número interno',
				"value"=>$model['internal_number']),
		array(	"name"=>'Número externo',
				"value"=>$model['external_number']),
		//Table Docs_identity
		array(	"name"=>'Tipo',
				"value"=>$model['type']),
		array(	"name"=>'Descripción',
				"value"=>$model['description']),
		array(	"name"=>'Tipo de identificacion',
				"value"=>$model['doc_id']),
		array(	"name"=>'Documento Principal?',
				"value"=>$model['is_Primary']),
		//table phones
		array(	"name"=>'Tipo',
				"value"=>$model['type']),
		array(	"name"=>'Código del país',
				"value"=>$model['country_code']),
		array(	"name"=>'Código local',
				"value"=>$model['local_area_code']),
		array(	"name"=>'Extensión',
				"value"=>$model['extension']),
		array(	"name"=>'Principal?',
				"value"=>$model['is_primary']),
		//Table Emails
		array(	"name"=>'Email',
				"value"=>$model['email']),
		array(	"name"=>'Tipo',
				"value"=>$model['type']),
		//table Curriculum
		array(	"name"=>'Ciudad de nacimiento',
				"value"=>$model['native_country']),
		array(	"name"=>'Lenguaa materna',
				"value"=>$model['native_language']),
		array(	"name"=>'Estado',
				"value"=>$model['status']),
		array(	"name"=>'SNI',
				"value"=>$model['SNI']),
		array(	"name"=>'Titulo del invesitgador',
				"value"=>$model['researcher_title']),
		//table Jobs
		array(	"name"=>'Nombre de la organización',
				"value"=>$model['organization']),
		array(	"name"=>'Área',
				"value"=>$model['area']),
		array(	"name"=>'Titulo',
				"value"=>$model['title']),
		array(	"name"=>'Dia de inicio',
				"value"=>$model['start_day']),
		array(	"name"=>'Mes de inicio',
				"value"=>$model['start_month']),
		array(	"name"=>'Año de inicio',
				"value"=>$model['start_year']),
		array(	"name"=>'Unidad hospitalaria',
				"value"=>$model['hospital_unit']),
		array(	"name"=>'RUD',
				"value"=>$model['rud']),
		array(	"name"=>'Horario',
				"value"=>$model['schedule']),
		//Table research_areas
		array(	"name"=>'Nombre',
				"value"=>$model['name']),
		//Table grades
		array(	"name"=>'País',
				"value"=>$model['country']),
		array(	"name"=>'Grado',
				"value"=>$model['grade']),
		array(	"name"=>'Numero de cedula',
				"value"=>$model['writ_number']),
		array(	"name"=>'Titulo',
				"value"=>$model['title']),
		array(	"name"=>'Fecha de obtención del titulo',
				"value"=>$model['obtention_date']),
		array(	"name"=>'Estado',
				"value"=>$model['status']),
		array(	"name"=>'Sector',
				"value"=>$model['sector']),
		array(	"name"=>'Institución',
				"value"=>$model['institution']),
		array(	"name"=>'Titulo de la tesis',
				"value"=>$model['thesis_title']),
		array(	"name"=>'Area',
				"value"=>$model['area']),
		array(	"name"=>'Diciplina',
				"value"=>$model['discipline']),
		array(	"name"=>'SubDiciplina',
				"value"=>$model['subdiscipline']),


		

		
	),
));?>


