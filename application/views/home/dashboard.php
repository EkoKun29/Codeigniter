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