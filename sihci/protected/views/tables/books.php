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
<script type="text/javascript">
	
function change(){
	// valueResearchers = $("#valueResearchers").val();
	valueHospital = $("#valueHospital").val();
	valueYear = $("#valueYear").val();

	$('tbody > tr').show();

	if( valueHospital == 'total' && valueYear=='total')
		$('tbody > tr').show();
	else if(valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueYear+'))').hide();
	}else if(valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'))').hide();
	}else
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').hide();

}//function
 function search(){
 	valueSearch = $("#search").val();
 	$('tbody > tr').show();

 	if (valueSearch == '') {
 		$('tbody > tr').show();
 	}else{
 		$('tbody > tr:not(:contains('+valueSearch+'))').hide();
 	}
 }

</script>
<input type="text" id="search" onchange="search()" placeholder="buscar"><br><br>
<!-- <select id="valueResearchers" onchange="change()">
  <option value="total" selected="">Total de Investigadores</option>	
  <option value="1">Ingreso Investigadores</option>
  <option value="0">Baja Investigadores</option>
  <option value="">Investigadores con SNI</option>
  <option value="-1">Investigadores sin SNI</option>

</select>
<br><br> -->

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
	'id'=>'books-grid',
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
		     array('header'=>'Fecha de Lanzamiento',
		 		'name'=>'release_date',
                ),
		     array('header'=>'Unidad Hospitalaria',
		 		'name'=>'hospital_unit',
                ),
		     array('header'=>'Fecha de Creación',
		 		'name'=>'creation_date',
                ),
   	),
)); ?>

