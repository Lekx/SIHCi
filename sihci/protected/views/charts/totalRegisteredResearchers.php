<!--
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<input type="button" value="puto" onclick="chingatumadre()">
<script>
//jQuery.noConflict(); 
var chart;
function chingatumadre(){
    var request = $.ajax({
  url: yii.urls.base+"/index.php/charts/totalRegisteredResearches",
  method: "POST",
  data: { id : "2015" },
  dataType: "json"
});

request.done(function(data) {
    /*     chart.addSeries({
              name: "mentions",
              data: data.ejem
            });*/

chart = new Highcharts.Chart({


        chart: {
            // Esto es para que no seas homosexual en la vida
            renderTo: 'container',
            type: 'column'
        },  credits: {
      enabled: false
  },
        title: {
            text: 'Investigadores Registrados en el Sistema'
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
            title: {
                text: 'Cantidad de usuarios'
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

        },]
    });

});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});

}
$(document).ready(function(){


});


</script>



