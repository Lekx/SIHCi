

<!--Unidad Hospitalaria 
<?php // echo CHtml::dropDownList('hu', '',array("ambos"=>"ambos","Hospital Civil Dr. Juan I. Menchaca"=>"Hospital Civil Dr. Juan I. Menchaca","Hospital Civil Fray Antonio Alcalde"=>"Hospital Civil Fray Antonio Alcalde","otro"=>"otro"),array('onchange'=>'loadChart()')); ?><br/>-->
Año de reporte 
<?php echo CHtml::dropDownList('years', '',$years,array('onchange'=>'loadChart()')); ?><br/>
Tipo de proyecto
<?php echo CHtml::dropDownList('proyecto', '',array("total"=>"Total","abiertos"=>"Abiertos","concluidos"=>"Concluidos","rechazados"=>"Rechazados"),array('onchange'=>'loadChart()')); ?><br/>
patrocinados
<?php echo CHtml::dropDownList('patrocinador', '',array("total"=>"Todos","patrocinado"=>"Patrocinado","No patrocinado"=>"No patrocinado"),array('onchange'=>'loadChart()')); ?><br/>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!-- <input type="button" value="puto" onclick="loadChart()"> -->
<script>
//jQuery.noConflict(); 
var chart;
function loadChart(){
var request = $.ajax({
  url: yii.urls.base+"/index.php/charts/projectsTotal",
  method: "POST",
  data: { /*hu : $("#hu").val(), */years : $("#years").val(),proyecto : $("#proyecto").val(), patrocinador : $("#patrocinador").val()},
  dataType: "json"
});

request.done(function(data) {
    /*     chart.addSeries({
              name: "mentions",
              data: data.ejem
            });*/

chart = new Highcharts.Chart({


        chart: {
            renderTo: 'container',
            type: 'column'
        },  credits: {
      enabled: false
  },
        title: {
            text: 'Proyectos Registrados en el Sistema'
        },
        subtitle: {
            text: 'SIHCi: Sistema de Investigación del Hospital Civil de Guadalajara'
        },
        xAxis: {
            categories: data.months,
            crosshair: true
        },
        yAxis: {
            min: 0,
            allowDecimals: false,
            title: {
                text: 'Cantidad de Proyectos'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} investigadores</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
       tooltip: {
    
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{

            name: 'Hospital Civil Fray Antonio Alcalde',
            data: data.faa

        }, {

            name: 'Hospital Civil Dr. Juan I. Menchaca',
            data: data.jim

        }, {
            name: 'Otros',
            data: data.other

        },]
    });

});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});

}
$(document).ready(function(){
    loadChart();

});


</script>



