
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1><?php echo $model['names'].' '.$model['last_name1'].' '.$model['last_name2']; ?></h1>
            <hr>
        </div>

 <h3>Datos del representante:</h3>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(

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

		array(	"name"=>'Curp/pasaporte',
				"value"=>$model['curp_passport']),

		array(	"name"=>'Foto','type'=>'raw',
    "value"=>(array_key_exists('photo_url', $model) ? "<a href='".Yii::app()->request->baseUrl.$model['photo_url']."' target='_blank'><img src='".Yii::app()->request->baseUrl.$model['photo_url']."' style='width:75px;height:auto;'></a>" : "")),


		array(	"name"=>'RFC',
				"value"=>$model['person_rfc']),
		array(	"name"=>'Pais',
				"value"=>$model['country']),
		//Table adreesess
		array(	"name"=>'Codigo postal',
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
		array(	"name"=>'Descripción',
				"value"=>$model['description']),
		array(	"name"=>'Tipo de identificacion','type'=>'raw',
    "value"=>(array_key_exists('doc_id', $model) ? "<a href='".Yii::app()->request->baseUrl.$model['doc_id']."' target='_blank'><img src='".Yii::app()->request->baseUrl.$model['doc_id']."' style='width:75px;height:auto;'></a>" : "")),
		array(	"name"=>'Documento principal',
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
		array(	"name"=>'Principal',
				"value"=>$model['is_primary']),
		//table Curriculum
		array(	"name"=>'Ciudad de nacimiento',
				"value"=>$model['native_country']),
		array(	"name"=>'Lengua materna',
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
		array(	"name"=>'Número de cedula',
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
		array(	"name"=>'Subdiciplina',
				"value"=>$model['subdiscipline']),





	),
));?>

<?php
$this->menu=array(

    array('label'=>'Manejador de Archivos ', 'url'=>array('FilesManager/admin'),'itemOptions'=>array('class' => 'menuitem 1 now')),
        array('label'=>'Gestionar', 'url'=>array('FilesManager/admin'),'itemOptions'=>array('class' => 'sub')),
        array('label'=>'Crear', 'url'=>array('FilesManager/create'),'itemOptions'=>array('class' => 'sub')),

//postdegreeGraduates
    array('label'=>'Gestión de usuarios ', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'menuitem 2')),
        array('label'=>'Gestionar', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'sub2')),
        array('label'=>'Crear', 'url'=>array('AdminUsers/CreateUser'),'itemOptions'=>array('class' => 'sub2')),
//knowledgeApplication
    array('label'=>'Gestión de proyectos', 'url'=>array('knowledgeApplication/admin'),'itemOptions'=>array('class' => 'menuitem 3')),
        array('label'=>'Gestionar', 'url'=>array('knowledgeApplication/admin'),'itemOptions'=>array('class' => 'sub3')),
        array('label'=>'Crear', 'url'=>array('knowledgeApplication/create'),'itemOptions'=>array('class' => 'sub3')),
//patent
    array('label'=>'Respaldos', 'url'=>array('adminBackups/admin'),'itemOptions'=>array('class' => 'menuitem 4')),
//copyrights
    array('label'=>'Áreas de especialidad', 'url'=>array('adminSpecialtyAreas/admin'),'itemOptions'=>array('class' => 'menuitem 5')),
            array('label'=>'Gestionar', 'url'=>array('adminSpecialtyAreas/admin'),'itemOptions'=>array('class' => 'sub5')),
            array('label'=>'Crear', 'url'=>array('adminSpecialtyAreas/create'),'itemOptions'=>array('class' => 'sub5')),
//copyrights
    array('label'=>'Lineas de investigación', 'url'=>array('adminResearchAreas/admin'),'itemOptions'=>array('class' => 'menuitem 6')),
            array('label'=>'Gestionar', 'url'=>array('adminResearchAreas/admin'),'itemOptions'=>array('class' => 'sub6')),
            array('label'=>'Crear', 'url'=>array('adminResearchAreas/create'),'itemOptions'=>array('class' => 'sub6')),
//articlesGuides

    //array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),

    ); ?>
