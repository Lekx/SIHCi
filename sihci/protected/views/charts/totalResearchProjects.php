
<div class="form">
<?php 


	// echo print_r($year);
	 echo CHtml::dropDownList('years', '', $years);


 $this->widget(
    'yiiwheels.widgets.highcharts.WhHighCharts',
    array(
    'pluginOptions' => array(
    'chart' => array('type' => 'column'),
    'title' => array('text' => 'Registro de Investigadores por mes'),
    'xAxis' => array(
    	'categories' =>array_keys($totalProjects)
    ),
    'yAxis' => array(
    'title' => array('text' => 'Total de Investigadores')
    ),
    'series' => array(
	    array("name"=>"Total proyectos de investigación ", "data"=>array_values($totalProjects)),
	    array("name"=>"Proyectos Investigación abiertos", "data"=>array_values($TotalOpenProjects)),
        array("name"=>"Proyectos Investigación concluidos", "data"=>array_values($CompletedProjectsTotals)),
	 
    )
    )
    )
    );
 ?>
</div>