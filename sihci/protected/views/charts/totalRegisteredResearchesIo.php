
<div class="form">
<?php 

        foreach($years AS $index => $value)
            echo $value."<br>";

$months = array("index", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");


	 echo print_r($years);
	 echo CHtml::dropDownList('year', '', $year);



foreach($results as $key => $values){
	$data[$months[$values["month"]]] = intval($values["total"]);
}

foreach($resultsResearchersdown as $key => $values){
	$data2[$months[$values["month"]]] = intval($values["total"]);
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
	    array("name"=>"Ingreso de Investigadores", "data"=>array_values($data)),
	    array("name"=>"Bajas de Investigadores", "data"=>array_values($data2))
	 
    )
    )
    )
    );
 ?>
</div>