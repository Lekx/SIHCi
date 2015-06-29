<?php
/* @var $this FilesManagerController */
/* @var $model FilesManager */

$this->breadcrumbs=array(
	'Files Managers'=>array('index'),
	$model->id,
);
$this->menu=array(
    //array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
    //array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
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
    array('label'=>'Respaldos', 'url'=>array('patent/admin'),'itemOptions'=>array('class' => 'menuitem 4')),
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
    
    );
?>

<h1>Manejador de archivos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'section',
		'file_name',
		//'path',
		'start_date',
		'end_date',
	),
)); ?>
