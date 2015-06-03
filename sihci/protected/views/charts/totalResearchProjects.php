
<div class="form">
<?php 

$months = array("index", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

//foreach($year as $key => $values){
	 echo print_r($year);
	 echo CHtml::dropDownList('year', '', $year);
	 //echo CHtml::dropDownList('year',$year, array($values));
//}

foreach($totalProjects as $key => $values){
	$data[$months[$values["month"]]] = intval($values["total"]);
}

foreach($resultsResearchersdown as $key => $values){
	$data2[$values["month"]] = intval($values["total"]);
}

 $this->widget(
    'yiiwheels.widgets.highcharts.WhHighCharts',
    array(
    'pluginOptions' => array(
    'chart' => array('type' => 'column'),
    'title' => array('text' => 'Registro de Investigadores por mes'),
    'xAxis' => array(
    	'categories' =>array_keys($data)
    ),
    'yAxis' => array(
    'title' => array('text' => 'Total de Investigadores')
    ),
    'series' => array(
	    array("name"=>"Total proyectos de investigación ", "data"=>array_values($data)),
	    array("name"=>"Proyectos Investigación concluidos", "data"=>array_values($data2)),
	 
    )
    )
    )
    );
 ?>
</div>