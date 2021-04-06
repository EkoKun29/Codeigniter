<style type="text/css">
    ::-webkit-scrollbar-track-piece:start {
        /* Select the top half (or left half) or scrollbar track individually */
    }

    ::-webkit-scrollbar-thumb:window-inactive {
        /* Select the thumb when the browser window isn't in focus */
    }

    ::-webkit-scrollbar-button:horizontal:decrement:hover {
        /* Select the down or left scroll button when it's being hovered by the mouse */
    }
</style>
<!-- partial -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <i class="fa fa-arrow-circle-down icon-lg text-primary"></i>
                        <div class="ml-3">
                            <p class="mb-0">Jumlah Aduan</p>
                            <h6>123</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <i class="fa fa-circle-o-notch fa-spin icon-lg text-warning"></i>
                        <div class="ml-3">
                            <p class="mb-0">Jumlah Tindak Lanjut</p>
                            <h6>123</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <i class="fa fa-check-square icon-lg text-danger"></i>
                        <div class="ml-3">
                            <p class="mb-0">Jumlah Jumlah Selesai</p>
                            <h6>123</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-md-center">
                        <i class="fa fa fa-window-close icon-lg text-success"></i>
                        <div class="ml-3">
                            <p class="mb-0">Jumlah Ditolak</p>
                            <h6>123</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body" style="width: 100%; left:200px;">
                    <h4 class="card-title">List Permohonan</h4>
                    <canvas style="" id="barChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-3 grid-margin stretch-card">

            <div class="card" style="overflow-y: scroll; height: 470px">
                <div class="card-body">
                    <h4 class="card-title">Rating</h4>
                    <?php foreach ($list_bulan as $data) {
                        $stt = $this->pembayaran_model->status_approval($data->Bulan);
                    ?>
                        <div class="wrapper d-flex align-items-center py-2 border-bottom">
                            <div class="wrapper ml-3">
                                <h6 class="ml-1 mb-1"><?= convertBulan($data->Bulan); ?></h6>
                                <small class="text-muted mb-0"><i class="mdi mdi-map-marker-outline mr-1"></i><?= $stt->StatusProgress; ?></small>
                            </div>
                            <?php if ($stt->StatusProgress != "approved_bpkad") { ?>
                                <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-plus font-weight-bold"></i></div>
                            <?php } else { ?>
                                <div class="badge badge-pill badge-info ml-auto px-1 py-1"><i class="mdi mdi-check font-weight-bold"></i></div>
                            <?php } ?>
                        </div>

                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

    <script src="<?= base_url('template/backend/') ?>vendors/chart.js/Chart.min.js"></script>
    <script>
        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }


        var data = {
            labels: <?php echo $bulanchart; ?>,
            datasets: [{
                label: 'Gaji',
                data: <?php echo $totalgajibulananchart; ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false,
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        };

        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>