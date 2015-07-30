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
	array('label'=>'Artículos y guías', 'url'=>array('articlesGuides')),
	array('label'=>'Cantidad de investigadores', 'url'=>array('researchers')),
	array('label'=>'Capítulos de libros', 'url'=>array('chapters')),
	array('label'=>'Libros', 'url'=>array('books')),
	array('label'=>'Proyectos de investigación', 'url'=>array('projects'),'itemOptions'=>array('class' => 'menuitem now')),
	array('label'=>'Registro de propiedad intelectual: Derechos de autor', 'url'=>array('copyrights')),
	array('label'=>'Registro de propiedad intelectual: Patentes', 'url'=>array('patents')),
	array('label'=>'Registro de propiedad intelectual: Software', 'url'=>array('software')),
);

?>

<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Estadisticas.svg" alt="">
            <h1>Estadísticas</h1>
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

	if( valueHospital == 'total' && valueProjects == 'total' && valueYear=='total'){
		$('tbody > tr').show();
		totalVisibles = parseInt($('tbody >tr').length);
		$('#totalToShow').html(totalVisibles);
		  $('.pager').remove();
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
	}else if(valueProjects == 'total' && valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if(valueProjects == 'total' && valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if(valueHospital == 'total' && valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueProjects+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueProjects+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if( valueProjects == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if( valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueProjects+'):contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueProjects+'):contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if( valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueProjects+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'):contains('+valueProjects+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else{
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'):contains('+valueProjects+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'):contains('+valueProjects+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
  }
}//function

 function search(){
 	valueSearch = $("#search").val();
 	$('tbody > tr').show();

 	if (valueSearch == '') {
 		$('tbody > tr').show();
 	}else{

		$('tbody > tr > td').html().toLowerCase();
 		$('tbody > tr:not(:contains('+valueSearch+'))').hide();
 	}
 }


</script>
<input type="text" id="search" onKeyPress="search()" placeholder="Búsqueda por columna" title="La barra de búsqueda es sensible a las mayúsculas" class="searchcrud">
<?php echo CHtml::Button('',array('class'=>'adminbut')); ?>
<div class="tableOpt">
	<div class="col-md-4">
		<span class="plain-select3">
<select id="valueProjects" onchange="change()">
  <option value="total" selected="">Total de proyectos</option>
  <option value="MODIFICAR">Proyectos en proceso</option>
  <option value="BORRADOR">Proyectos en borrador</option>
  <option value="DICTAMINADO">Proyectos Concluidos</option>
  <option value="RECHAZADO">Proyectos Rechazados</option>
  <option value="DIVUH">Proyectos de Revisión DIVUH</option>
	<option value="COMITE">Proyectos de Revisión COMITÉ</option>
	<option value="SEUH2">Proyectos de Revisión SEUH2</option>
	<option value="COMINV">Proyectos de Revisión COMINV</option>
	<option value="COMETI">Proyectos de Revisión COMETI</option>
	<option value="COMBIO">Proyectos de Revisión COMBIO</option>
	<option value="DUH">Proyectos de Revisión DUH</option>

</select>
</span>
</div>

<div class="col-md-4">
	<span class="plain-select3">
<select id="valueHospital" onchange="change()">
  <option value="total" selected="">Total de hospitales</option>
  <option >Hospital Civil Fray Antonio Alcalde</option>
  <option >Hospital Civil Dr. Juan I. Menchaca</option>
	<option >Otro</option>
</select>
</span>
</div>

<div class="col-md-4">
	<span class="plain-select3">
  <select id="valueYear" onchange="change()">
  <option value="total" selected="">Total de años</option>
  <?php
	foreach($year AS $index=> $value)
		echo '<option value="'.$value["year"].'" >'.$value["year"].'</option>';
  ?>

</select>
</span>
</div>
</div>
<?php
echo "Total: <div id='total' style='display: none'>".$total."</div> <div class='totalTables' id='totalToShow'>".$total."</div>";
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'curriculum-grid',
	'dataProvider'=>$projects,
	 'ajaxUpdate' => true,
	'filter' => null,
	'summaryText'=>'',
	'columns'=>array(
		  array('header'=>'Nombre de usuario',
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
		     array('header'=>'Número de registro',
		 		'value'=>'$data["registration_number"] == "-1" ? " " : $data["registration_number"]',
                ),
		      array('header'=>'Estatus',
		 		'name'=>'status',
                ),
		       array('header'=>'Unidad hospitalaria',
		 		'value'=>'$data["develop_uh"] == "-1" || $data["develop_uh"] == "" ? "Otro" : $data["develop_uh"]',
                ),
                array('header'=>'Fecha de creación',
	'value'=>'date("d/m/Y H:i:s", strtotime($data["creation_date"]))',                ),
   	),
)); ?>
