<?php
/* @var $this LanguagesController */
/* @var $model Languages */

$this->breadcrumbs=array(
	'Languages'=>array('index'),
	$model->id,
);

$this->menu=array(
	//knowledgeApplication
	array('label'=>'Aplicacion de conocimiento ', 'url'=>array('knowledgeApplication/admin'),'itemOptions'=>array('class' => 'menuitem 3')),
	array('label'=>'Gestionar', 'url'=>array('knowledgeApplication/admin'),'itemOptions'=>array('class' => 'sub3')),
	array('label'=>'Crear', 'url'=>array('knowledgeApplication/create'),'itemOptions'=>array('class' => 'sub3')),

	//articlesGuides
	array('label'=>'Articulos y guías', 'url'=>array('articlesGuides/admin'),'itemOptions'=>array('class' => 'menuitem 7 now')),
			array('label'=>'Gestionar', 'url'=>array('articlesGuides/admin'),'itemOptions'=>array('class' => 'sub13')),
			array('label'=>'Crear', 'url'=>array('articlesGuides/create'),'itemOptions'=>array('class' => 'sub13')),

	//booksChapters
	array('label'=>'Capítulo de libros ', 'url'=>array('booksChapters/admin'),'itemOptions'=>array('class' => 'menuitem 9')),
		array('label'=>'Gestionar', 'url'=>array('booksChapters/admin'),'itemOptions'=>array('class' => 'sub9')),
		array('label'=>'Crear', 'url'=>array('booksChapters/create'),'itemOptions'=>array('class' => 'sub9')),

		//directedThesis
	array('label'=>'Certificaciones por consejos ', 'url'=>array('certifications/admin'),'itemOptions'=>array('class' => 'menulis 12')),
		array('label'=>'Gestionar', 'url'=>array('certifications/admin'),'itemOptions'=>array('class' => 'sub12')),
		array('label'=>'Crear', 'url'=>array('certifications/create'),'itemOptions'=>array('class' => 'sub12')),


	array('label'=>'Difusión de prensa ', 'url'=>array('pressNotes/admin'),'itemOptions'=>array('class' => 'menuitem 2')),
	array('label'=>'Gestionar', 'url'=>array('pressNotes/admin'),'itemOptions'=>array('class' => 'sub2')),
	array('label'=>'Crear', 'url'=>array('pressNotes/create'),'itemOptions'=>array('class' => 'sub2')),

	//postdegreeGraduates
	array('label'=>'Graduados de posgrado ', 'url'=>array('postdegreeGraduates/admin'),'itemOptions'=>array('class' => 'menuitem 1')),
	array('label'=>'Gestionar', 'url'=>array('postdegreeGraduates/admin'),'itemOptions'=>array('class' => 'sub1')),
	array('label'=>'Crear', 'url'=>array('postdegreeGraduates/create'),'itemOptions'=>array('class' => 'sub1')),

	//books
	array('label'=>'Libros ', 'url'=>array('books/admin'),'itemOptions'=>array('class' => 'menuitem 8')),
			array('label'=>'Gestionar', 'url'=>array('books/admin'),'itemOptions'=>array('class' => 'sub8')),
			array('label'=>'Crear', 'url'=>array('books/create'),'itemOptions'=>array('class' => 'sub8')),

		array('label'=>'Idiomas ', 'url'=>array('languages/admin'),'itemOptions'=>array('class' => 'menuitem 13 now')),
		array('label'=>'Gestionar', 'url'=>array('languages/admin'),'itemOptions'=>array('class' => 'sub')),
		array('label'=>'Crear', 'url'=>array('languages/create'),'itemOptions'=>array('class' => 'sub')),
	//congresses
	array('label'=>'Participación en congresos ', 'url'=>array('congresses/admin'),'itemOptions'=>array('class' => 'menuitem 10')),
		array('label'=>'Gestionar', 'url'=>array('congresses/admin'),'itemOptions'=>array('class' => 'sub10')),
		array('label'=>'Crear', 'url'=>array('congresses/create'),'itemOptions'=>array('class' => 'sub10')),

	//copyrights
	array('label'=>'Registro derecho de autor', 'url'=>array('copyrights/admin'),'itemOptions'=>array('class' => 'menuitem 5')),
			array('label'=>'Gestionar', 'url'=>array('copyrights/admin'),'itemOptions'=>array('class' => 'sub5')),
			array('label'=>'Crear', 'url'=>array('copyrights/create'),'itemOptions'=>array('class' => 'sub5')),
	//patent
	array('label'=>'Registro patente ', 'url'=>array('patent/admin'),'itemOptions'=>array('class' => 'menuitem 4')),
		array('label'=>'Gestionar', 'url'=>array('patent/admin'),'itemOptions'=>array('class' => 'sub4')),
		array('label'=>'Crear', 'url'=>array('patent/create'),'itemOptions'=>array('class' => 'sub4')),

	//copyrights
	array('label'=>'Registro software', 'url'=>array('software/admin'),'itemOptions'=>array('class' => 'menuitem 6')),
			array('label'=>'Gestionar', 'url'=>array('software/admin'),'itemOptions'=>array('class' => 'sub6')),
			array('label'=>'Crear', 'url'=>array('software/create'),'itemOptions'=>array('class' => 'sub6')),

	//directedThesis
	array('label'=>'Tesis Dirigidas ', 'url'=>array('directedThesis/admin'),'itemOptions'=>array('class' => 'menuitem 11')),
		array('label'=>'Gestionar', 'url'=>array('directedThesis/admin'),'itemOptions'=>array('class' => 'sub11')),
		array('label'=>'Crear', 'url'=>array('directedThesis/create'),'itemOptions'=>array('class' => 'sub11')),
);

?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>
<h3>Detalles del idioma <?php echo $model->language; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		// 'id_curriculum',
		'language',
		'description',
		// 'native_language',
		array(
			'label'=>'Idioma Nativo',
			'name'=>'native_language',
			'value'=>$model->native_language == 1 ? "Si" : "No",
			),
		array(
			'label'=>'Traductor',
			'name'=>'is_traducer',
			'value'=>$model->is_traducer == 1 ? "Si" : "No",
			),
		array(
			'label'=>'Profesor',
			'name'=>'is_teacher',
			'value'=>$model->is_teacher == 1 ? "Si" : "No",
			),
		'conversational_level',
		'reading_level',
		'writting_level',
		'evaluation_date',
		'document_percentage',
		array(
			'label'=>'Archivo',
			'type'=>'raw',
			'value'=>$model->path != null ? CHtml::link('Ver archivo', Yii::app()->baseUrl.$model->path,array("target"=>"_blank")) : "No se ha subido el archivo",
		),
		// 'path',
		// 'creation_date',
	),
)); ?>
