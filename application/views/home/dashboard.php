<<<<<<< HEAD
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
=======
<div class="content-wrapper">
  <div class="container-fluid">
      <div class="col-sm-12">
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Bulan', 'Aduan', 'Tindak Lanjut'],
                  ['Januari', 10, 7],
                  ['Februari', 7, 4],
                  ['Maret', 9, 8],
                  ['April', 5, 4],
                  ['Mei', 10, 8],
                  ['Juni', 9, 7],
                  ['Juli', 5, 5],
                  ['Agustus', 10, 7],
                  ['September', 6, 6],
                  ['Oktober', 10, 11],
                  ['November', 6, 3],
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
          </head>
          <body>
            <div id="barchart_material" style="width: 1000px; height: 600px;"></div>
          </body>
        </html>
      </div>
    </div>
  </div>
</div>
>>>>>>> e3966c814671b40a22d011a1afe0d0bfc7bbba00
