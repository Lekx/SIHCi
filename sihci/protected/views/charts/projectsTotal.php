<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Estadisticas.svg" alt="">
            <h1>Estadisticas</h1>
            <hr>
        </div>
        <h3>Total de proyectos registrados</h3>
<div class="tooltipchart" style="padding:2px;font-size:10px;display:none;position:absolute;top:500px;left:500px;z-index:9999;">Seleccionar este elemento</div>


<div class="grafiOpt">
  <div class="col-md-4">Año del reporte</div>
  <div class="col-md-4">Tipo de proyecto</div>
  <div class="col-md-4">Patrocinados</div>
</div>
<div class="grafiOpt">
<div class="col-md-4">
    <span class="plain-select2">
<?php echo CHtml::dropDownList('years', '',$years,array('onchange'=>'loadChart()','class'=>'dropinline')); ?>
    </span>
</div>
<div class="col-md-4">
    <span class="plain-select2">
<?php echo CHtml::dropDownList('proyecto', '',array("total"=>"Total","abiertos"=>"Abiertos","concluidos"=>"Concluidos","rechazados"=>"Rechazados"),array('onchange'=>'loadChart()','class'=>'dropinline')); ?>
</span>
</div>
<div class="col-md-4">
    <span class="plain-select2">
<?php echo CHtml::dropDownList('patrocinador', '',array("total"=>"Todos","patrocinado"=>"Patrocinado","Nopatrocinado"=>"No patrocinado"),array('onchange'=>'loadChart()','class'=>'dropinline')); ?>
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
            type: 'column',
              events: {
                load: function () {
                    var chart = this,
                        legend = chart.legend;

                    for (var i = 0, len = legend.allItems.length; i < len; i++) {
                        (function(i) {
                            var item = legend.allItems[i].legendItem;
                            item.on('mouseover', function (e) {
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
            text: 'Proyectos registrados en el sistema' + '<br>'+ ($("#years").val() == 'total' ? data.totalUsers : $("#years").val() != 'total' ? data.total : data.total)
        },
        subtitle: {
            text: 'SIHCi: Sistema de Investigación del Hospital Civil de Guadalajara'
        },
        xAxis: {
            categories: ($("#years").val() == 'total' ? data.totalUsers : data.months),
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

            name: 'Hospital Civil Fray Antonio Alcalde' + '<br>' + 'Total:' + '' + data.faa,
            data: data.faa

        }, {

            name: 'Hospital Civil Dr. Juan I. Menchaca'+ '<br>' + 'Total:' + '' + data.jim,
            data: data.jim

        }, {
            name: 'No asignados'+ '<br>' + 'Total:' + '' + data.other,
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
