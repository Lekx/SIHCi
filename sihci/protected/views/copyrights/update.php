<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('indeºx')),
	//array('label'=>'Evaluación CV', 'url'=>array('EvaluateCV/index')),
	array('label'=>'Aplicación de conocimiento ', 'url'=>array('knowledgeApplication/admin'),'itemOptions'=>array('class' => 'menuitem 3')),
		array('label'=>'Gestionar', 'url'=>array('knowledgeApplication/admin'),'itemOptions'=>array('class' => 'sub3')),
		array('label'=>'Crear', 'url'=>array('knowledgeApplication/create'),'itemOptions'=>array('class' => 'sub3')),

		array('label'=>'Artículos y guías', 'url'=>array('articlesGuides/admin'),'itemOptions'=>array('class' => 'menuitem 7')),
				array('label'=>'Gestionar', 'url'=>array('articlesGuides/admin'),'itemOptions'=>array('class' => 'sub7')),
				array('label'=>'Crear', 'url'=>array('articlesGuides/create'),'itemOptions'=>array('class' => 'sub7')),


		array('label'=>'Capítulo de libros ', 'url'=>array('booksChapters/admin'),'itemOptions'=>array('class' => 'menuitem 9')),
			array('label'=>'Gestionar', 'url'=>array('booksChapters/admin'),'itemOptions'=>array('class' => 'sub9')),
			array('label'=>'Crear', 'url'=>array('booksChapters/create'),'itemOptions'=>array('class' => 'sub9')),

			array('label'=>'Certificaciones por consejos ', 'url'=>array('certifications/admin'),'itemOptions'=>array('class' => 'menulis 12')),
				array('label'=>'Gestionar', 'url'=>array('certifications/admin'),'itemOptions'=>array('class' => 'sub12')),
				array('label'=>'Crear', 'url'=>array('certifications/create'),'itemOptions'=>array('class' => 'sub12')),

				array('label'=>'Difusión de prensa ', 'url'=>array('pressNotes/admin'),'itemOptions'=>array('class' => 'menuitem 2')),
					array('label'=>'Gestionar', 'url'=>array('pressNotes/admin'),'itemOptions'=>array('class' => 'sub2')),
					array('label'=>'Crear', 'url'=>array('pressNotes/create'),'itemOptions'=>array('class' => 'sub2')),

					array('label'=>'Graduados de posgrado ', 'url'=>array('postdegreeGraduates/admin'),'itemOptions'=>array('class' => 'menuitem 1')),
						array('label'=>'Gestionar', 'url'=>array('postdegreeGraduates/admin'),'itemOptions'=>array('class' => 'sub1')),
						array('label'=>'Crear', 'url'=>array('postdegreeGraduates/create'),'itemOptions'=>array('class' => 'sub1')),

					array('label'=>'Libros ', 'url'=>array('books/admin'),'itemOptions'=>array('class' => 'menuitem 8')),
							array('label'=>'Gestionar', 'url'=>array('books/admin'),'itemOptions'=>array('class' => 'sub8')),
							array('label'=>'Crear', 'url'=>array('books/create'),'itemOptions'=>array('class' => 'sub8')),
					//booksChapters

					array('label'=>'Idiomas ', 'url'=>array('languages/admin'),'itemOptions'=>array('class' => 'menuitem 13')),
					array('label'=>'Gestionar', 'url'=>array('languages/admin'),'itemOptions'=>array('class' => 'sub13')),
					array('label'=>'Crear', 'url'=>array('languages/create'),'itemOptions'=>array('class' => 'sub13')),


						array('label'=>'Participación en congresos ', 'url'=>array('congresses/admin'),'itemOptions'=>array('class' => 'menuitem 10')),
							array('label'=>'Gestionar', 'url'=>array('congresses/admin'),'itemOptions'=>array('class' => 'sub10')),
							array('label'=>'Crear', 'url'=>array('congresses/create'),'itemOptions'=>array('class' => 'sub10')),


							array('label'=>'Registro derecho de autor', 'url'=>array('copyrights/admin'),'itemOptions'=>array('class' => 'menuitem 5 now')),
									array('label'=>'Gestionar', 'url'=>array('copyrights/admin'),'itemOptions'=>array('class' => 'sub')),
									array('label'=>'Crear', 'url'=>array('copyrights/create'),'itemOptions'=>array('class' => 'sub')),

	array('label'=>'Registro patente ', 'url'=>array('patent/admin'),'itemOptions'=>array('class' => 'menuitem 4')),
		array('label'=>'Gestionar', 'url'=>array('patent/admin'),'itemOptions'=>array('class' => 'sub4')),
		array('label'=>'Crear', 'url'=>array('patent/create'),'itemOptions'=>array('class' => 'sub4')),
//copyrights

//copyrights
	array('label'=>'Registro software', 'url'=>array('software/admin'),'itemOptions'=>array('class' => 'menuitem 6')),
			array('label'=>'Gestionar', 'url'=>array('software/admin'),'itemOptions'=>array('class' => 'sub6')),
			array('label'=>'Crear', 'url'=>array('software/create'),'itemOptions'=>array('class' => 'sub6')),
//articlesGuides


//directedThesis
	array('label'=>'Tesis Dirigidas ', 'url'=>array('directedThesis/admin'),'itemOptions'=>array('class' => 'menuitem 11')),
		array('label'=>'Gestionar', 'url'=>array('directedThesis/admin'),'itemOptions'=>array('class' => 'sub11')),
		array('label'=>'Crear', 'url'=>array('directedThesis/create'),'itemOptions'=>array('class' => 'sub11')),
//directedThesis



	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),

	);

?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>

<h4>Modificar registro de propiedad intelectual-Derechos de Autor: <?php echo $model->title ?></h4>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>
