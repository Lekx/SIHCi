<style>
	canvas{
		width: 100% !important;
		height: auto !important;
		border:1px solid red;
	}


</style>
  <?php

  $this->widget(
        'yiiwheels.widgets.highcharts.WhHighCharts',

        array(
        	'id'=>'grapxgrid',
            'pluginOptions' => array(
            'chart' => array('type' => 'column'),
            'title' => array('text' => 'Registro de usuarios por mes'),
            'xAxis' => array(
            	'categories' =>array_keys($resultsTotalReasearches)
            ),
            'yAxis' => array(
            'title' => array('text' => 'Usuarios')
        ),
        'series' => array(
    	    array("name"=>"Total de investigadores", "data"=>array_values($resultsTotalReasearches)),
    	    array("name"=>"Investigadores SNI", "data"=>array_values($resultResearchesSNI)),
    	    array("name"=>"Investigadores no SNI", "data"=>array_values($resultResearchesnoSNI)),
        )
        )
        )
        );

        ?>