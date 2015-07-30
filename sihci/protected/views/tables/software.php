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
	array('label'=>'Proyectos de investigación', 'url'=>array('projects')),
	array('label'=>'Registro de propiedad intelectual: Derechos de autor', 'url'=>array('copyrights')),
	array('label'=>'Registro de propiedad intelectual: Patentes', 'url'=>array('patents')),
	array('label'=>'Registro de propiedad intelectual: Software', 'url'=>array('software'),'itemOptions'=>array('class' => 'menuitem now')),
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
	valueHospital = $("#valueHospital").val();
	valueYear = $("#valueYear").val();

	$('tbody > tr').show();

	if( valueHospital == 'total' && valueYear=='total'){
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
	}else if(valueHospital == 'total'){
		$('tbody > tr:not(:contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueYear+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else if(valueYear == 'total'){
		$('tbody > tr:not(:contains('+valueHospital+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'))').length);
		total = parseInt($('#total').html());
		totalToShow = total - totalInvisible;
		$('#totalToShow').html(totalToShow);
		$('.pager').remove();
	}else{
		$('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').hide();
		totalInvisible = parseInt($('tbody > tr:not(:contains('+valueHospital+'):contains('+valueYear+'))').length);
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
<!-- <h3>en construcción . . .</h3> -->
<input type="text" id="search" onKeyPress="search()" placeholder="Búsqueda por columna" title="La barra de búsqueda es sensible a las mayúsculas" class="searchcrud">
<?php echo CHtml::Button('',array('class'=>'adminbut')); ?>
<div class="tableOpt">
	<div class="col-md-6">
		<span class="plain-select3">
<select id="valueHospital" onchange="change()">
  <option value="total" selected="">Total de hospitales</option>
  <option >Hospital Civil Fray Antonio Alcalde</option>
  <option >Hospital Civil Dr. Juan I. Menchaca</option>
  <option>Otro</option>
</select>
	</span>
</div>
		<div class="col-md-6">
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
	'id'=>'books-grid',
	'dataProvider'=>$softwares,
	 'ajaxUpdate' => true,
	'filter' => null,
	'summaryText'=>'',
	'columns'=>array(
		  array('header'=>'Nombre de usuario',
		 		'name'=>'names',
                ),
		  array('header'=>'Undad hospitalaria',
		 		'value'=>'$data["hospital_unit"] == "NA" || $data["hospital_unit"] == null ? "Otro" : $data["hospital_unit"]',
                ),
		  array('header'=>'Título',
		 		'name'=>'title',
                ),
		     array('header'=>'País',
		 		'name'=>'country',
                ),
		     array('header'=>'Organización',
		 		'name'=>'organization',
                ),
		     array('header'=>'Fecha de creación',
	'value'=>'date("d/m/Y H:i:s", strtotime($data["creation_date"]))',                ),
		      array(
				'header'=>'Descargar documento',
       			 'type'=>'raw',
				  'htmlOptions' => array('style' => 'width: 120px;','class'=>'downloadrow'),
      			 'value'=>'$data["path"] == "" ? "no hay archivo" : CHtml::link("<img src='.Yii::app()->request->baseUrl.'/img/icons/descargar.png>", "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl."".$data["path"]."", array("target"=>"_blank"))',
                ),
   	),
)); ?>
