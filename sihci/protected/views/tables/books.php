<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Tablas'=>array('index'),
	'Ingreso de Investigadores',
);
$this->menu=array(
	//array('label'=>'Anual Total Ingreso de Investigadores', 'url'=>array('index')),
	
	array('label'=>'Cantidad de Investigadores', 'url'=>array('researchers')),
	array('label'=>'Proyectos de Investigación', 'url'=>array('projects')),
	array('label'=>'Libros', 'url'=>array('books')),
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
<?php $this->renderPartial('_search_researchers_income',array(
	'model'=>$books,
)); ?>
</div><!-- search-form -->
<script type="text/javascript">
	
function change(){
	valueResearchers = $("#valueResearchers").val();
	valueHospital = $("#valueHospital").val();
	valueYear = $("#valueYear").val();

	$('tbody > tr').show();

	if( valueHospital == 'total' && valueResearchers == 'total' && valueYear=='total')
		$('tbody > tr').show();
	else if(valueResearchers == 'total' && valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueYear+'))').hide();
	}else if(valueResearchers == 'total' && valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'))').hide();
	}else if(valueHospital == 'total' && valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueResearchers+'))').hide();
	}else if( valueResearchers == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').hide();
	}else if( valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueResearchers+'):contains('+valueYear+'))').hide();
	}else if( valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueResearchers+'))').hide();
	}else
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'):contains('+valueResearchers+'))').hide();

}//function
</script>
<select id="valueResearchers" onchange="change()">
  <option value="total" selected="">Total de Investigadores</option>	
  <option value="1">Ingreso Investigadores</option>
  <option value="0">Baja Investigadores</option>
  <option value="">Investigadores con SNI</option>
  <option value="-1">Investigadores sin SNI</option>

</select>
<br><br>

<select id="valueHospital" onchange="change()">
  <option value="total" selected="">Total de Hospitales</option>	
  <option >Hospital Civil Fray Antonio Alcalde</option>
  <option >Hospital Civil Dr. Juan I. Menchaca</option>

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
	'dataProvider'=>$books,
	 'ajaxUpdate' => true,
	'filter' => null,
	'columns'=>array(
		 array('header'=>'Numero de Usuario',
		 		'name'=>'id',
                ),
		  array('header'=>'Nombre de Usuario',
		 		'name'=>'names',
                ),
		   array('header'=>'Título del Libro',
		 		'name'=>'book_title',
                ),
		    array('header'=>'Publicación',
		 		'name'=>'publisher',
                ),
		     array('header'=>'Sistema NI',
		 		'name'=>'SNI',
                ),
		     array('header'=>'Estatus',
		 		'name'=>'status',
                ),
		     array('header'=>'Fecha de Creación',
		 		'name'=>'creation_date',
                ),
   	),
)); ?>

