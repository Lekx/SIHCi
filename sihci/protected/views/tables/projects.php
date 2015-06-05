<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Tablas'=>array('index'),
	'Ingreso de Investigadores',
);
$this->menu=array(
	array('label'=>'Cantidad de Investigadores', 'url'=>array('researchers')),
	array('label'=>'Proyectos de Investigación', 'url'=>array('projects')),
	array('label'=>'Libros', 'url'=>array('books')),
	array('label'=>'Capítulos', 'url'=>array('chapters')),
	array('label'=>'Revistas Científicas', 'url'=>array('scientistMagazines')),
	array('label'=>'Patentes', 'url'=>array('patents')),
	array('label'=>'Software', 'url'=>array('software')),
	array('label'=>'Derechos de Autor', 'url'=>array('copyrights')),
	array('label'=>'Artículos y Guías', 'url'=>array('articlesGuides')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#system-log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h2>
	<?php echo $titlePage ?>
</h2>

<div class="search-form" style="display:block">
<?php $this->renderPartial('_search_projects',array(
	'model'=>$projects,
)); ?>
</div><!-- search-form -->

<script type="text/javascript">
	
function change(){
	valueProjects = $("#valueProjects").val();
	valueHospital = $("#valueHospital").val();
	valueYear = $("#valueYear").val();

	$('tbody > tr').show();

	if( valueHospital == 'total' && valueProjects == 'total' && valueYear=='total')
		$('tbody > tr').show();
	else if(valueProjects == 'total' && valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueYear+'))').hide();
	}else if(valueProjects == 'total' && valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'))').hide();
	}else if(valueHospital == 'total' && valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueProjects+'))').hide();
	}else if( valueProjects == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').hide();
	}else if( valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueProjects+'):contains('+valueYear+'))').hide();
	}else if( valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueProjects+'))').hide();
	}else
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'):contains('+valueProjects+'))').hide();

}//function
</script>
<select id="valueProjects" onchange="change()">
  <option value="total" selected="">Total de Proyectos</option>	
  <option value="abierto">Proyectos Abiertos</option>
  <option value="dictaminado">Proyectos Concluidos</option>
  <option value="rechazado">Proyectos Rechazados</option>

</select>
<br><br>

<select id="valueHospital" onchange="change()">
  <option value="total" selected="">Total de Hospitales</option>	
  <option >Hospital Civil Fray Antonio Alcalde</option>
  <option >Hospital Civil Dr. Juan I. Menchaca</option>
  <option>NA</option>
</select>
  <br><br>

  <select id="valueYear" onchange="change()">
  <option value="total" selected="">Total de Años</option>	
  <?php
	foreach($year AS $index=> $value)
		echo '<option value="'.$value["year"].'" >'.$value["year"].'</option>';
  ?>

</select>
  <br><br>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'curriculum-grid',
	'dataProvider'=>$projects,
	 'ajaxUpdate' => true,
	'filter' => null,
	'columns'=>array(
		  array('header'=>'Nombre de Usuario',
		 		'name'=>'names',
                ),
		   array('header'=>'Título',
		 		'name'=>'title',
                ),
		    array('header'=>'Disciplina',
		 		'name'=>'discipline',
                ),
		     array('header'=>'Es empresa',
		 		'name'=>'is_sponsored',
                ),
		     array('header'=>'Número de Registro',
		 		'name'=>'registration_number',
                ),
		      array('header'=>'Estatus',
		 		'name'=>'status',
                ),
		       array('header'=>'Unidad Hospitalaria',
		 		'name'=>'develop_uh',
                ),
                array('header'=>'Fecha de Inicio',
		 		'name'=>'creation_date',
                ),
   	),
)); ?>

