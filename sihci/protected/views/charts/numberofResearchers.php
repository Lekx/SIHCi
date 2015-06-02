
<div class="form">
<?php 

$months = array("index", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");


echo print_r($year);
	 echo CHtml::dropDownList('year', '',$year);

foreach($resultsTotalReasearches as $key => $values){
	$data[$months[$values["month"]]] = intval($values["total"]);
}

foreach($resultResearchesSNI as $key => $values){
	$data2[$months[$values["month"]]] = intval($values["total"]);
	//echo $values["month"]." - ".$values["total"]."<br>";
}

foreach($resultResearchesnoSNI as $key => $values){
	$data3[$months[$values["month"]]] = intval($values["total"]);
}



/*print_r($data);
echo"<hr>";
print_r($data2);*/

//$cats = array_keys($data);
//$cats = array_merge(array_keys($data),array_keys($data2));

 

 $this->widget(
    'yiiwheels.widgets.highcharts.WhHighCharts',
    array(
    'pluginOptions' => array(
    'chart' => array('type' => 'column'),
    'title' => array('text' => 'Registro de usuarios por mes'),
    'xAxis' => array(
    	'categories' =>array_keys($data)
    ),
    'yAxis' => array(
    'title' => array('text' => 'Usuarios')
    ),
    'series' => array(
	    array("name"=>"Total de investigadores", "data"=>array_values($data)),
	    array("name"=>"Investigadores SNI", "data"=>array_values($data2)),
	    array("name"=>"Investigadores no SNI", "data"=>array_values($data3)),
    )
    )
    )
    );
 ?>
</div>