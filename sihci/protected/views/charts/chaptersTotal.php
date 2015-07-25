<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Estadisticas.svg" alt="">
            <h1>Estadisticas</h1>
            <hr>
        </div>
        <h3>Total de capítulos de libros</h3>
<div class="tooltipchart">Seleccionar este elemento</div>

<div class="grafiOpt">
  <div class="col-md">Año del reporte</div>
</div>
<div class="grafiOpt">
    <div class="col-md">
            <span class="plain-select2">
  <?php echo CHtml::dropDownList('years', '',$years,array('onchange'=>'loadChart()')); ?>
</span>
    </div>
</div>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<!-- <input type="button" value="puto" onclick="loadChart()"> -->
<script>
//jQuery.noConflict();
var chart;
function loadChart(){
var request = $.ajax({
  url: yii.urls.base+"/index.php/charts/chaptersTotal",
  method: "POST",
  data: { hu : $("#hu").val(), years : $("#years").val()/*,sni : $("#sni").val(), type : $("#type").val()*/},
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
            type: 'column',
              events: {
                load: function () {
                    var chart = this,
                        legend = chart.legend;

   for (var i = 0, len = legend.allItems.length; i < len; i++) {
                        (function(i) {
                            var item = legend.allItems[i].legendItem;
                            item.on('mouseover', function (e) {
                              var childPosition = $(".highcharts-legend-item text:eq( "+i+" ) ").offset();
                               $(".tooltipchart").css("top",childPosition.top+20);
                               $(".tooltipchart").css("left",childPosition.left);
                               $(".tooltipchart").show();
                            }).on('mouseout', function (e) {
                                $(".tooltipchart").hide();
                            });
                        })(i);
                    }
                }
            }
        },  credits: {
      enabled: false
  },
        title: {
            text: 'Capítulos de libros registrados en el sistema'
        },
		  legend: {
			enabled: true
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
                text: 'Cantidad de capítulos de libros'
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
            data: data.faa,
			showInLegend: true


        }, {

            name: 'Hospital Civil Dr. Juan I. Menchaca',
            data: data.jim,
			 showInLegend: true

        }, {
            name: 'Otros',
            data: data.other,
			showInLegend: true

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
