<?php 

/*echo "<pre>";

//print_r($results);
echo "</pre>";*/

$months = array("index", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$resultst2[0] = array("total"=>1,"month"=>9);
$resultst2[1] = array("total"=>3,"month"=>12);
$resultst2[2] = array("total"=>4,"month"=>11);
$resultst2[3] = array("total"=>5,"month"=>10);

/*for($i = 0; $i < 12; $i++){
		
		foreach ($results as $key => $value)
			$res1 = intval($value["month"]) === ($i+1) ? true : false;
	
	var_dump($res1);
		if($res1)
			array_push($results,array("total"=>0,"month"=>$i+1));

		foreach ($results2 as $keyx => $valuex)
			$res = intval($valuex["month"]) === ($i+1) ? true : false;
	
	var_dump($res);
		if($res)
			array_push($results2,array("total"=>0,"month"=>$i+1));

}

print_r($results);
echo "<hr>";
print_r($results2);*/
/*
		foreach ($results as $key => $value) {
			if($value["month"] == $i)
				break;
			
		 	$value["month"]=$i;
		 	$value["total"]=0;
		}
	*/

foreach($resultst2 as $key => $values){
	$data2[$months[$values["month"]]] = intval($values["total"]);
}

foreach($resultst as $key => $values){
	$data[$months[$values["month"]]] = intval($values["total"]);
	echo $values["month"]." - ".$values["total"]."<br>";
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
	    array("name"=>"Investigadores no SNI", "data"=>array_values($data2)),
    )
    )
    )
    );
 ?>
