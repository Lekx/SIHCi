
<div class="form">
<?php 

     //echo print_r($year);
     echo CHtml::dropDownList('years', '',$years);

     

 $this->widget(
    'yiiwheels.widgets.highcharts.WhHighCharts',
    array(
    'pluginOptions' => array(
    'chart' => array('type' => 'column'),
    'title' => array('text' => 'Registro de Investigadores por mes'),
    'xAxis' => array(
        'categories' =>array_keys($results)
    ),
    'yAxis' => array(
    'title' => array('text' => 'Total de Investigadores')
    ),
    'series' => array(
        array("name"=>"Ingreso de Investigadores", "data"=>array_values($results)),
        array("name"=>"Bajas de Investigadores", "data"=>array_values($resultsResearchersdown)),
     
    )
    )
    )
    );

 ?>
</div>