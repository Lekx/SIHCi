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
	array('label'=>'Cantidad de investigadores', 'url'=>array('researchers'),'itemOptions'=>array('class' => 'menuitem now')),
	array('label'=>'Capítulos de libros', 'url'=>array('chapters')),
	array('label'=>'Libros', 'url'=>array('books')),
	array('label'=>'Proyectos de investigación', 'url'=>array('projects')),
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
	valueResearchers = $("#valueResearchers").val();
	valueResearchersSNI = $("#valueResearchersSNI").val();
	valueHospital = $("#valueHospital").val();
	valueYear = $("#valueYear").val();

	$('tbody > tr').show();

	if( valueHospital == 'total' && valueResearchers == 'total' && valueYear=='total' && valueResearchersSNI == 'total'){
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

	}else if(valueResearchers == 'total' && valueHospital == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if(valueResearchers == 'total' && valueYear == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if(valueHospital == 'total' && valueYear == 'total' && valueResearchers == 'total'){
		$('tbody > tr:not(:contains('+valueResearchersSNI+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchersSNI+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if(valueHospital == 'total' && valueYear == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueResearchers+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchers+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if( valueResearchers == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if( valueHospital == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueResearchers+'):contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchers+'):contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if( valueYear == 'total' && valueResearchersSNI == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueResearchers+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'):contains('+valueResearchers+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if (valueResearchers == 'total' && valueHospital == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if (valueResearchers == 'total' && valueYear == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueHospital+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueHospital+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if (valueYear == 'total' && valueHospital == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueResearchers+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueResearchers+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if (valueResearchers == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'):contains('+valueHospital+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'):contains('+valueHospital+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if (valueResearchersSNI == 'total') {
		$('tbody > tr:not(:contains('+valueResearchers+'):contains('+valueYear+'):contains('+valueHospital+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchers+'):contains('+valueYear+'):contains('+valueHospital+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if (valueHospital == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'):contains('+valueResearchers+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueYear+'):contains('+valueResearchers+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if (valueYear == 'total') {
		$('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueResearchers+'):contains('+valueHospital+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueResearchersSNI+'):contains('+valueResearchers+'):contains('+valueHospital+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else{
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'):contains('+valueResearchers+'):contains('+valueResearchersSNI+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'):contains('+valueResearchers+'):contains('+valueResearchersSNI+'))').length);
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
 		$('tbody > tr:not(:contains('+valueSearch+'))').hide();
 	}
 }

</script>
<input type="text" id="search" onKeyPress="search()" placeholder="Búsqueda por columna" title="La barra de búsqueda es sensible a las mayúsculas" class="searchcrud">
<?php echo CHtml::Button('',array('class'=>'adminbut')); ?>

<div class="tableOpt">
	<div class="col-md-3">
		<span class="plain-select3">
	<select id="valueResearchers" onchange="change()">
	  <option value="total" selected="">Total de investigadores</option>
	  <option value="activo">Ingreso Investigadores</option>
	  <option value="inhabilitado">Baja Investigadores</option>
	</select>
</span>
</div>
	<div class="col-md-3">
		<span class="plain-select3">
	<select id="valueResearchersSNI" onchange="change()">
	  <option value="total">Total investigadores SNI</option>
	  <option value="SNI:">Investigadores con SNI</option>
	  <option value="No SNI">Investigadores sin SNI</option>

	</select>
	</span>
	</div>
	<div class="col-md-3">
		<span class="plain-select3">
	<select id="valueHospital" onchange="change()">
	  <option value="total" selected="">Total de hospitales</option>
		<option >Hospital Civil Dr. Juan I. Menchaca</option>
	  <option >Hospital Civil Fray Antonio Alcalde</option>
	  <option >Otro</option>
	</select>
	</span>
</div>

	<div class="col-md-3">
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
	'dataProvider'=>$researchersIncome,
	'summaryText'=>'',
	'columns'=>array(
		  array('header'=>'Nombre de usuario',
		 		'name'=>'names',
                ),
		    array('header'=>'Undad hospitalaria',
		 		'value'=>'$data["hospital_unit"] == "NA" || $data["hospital_unit"] == null ? "Otro" : $data["hospital_unit"]',
                ),
		   array('header'=>'Línea de investigación',
		 		'value'=>array($this,'researchAreas'),'type' => 'raw',
                ),
		     array('header'=>'Sistema NI',
		 		'value'=>'$data["SNI"] == -1 || $data["SNI"] == 0 ? "No SNI" : "SNI: ".$data["SNI"]',
                ),
		     array('header'=>'Estatus',
		 		'value'=>'$data["status"] == 1 ? "activo" : "inhabilitado"',
                ),
		     array('header'=>'Fecha de creación',
				// 	'name'=>'creation_date',
				'value'=>'date("d/m/Y H:i:s", strtotime($data["creation_date"]))',
                ),
   	),
)); ?>
