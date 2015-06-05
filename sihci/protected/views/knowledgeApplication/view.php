<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */

$this->breadcrumbs=array(
	'Knowledge Applications'=>array('index'),
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

<h4>Registro de aplicación del conocimiento con fecha <?php echo '"'.substr($model->creation_date, 0, 10).'"'; ?></h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		/*'id',
		'id_curriculum',*/
		'term1',
		'term2',
		'term3',
		'term4',
		'term5',
	),
)); ?>
