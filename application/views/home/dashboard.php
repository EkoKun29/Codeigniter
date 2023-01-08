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
        categories: ['Januari', 'Maret', 'Juni', 'September', 'Desember'],
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
                return this.value;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' '
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
        name: 'Aduan',
        data: [4, 4, 0, 1, 2]
    }, {
        name: 'Tindak Lanjut',
        data: [2, 3, 0, 1, 2]
    
    }]
});
</script>
<br>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Bulan', 'Aduan', 'Tindak Lanjut'],
                  ['Januari', 4, 4],
                  ['Maret', 4, 3],
                  ['Juni', 0, 0],
                  ['September', 1, 1],
                  ['Desember', 2, 2],
                  //<
                  // $query = "SELECT * from chart";
                  // $res=mysqli_query($conn,$query);
                  // while($data=mysqli_fetch_array($res)){
                  //   $bulan=$data['bulan'];
                  //   $aduan=$data['aduan'];
                  //   $tindak_lanjut=$data['tindak lanjut'];
                  //?>
                  //['< echo $bulan;?>', < echo $aduan;?>, < echo $tindak_lanjut;?>],
                  //<
                  // }
                  //?>
                ]);

                var options = {
                  chart: {
                    title: 'Grafik Laporan',
                    subtitle: 'Aduan dan Tindak Lanjut Tahun 2021',
                  },
                  bars: 'horizontal'
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
              }
            </script>
       
          <body>
            <div id="barchart_material" style="width: 1000px; height: 600px;"></div>
          </body>
          </div>
</div>
</div>
</div>
</html>
            </br>