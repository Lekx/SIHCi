<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Tablas'=>array('index'),
	'Ingreso de investigadores',
);
$this->menu=array(
	array('label'=>'Graficas', 'url'=>array('Charts/index')),
	array('label'=>'Cantidad de investigadores', 'url'=>array('researchers')),
	array('label'=>'Proyectos de investigación', 'url'=>array('projects')),
	array('label'=>'Libros', 'url'=>array('books')),
	array('label'=>'Capítulos de libros', 'url'=>array('chapters')),
	array('label'=>'Registro de propiedad intelectual: Patentes', 'url'=>array('patents')),
	array('label'=>'Registro de propiedad intelectual: Software', 'url'=>array('software')),
	array('label'=>'Registro de propiedad intelectual: Derechos de autor', 'url'=>array('copyrights')),
	array('label'=>'Artículos y guías', 'url'=>array('articlesGuides')),
);
?>

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
<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Estadisticas.svg" alt="">
            <h1>Estadisticas</h1>
            <hr>
        </div>
				<h3>
					<?php echo $titlePage ?>
				</h3>
<input type="text" id="search" onchange="search()" placeholder="Búsqueda por columna" class="searchcrud">
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

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'books-grid',
	'dataProvider'=>$chapters,
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
		  array('header'=>'Capítulo del libro',
		 		'name'=>'chapter_title',
                ),
		     array('header'=>'Título del libro',
		 		'name'=>'book_title',
                ),
		     array('header'=>'Publicado por:',
		 		'name'=>'publishers',
                ),
		     array('header'=>'Fecha de creación',
	'value'=>'date("d/m/Y H:i:s", strtotime($data["creation_date"]))',                ),
		     array(
				'header'=>'Descarga de capítulos de libros',
       			 'type'=>'raw',
				 'htmlOptions' => array('style' => 'width: 120px;','class'=>'downloadrow'),
      			 'value'=>'$data["url_doc"] == "" ? "no hay archivo" : CHtml::link("<img src='.Yii::app()->request->baseUrl.'/img/icons/descargar.png>", "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl."".$data["url_doc"]."", array("target"=>"_blank"))',
                ),
   	),
)); ?>
