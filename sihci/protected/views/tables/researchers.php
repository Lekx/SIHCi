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
	array('label'=>'Patentes', 'url'=>array('patents')),
	array('label'=>'Software', 'url'=>array('software')),
	array('label'=>'Derechos de Autor', 'url'=>array('copyrights')),
	array('label'=>'Artículos y Guías', 'url'=>array('articlesGuides')),
);

?>

<h2>
	<?php echo $titlePage ?>
</h2>

<script type="text/javascript">
	
function change(){
	valueResearchers = $("#valueResearchers").val();
	valueResearchersSNI = $("#valueResearchersSNI").val();
	valueHospital = $("#valueHospital").val();
	valueYear = $("#valueYear").val();

	$('tbody > tr').show();

	if( valueHospital == 'total' && valueResearchers == 'total' && valueYear=='total' && valueResearchersSNI == 'total')
		$('tbody > tr').show();
	else if(valueResearchers == 'total' && valueHospital == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueYear+'))').hide();
	}else if(valueResearchers == 'total' && valueYear == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'))').hide();
	}else if(valueHospital == 'total' && valueYear == 'total' && valueResearchers == 'total'){
		$('tbody > tr:not(:contains('+valueResearchersSNI+'))').hide();
	}else if(valueHospital == 'total' && valueYear == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueResearchers+'))').hide();
	}else if( valueResearchers == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').hide();
	}else if( valueHospital == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueResearchers+'):contains('+valueYear+'))').hide();
	}else if( valueYear == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueResearchers+'))').hide();
	}else if (valueResearchers == 'total' && valueHospital == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'))').hide();
	}else if (valueResearchers == 'total' && valueYear == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueHospital+'))').hide();
	}else if (valueYear == 'total' && valueHospital == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueResearchers+'))').hide();
	}else if (valueResearchers == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'):contains('+valueHospital+'))').hide();
	}else if (valueResearchersSNI == 'total') {
		$('tbody > tr:not(:contains('+valueResearchers+'):contains('+valueYear+'):contains('+valueHospital+'))').hide();
	}else if (valueHospital == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'):contains('+valueResearchers+'))').hide();
	}else if (valueYear == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueResearchers+'):contains('+valueHospital+'))').hide();
	}else
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'):contains('+valueResearchers+'):contains('+valueResearchersSNI+'))').hide();

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
<select id="valueResearchers" onchange="change()">
  <option value="total" selected="">Total de Investigadores</option>	
  <option value="activo">Ingreso Investigadores</option>
  <option value="inhabilitado">Baja Investigadores</option>
</select>
<br><br>

<select id="valueResearchersSNI" onchange="change()"> 
  <option value="total">Total Investigadores SNI</option> 
  <option value="SNI:">Investigadores con SNI</option>
  <option value="N/A">Investigadores sin SNI</option>

</select>
<br><br>

<select id="valueHospital" onchange="change()">
  <option value="total" selected="">Total de Hospitales</option>	
  <option >Hospital Civil Fray Antonio Alcalde</option>
  <option >Hospital Civil Dr. Juan I. Menchaca</option>
  <option >NA</option>
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
	'dataProvider'=>$researchersIncome,
	'summaryText'=>'',
	'columns'=>array(
		 array('header'=>'Numero de Usuario',
		 		'name'=>'id',
                ),
		  array('header'=>'Nombre de Usuario',
		 		'name'=>'names',
                ),
		   array('header'=>'Línea de Investigación',
		 		'value'=>array($this,'researchAreas'),'type' => 'raw',
                ),
		    array('header'=>'Undad Hospitalaria',
		 		'name'=>'hospital_unit',
                ),
		     array('header'=>'Sistema NI',
		 		'value'=>'$data["SNI"] == -1 || $data["SNI"] == 0 ? "N/A" : "SNI: ".$data["SNI"]',
                ),
		     array('header'=>'Estatus',
		 		'value'=>'$data["status"] == 1 ? "activo" : "inhabilitado"',
                ),
		     array('header'=>'Fecha de Creación',
		 		'name'=>'creation_date',
                ),
   	),
)); ?>

