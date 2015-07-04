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
	array('label'=>'Cantidad de Investigadores', 'url'=>array('researchers')),
	array('label'=>'Proyectos de Investigación', 'url'=>array('projects')),
	array('label'=>'Libros', 'url'=>array('books')),
	array('label'=>'Capítulos de Libros', 'url'=>array('chapters')),
	array('label'=>'Registro de Propiedad Intelectual: Patentes', 'url'=>array('patents')),
	array('label'=>'Registro de Propiedad Intelectual: Software', 'url'=>array('software')),
	array('label'=>'Registro de Propiedad Intelectual: Derechos de Autor', 'url'=>array('copyrights')),
	array('label'=>'Artículos y Guías', 'url'=>array('articlesGuides')),
  array('label'=>'Graficas', 'url'=>array('Charts/index')),
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
<!-- <h3>en construcción . . .</h3> -->
<input type="text" id="search" onchange="search()" placeholder="Búsqueda por columna" class="searchcrud">
<div class="tableOpt">
	<div class="col-md-6">
		<span class="plain-select3">
<select id="valueHospital" onchange="change()">
  <option value="total" selected="">Total de Hospitales</option>
  <option >Hospital Civil Fray Antonio Alcalde</option>
  <option >Hospital Civil Dr. Juan I. Menchaca</option>
  <option>Otro</option>

</select>
</span>
</div>
	<div class="col-md-6">
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
	'id'=>'books-grid',
	'dataProvider'=>$articlesGuides,
	 'ajaxUpdate' => true,
	'filter' => null,
	'summaryText'=>'',
	'columns'=>array(
		  array('header'=>'Nombre de Usuario',
		 		'name'=>'names',
                ),
		  array('header'=>'Undad Hospitalaria',
		 		'value'=>'$data["hospital_unit"] == "NA" || $data["hospital_unit"] == null ? "Otro" : $data["hospital_unit"]',
                ),
		     array('header'=>'Título del Artículo o Guía',
		 		'name'=>'title',
                ),
		     array('header'=>'Tipo de Artículo',
		 		'name'=>'article_type',
                ),
		     array('header'=>'Revista',
		 		'name'=>'magazine',
                ),
		     array('header'=>'Fecha de Creación',
		 		'name'=>'creation_date',
                ),
		     array(
				'header'=>'Descarga Artículo o Guía',
       			 'type'=>'raw',
      			 'value'=>'CHtml::link("Descargar ".$data["title"].".", "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl."".$data["url_document"]."", array("target"=>"_blank"))',
                ),
   	),
)); ?>
