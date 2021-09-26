<!DOCTYPE html>
<div class="content-wrapper">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-12">
<section class="content">
<center><h1 class="m-0 text-dark">Grafik Aduan</h1></center>

<figure class="highcharts-figure">
    <div id="container"></div>

</figure>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Per 3 Bulan'
    },
  
    xAxis: {
        categories: ['1750', '1800', '1850', '1900', '1950', '1999', '2050'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Billions'
        },
        labels: {
            formatter: function () {
                return this.value / 1000;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' millions'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Asia',
        data: [502, 635, 809, 947, 1402, 3634, 5268]
    }, {
        name: 'Africa',
        data: [106, 107, 111, 133, 221, 767, 1766]
    
    }]
});
</script>

</div>
</div>
</div>
</div>
</html>