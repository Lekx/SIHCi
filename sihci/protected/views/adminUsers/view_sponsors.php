
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1><?php echo $model['names'].' '.$model['last_name1'].' '.$model['last_name2']; ?></h1>
            <hr>
        </div>

 <h3>Datos del representante:</h3>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		//'id',
		array(	"name"=>'Correo electronico',
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
		array(	"name"=>'Curp/pasaporte',
				"value"=>$model['curp_passport']),
		array(	"name"=>'Foto',"type"=>'raw',
				"value"=>(array_key_exists('photo_url', $model) ? "<a href='".Yii::app()->request->baseUrl."/".$model['photo_url']."' target='_blank'><img src='".Yii::app()->request->baseUrl."/".$model['photo_url']."' style='width:75px;height:auto;'></a>" : "")),
  	array(	"name"=>'RFC',
				"value"=>$model['person_rfc']),
		array(	"name"=>'Nombre de la empresa',
				"value"=>$model['sponsor_name']),
		array(	"name"=>'Tipo',
				"value"=>$model['type']),
		array(	"name"=>'Sitio web',
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
				"value"=>$model['names']." ".$model['last_name1']." ".$model['last_name2']),
		array(	"name"=>'Nombre del documento',
				"value"=>$model['file_name']),
		array(	"name"=>'Vista previa del documento',"type"=>'raw',
    "value"=>(array_key_exists('path', $model) ? "<a href='".Yii::app()->request->baseUrl."/".$model['path']."' target='_blank'</a>Ver :D" : "")),




	),
));?>

<?php $this->menu=array(

    array('label'=>'Manejador de Archivos ', 'url'=>array('FilesManager/admin'),'itemOptions'=>array('class' => 'menuitem 1')),
        array('label'=>'Gestionar', 'url'=>array('FilesManager/admin'),'itemOptions'=>array('class' => 'sub1')),
        array('label'=>'Crear', 'url'=>array('FilesManager/create'),'itemOptions'=>array('class' => 'sub1')),

//postdegreeGraduates
    array('label'=>'Gestión de usuarios ', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'menuitem 2 now')),
        array('label'=>'Gestionar', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'sub')),
        array('label'=>'Crear', 'url'=>array('AdminUsers/CreateUser'),'itemOptions'=>array('class' => 'sub')),
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
