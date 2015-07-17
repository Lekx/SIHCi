<script type="text/javascript">
$(document).ready(function(){

	$('table.items').each(function() {
		var currentPage = 0;
		var numPerPage = 10;
		var $table = $(this);
		$table.bind('repaginate', function() {
				$table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
		});
		$table.trigger('repaginate');
		var numRows = $table.find('tbody tr').length;
		var numPages = Math.ceil(numRows / numPerPage);
		var $pager = $('<div class="pager"></div>');
		for (var page = 0; page < numPages; page++) {
				$('<span class="page-number"></span>').text(page + 1).bind('click', {
						newPage: page
				}, function(event) {
						currentPage = event.data['newPage'];
						$table.trigger('repaginate');
						$(this).addClass('active').siblings().removeClass('active');
				}).appendTo($pager).addClass('clickable');
		}
		$pager.insertAfter($table).find('span.page-number:first').addClass('active');
	});
});


</script>
<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Tablas'=>array('index'),
	'Ingreso de Investigadores',
);
$this->menu=array(
	array('label'=>'Graficas', 'url'=>array('Charts/index')),
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
	<div class="col-md-4">
		<span class="plain-select3">
<select id="valueProjects" onchange="change()">
  <option value="total" selected="">Total de Proyectos</option>
  <option value="En proceso">Proyectos en proceso</option>
  <option value="borrador">Proyectos en borrador</option>
  <option value="dictaminado">Proyectos Concluidos</option>
  <option value="rechazado">Proyectos Rechazados</option>
  <option value="divuh">Proyectos de Revisión DivUH</option>
</select>
</span>
</div>

<div class="col-md-4">
	<span class="plain-select3">
<select id="valueHospital" onchange="change()">
  <option value="total" selected="">Total de Hospitales</option>
  <option >Hospital Civil Fray Antonio Alcalde</option>
  <option >Hospital Civil Dr. Juan I. Menchaca</option>
</select>
</span>
</div>

<div class="col-md-4">
	<span class="plain-select3">
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

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'curriculum-grid',
	'dataProvider'=>$projects,
	 'ajaxUpdate' => true,
	'filter' => null,
	'summaryText'=>'',
	'columns'=>array(
		  array('header'=>'Nombre de Usuario',
		 		'name'=>'names',
                ),
		   array('header'=>'Título',
		 		'name'=>'title',
                ),
		    array('header'=>'Disciplina',
		 		'value'=>'$data["discipline"] == "-1" ? " " : $data["discipline"]',
                ),
		     array('header'=>'Patrocinado',
		 		'value'=>'$data["is_sponsored"] == 1 ? "Si" : "No"',
                ),
		     array('header'=>'Número de Registro',
		 		'value'=>'$data["registration_number"] == "-1" ? " " : $data["registration_number"]',
                ),
		      array('header'=>'Estatus',
		 		'name'=>'status',
                ),
		       array('header'=>'Unidad Hospitalaria',
		 		'value'=>'$data["develop_uh"] == "-1" ? " " : $data["develop_uh"]',
                ),
                array('header'=>'Fecha de Inicio',
		 		'name'=>'creation_date',
                ),
   	),
)); ?>
