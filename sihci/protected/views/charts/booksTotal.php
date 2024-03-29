<!--Unidad Hospitalaria 
<?php  //echo CHtml::dropDownList('hu', '',array("ambos"=>"Total","Hospital Civil Dr. Juan I. Menchaca"=>"Hospital Civil Dr. Juan I. Menchaca","Hospital Civil Fray Antonio Alcalde"=>"Hospital Civil Fray Antonio Alcalde","otro"=>"otro"),array('onchange'=>'loadChart()')); ?><br/>-->
Año de reporte 
<?php echo CHtml::dropDownList('years', '',$years,array('onchange'=>'loadChart()')); ?><br/>
<!--¿Perteneciente al SNI?
<?php /*echo CHtml::dropDownList('sni', '',array("total"=>"Total","no"=>"no","yes"=>"si"),array('onchange'=>'loadChart()')); */?><br/> -->
<!--Tipo de reporte 
<?php /* echo CHtml::dropDownList('type', '',array("total"=>"total registrados","bajas"=>"bajas","altas"=>"altas"),array('onchange'=>'loadChart()')); */?><br/> -->


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>
//jQuery.noConflict(); 
var chart;
function loadChart(){
var request = $.ajax({
  url: yii.urls.base+"/index.php/charts/booksTotal",
  method: "POST",
  data: { hu : $("#hu").val(), years : $("#years").val()/*,sni : $("#sni").val()/*, type : $("#type").val()*/},
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
            text: 'Libros registrados en el sistema'
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
                text: 'Cantidad de libros'
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