<?php


$this->menu=array(
	array('label'=>'Administrar Proyectos', 'url'=>array('adminProjects')),
);
?>
<h3>Detalles del proyecto: <h5><?php echo $model["title"];?></h5></h3>

<?php
// print_r($model);
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(

		array(	"name"=>'Encargado',
				"value"=>$model['names']),
		array(	"name"=>'Nombre del Proyecto',
				"value"=>$model['title']),
		array(	"name"=>'Disciplina',
				"value"=>$model['discipline']),
		array(	"name"=>'Tipo de Investigación',
				"value"=>$model['research_type']),
		array(	"name"=>'Tema prioritario',
				"value"=>$model['priority_topic']),
		array(	"name"=>'Subtema',
				"value"=>$model['sub_topic']),
		array(	"name"=>'Justificación',
				"value"=>$model['justify']),
		array(	"name"=>'Tiene SNI',
				"value"=>$model['is_sni'] == '1' ? "Si" : "No"),
		array(	"name"=>'Unidad Hopitalaria',
				"value"=>$model['develop_uh']),
		array(	"name"=>'Instituciones Internacionales Participantes',
				"value"=>$model['participant_institutions_international']),
		array(	"name"=>'Tipo de colaboración',
				"value"=>$model['colaboration_type']),
		array(	"name"=>'Caracteristica Adicional a)',
				"value"=>$model['adtl_caracteristics_a']),
		array(	"name"=>'Caracteristica Adicional b)',
				"value"=>$model['adtl_caracteristics_b']),
		array(	"name"=>'Caracteristica Adicional c)',
				"value"=>$model['adtl_caracteristics_c']),
		array(	"name"=>'Caracteristica Adicional d)',
				"value"=>$model['adtl_caracteristics_d']),
		array(	"name"=>'Caracteristica Adicional e)',
				"value"=>$model['adtl_caracteristics_e']),
		array(	"name"=>'Caracteristica Adicional f)',
				"value"=>$model['adtl_caracteristics_f']),
		array(	"name"=>'Caracteristica Adicional g)',
				"value"=>$model['adtl_caracteristics_g']),
		array(	"name"=>'Estatus',
				"value"=>$model['status']),
		array(	"name"=>'Folio',
				"value"=>$model['folio'] == -1 || $model['folio'] == "" ? "No asignado" : $model['folio']),
		array(	"name"=>'Es Patrocinado',
				"value"=>$model['is_sponsored'] == '1' ? "Si" : "No"),
		array(	"name"=>'Número de Registro',
					"value"=>$model['registration_number'] == -1 || $model['registration_number'] == "" ? "No asignado" : $model['registration_number']),
		array(	"name"=>'Fecha de Creación',
				"value"=>date("d/m/Y H:i:s", strtotime($model['creation_date']))),

				/// projects_coworkers
		array(	"name"=>'Nombre de Compañeros de Trabajo',
				"value"=>$model['fullname']),
			//projects_docs
		array(	"name"=>'Tipo de Documento',
				"value"=>$model['type']),
		array(	"name"=>'Path',
				"value"=>$model['path']),
		//projects_followups
		array(	"name"=>'Seguimientos',
				"value"=>$model['followup']),

	),
));?>
