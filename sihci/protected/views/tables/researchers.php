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
	array('label'=>'Capítulos de Libros', 'url'=>array('chapters')),
	array('label'=>'Registro de Propiedad Intelectual: Patentes', 'url'=>array('patents')),
	array('label'=>'Registro de Propiedad Intelectual: Software', 'url'=>array('software')),
	array('label'=>'Registro de Propiedad Intelectual: Derechos de Autor', 'url'=>array('copyrights')),
	array('label'=>'Artículos y Guías', 'url'=>array('articlesGuides')),
);

?>

<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Estadisticas.svg" alt="">
            <h1>Estadisticas</h1>
            <hr>
        </div>

<h3>
	<?php echo $titlePage ?>
</h3>

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
<input type="text" id="search" onchange="search()" placeholder="Búsqueda por columna" class="searchcrud">

<div class="tableOpt">
	<div class="col-md-3">
		<span class="plain-select2">
	<select id="valueResearchers" onchange="change()">
	  <option value="total" selected="">Total de Investigadores</option>
	  <option value="activo">Ingreso Investigadores</option>
	  <option value="inhabilitado">Baja Investigadores</option>
	</select>
</span>
</div>
	<div class="col-md-3">
		<span class="plain-select2">
	<select id="valueResearchersSNI" onchange="change()">
	  <option value="total">Total Investigadores SNI</option>
	  <option value="SNI:">Investigadores con SNI</option>
	  <option value="N/A">Investigadores sin SNI</option>

	</select>
	</span>
	</div>
	<div class="col-md-3">
		<span class="plain-select2">
	<select id="valueHospital" onchange="change()">
	  <option value="total" selected="">Total de Hospitales</option>
	  <option >Hospital Civil Fray Antonio Alcalde</option>
	  <option >Hospital Civil Dr. Juan I. Menchaca</option>
	  <option >Otro</option>
	</select>
	</span>
</div>

	<div class="col-md-3">
		<span class="plain-select2">
	  <select id="valueYear" onchange="change()">
	  <option value="total" selected="">Total de Años</option>
	  <?php
		foreach($year AS $index=> $value)
			echo '<option value="'.$value["year"].'" >'.$value["year"].'</option>';
	  ?>

	</select>
	</span>
</div>
</div>

<?php
// print_r($researchersIncome);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'curriculum-grid',
	'dataProvider'=>$researchersIncome,
	'summaryText'=>'',
	'columns'=>array(
		  array('header'=>'Nombre de Usuario',
		 		'name'=>'names',
                ),
		    array('header'=>'Undad Hospitalaria',
		 		'value'=>'$data["hospital_unit"] == "NA" || $data["hospital_unit"] == null ? "Otro" : $data["hospital_unit"]',
                ),
		   array('header'=>'Línea de Investigación',
		 		'value'=>array($this,'researchAreas'),'type' => 'raw',
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
