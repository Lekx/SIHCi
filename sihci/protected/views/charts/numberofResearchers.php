<?php 
echo CHtml::dropDownList('years', '',$years,array(
'ajax'=> array(
    'type'=>'POST',
    'url'=>$this->createUrl('caca'),
    'data'=>array('selectedYear'=>'js:this.value'),
    
    'success' => 'function(data){
      //   document.getElementById("initialChart").remove();
     //   $("#chale").html("asdf");
       $("#chale").html(data);
        //$("#initialChart").xAxis[0].setCategories([2,4,5,6,7], false);
    }',
    //'update' => '#chale',
    )
));
?>
<div id="chale" style="overflow:hidden;position:relative;border:1px solid red;"></div>

  <?php
  $this->widget(
        'yiiwheels.widgets.highcharts.WhHighCharts',
        array(
            'id'=>'initialChart',
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