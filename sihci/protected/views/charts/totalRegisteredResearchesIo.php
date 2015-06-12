
<?php 

     //echo print_r($year);
    // echo CHtml::dropDownList('years', '',$years);
/*

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

*/
 ?>


<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<?php $results = array_values($results); 
$json_results = json_encode($results);
 $resultsResearchersdown = array_values($resultsResearchersdown); 
$json_researchDown = json_encode($resultsResearchersdown);
//echo print_r($results);
//echo print_r($resultsResearchersdown);
?>



<script>

$(function () {

    var results = "<?php  echo $json_results; ?>";
    var resultsResearchersdown = "<?php  echo $json_researchDown; ?>";

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Registro de Investigadores por mes'
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
                'Dec',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total de Investigadores'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>s{point.y:.1f} mm</b></td></tr>',
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
            name: 'Ingreso de Investigadores',
            data: [results ]

        }, {
            name: 'Bajas de Investigadores',
            data: [1]
        }]
    });
});
</script> 




