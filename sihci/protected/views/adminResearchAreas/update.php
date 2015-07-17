<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Research Areases'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(

    array('label'=>'Manejador de Archivos ', 'url'=>array('FilesManager/admin'),'itemOptions'=>array('class' => 'menuitem 1')),
        array('label'=>'Gestionar', 'url'=>array('FilesManager/admin'),'itemOptions'=>array('class' => 'sub1')),
        array('label'=>'Crear', 'url'=>array('FilesManager/create'),'itemOptions'=>array('class' => 'sub1')),

//postdegreeGraduates
    array('label'=>'Gestión de usuarios ', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'menuitem 2')),
        array('label'=>'Gestionar', 'url'=>array('AdminUsers/'),'itemOptions'=>array('class' => 'sub2')),
        array('label'=>'Crear', 'url'=>array('AdminUsers/CreateUser'),'itemOptions'=>array('class' => 'sub2')),
//knowledgeApplication
    array('label'=>'Gestión de proyectos', 'url'=>array('adminProjects/admin'),'itemOptions'=>array('class' => 'menuitem 3')),
        array('label'=>'Gestionar', 'url'=>array('adminProjects/admin'),'itemOptions'=>array('class' => 'sub3')),
        array('label'=>'Crear', 'url'=>array('adminProjects/create'),'itemOptions'=>array('class' => 'sub3')),
//patent
    array('label'=>'Respaldos', 'url'=>array('adminBackups/admin'),'itemOptions'=>array('class' => 'menuitem 4')),
//copyrights
    array('label'=>'Áreas de especialidad', 'url'=>array('adminSpecialtyAreas/admin'),'itemOptions'=>array('class' => 'menuitem 5 ')),
            array('label'=>'Gestionar', 'url'=>array('adminSpecialtyAreas/admin'),'itemOptions'=>array('class' => 'sub5')),
            array('label'=>'Crear', 'url'=>array('adminSpecialtyAreas/create'),'itemOptions'=>array('class' => 'sub5')),
//copyrights
    array('label'=>'Lineas de investigación', 'url'=>array('adminResearchAreas/admin'),'itemOptions'=>array('class' => 'menuitem 6 now')),
            array('label'=>'Gestionar', 'url'=>array('adminResearchAreas/admin'),'itemOptions'=>array('class' => 'sub')),
            array('label'=>'Crear', 'url'=>array('adminResearchAreas/create'),'itemOptions'=>array('class' => 'sub')),
//articlesGuides

    //array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),

    );
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/AdministracionSistema.png" alt="">
            <h1>Gestión Lineas De Investigación</h1>
            <hr>
        </div>


<h3>Modificar: <?php echo $model->name;?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
