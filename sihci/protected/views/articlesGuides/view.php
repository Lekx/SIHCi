<?php
/* @var $this ArticlesGuidesController */
/* @var $model ArticlesGuides */

$this->breadcrumbs=array(
	'Articles Guides'=>array('index'),
	$model->id,
);


$this->menu=array(
	//array('label'=>'List BooksChapters', 'url'=>array('index')),
	array('label'=>'Graduados de posgrado ', 'url'=>array('admin')),
	array('label'=>'Difusión de prensa ', 'url'=>array('admin')),
	array('label'=>'Aplicacion de conocimiento ', 'url'=>array('admin')),
	array('label'=>'Resgirtro patente ', 'url'=>array('admin')),
	array('label'=>'Resgirtro derecho de autor', 'url'=>array('admin')),
	array('label'=>'Resgirtro software', 'url'=>array('admin')),
	array('label'=>'Articulos y guías', 'url'=>array('admin')),
	array('label'=>'Libros ', 'url'=>array('admin')),
	array('label'=>'Capítulo de libros ', 'url'=>array('admin')),
	array('label'=>'Participación en congresos ', 'url'=>array('admin')),
	array('label'=>'Tesis Dirigidas ', 'url'=>array('admin')),
	array('label'=>'Certificaciones por consejos ', 'url'=>array('admin')),
	//array('label'=>'View BooksChapters', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Evaluación Curricular</h1>
            <hr>
        </div>


<h3>Gestionar Registro de Arituclos y Guias:  <?php echo $model->title; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'isbn',
		'title',
		'editorial',
		'edicion',
		'publishing_year',
		'volumen',
		'volumen_no',
		'start_page',
		'end_page',
		'article_type',
		'copies_issued',
		'magazine',
		'area',
		'discipline',
		'subdiscipline',
		'keywords',
		'type',
		array(
			'label'=>'Archivo',
			'type'=>'raw',
			'value'=>CHtml::link('Ver archivo', Yii::app()->baseUrl.$model->url_document,array("target"=>"_blank")),
		),
		/*'url_document',
		'id',
		'id_resume',
		'creation_date',*/
	),
)); ?>
<?php $modelAuthor = ArtGuidesAuthor::model()->findAllByAttributes(array('id_art_guides'=>$model->id));
	 foreach ($modelAuthor as $key => $value)
	 {  ?> 
		<?php 
			  $this->widget('zii.widgets.CDetailView', array(
			 'data'=>$model,
			 'attributes'=>array(
			  
			  array(
			   'label'=>'Nombre(s)',
			   'name'=>'names',
			   'value'=>$value->names,
			   ),
			  array(
			   'label'=>'Apellido Paterno',
			   'name'=>'last_names1',
			   'value'=>$value->last_name1,
			   ),
			  array(
			   'label'=>'Apellido Materno',
			   'name'=>'last_names2',
			   'value'=>$value->last_name2,
			   ),
			  array(
			   'label'=>'Posición',
			   'name'=>'positions',
			   'value'=>$value->position,
			   ),  
			 ),

			));  
		?>
	<?php } ?>
