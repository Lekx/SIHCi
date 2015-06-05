
<?php 

     //echo print_r($year);
    // echo CHtml::dropDownList('years', '',$years);

 /*$this->widget(
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
    );*/

    /*$this->Widget('ext.highcharts.HighchartsWidget', array(
       'options'=>array(
          'title' => array('text' => 'Fruit Consumption'),
          'xAxis' => array(
             'categories' => array('Apples', 'Bananas', 'Oranges')
          ),
          'yAxis' => array(
             'title' => array('text' => 'Fruit eaten')
          ),
          'series' => array(
             array('name' => 'Jane', 'data' => array(1, 0, 4)),
             array('name' => 'John', 'data' => array(5, 7, 3))
          )
       )
    ));*/
 ?>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


<script>
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });
});
</script>

