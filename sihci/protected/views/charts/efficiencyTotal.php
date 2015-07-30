<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/Estadisticas.svg" alt="">
            <h1>Estadisticas</h1>
            <hr>
        </div>
        <h3>Total de Eficiencia</h3>


        <div class="grafiOpt">
          <div class="col-md">Año del reporte</div>
        </div>

        <div class="grafiOpt">
          <div class="col-md">
        <span class="plain-select2">
      <?php echo CHtml::dropDownList('years', '',$years,array('onchange'=>'loadChart()','class'=>'dropinline')); ?>
        </span>
        </div>
        </div>

<div class="tooltipchart">Seleccionar este elemento</div>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>
//jQuery.noConflict();
var chart;
var theTotals = 0;
var theTotalFaa = 0;
var theTotalJim = 0;
var theTotalOther = 0;

function loadChart(){
var request = $.ajax({
  url: yii.urls.base+"/index.php/charts/efficiencyTotal",
  method: "POST",
  data: { /*hu : $("#hu").val(), */years : $("#years").val()/*,proyecto : $("#proyecto").val(), patrocinador : $("#patrocinador").val()*/},
  dataType: "json"
});

request.done(function(data) {
    /*     chart.addSeries({
              name: "mentions",
              data: data.ejem
            });*/

function total(){
  var theTotals = 0;
          for(var i = 0; i < data.total.length; i++){
                        theTotals += data.total[i] << 0;
                    }
    return theTotals;
}

function totalFaa(){
  var theTotalFaa = 0;
          for(var i = 0; i < data.faa.length; i++){
                        theTotalFaa += data.faa[i] << 0;
                    }
    return theTotalFaa;
}

function totalJim(){
  var theTotalJim = 0;
          for(var i = 0; i < data.jim.length; i++){
                        theTotalJim += data.jim[i] << 0;
                    }
    return theTotalJim;
}

function totalOther(){
  var theTotalOther = 0;
          for(var i = 0; i < data.other.length; i++){
                        theTotalOther += data.other[i] << 0;
                    }
    return theTotalOther;
}

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
                               $(".tooltipchart").css("top",childPosition.top+40);
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
            text: 'Total de eficiancia' + '<br>' + 'Total:'+ ' ' +($("#years").val() == 'total' ? data.totalUsers : $("#years").val() != 'total' ? totals = total() : '')
        },
        subtitle: {
            text: 'SIHCi: Sistema de Investigación del Hospital Civil de Guadalajara'
        },
        xAxis: {

            categories: ($("#years").val() == 'total' ? data.totales : data.months), 
            crosshair: true
        },
        yAxis: {
            min: 0,
            allowDecimals: false,
            title: {
                text: 'Cantidad de proyectos completados'
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

            name: 'Hospital Civil Fray Antonio Alcalde' + '<br>' + 'Total' + ' ' + ($("#years").val() == 'total' ? data.faa : $("#years").val() != 'total' ? faa = totalFaa() : ''),
            data: data.faa

        }, {

            name: 'Hospital Civil Dr. Juan I. Menchaca' + '<br>' + 'Total' + ' ' + ($("#years").val() == 'total' ? data.jim : $("#years").val() != 'total' ? jim = totalJim() : ''),
            data: data.jim

        }, {
            name: 'Otros' + '<br>' + 'Total' + ' ' + ($("#years").val() == 'total' ? data.other : $("#years").val() != 'total' ? other = totalOther() : ''),
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
