<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Beranda</h2>
                <h5 class="text-white op-7 mb-2">Halaman Beranda Informasi Sistem</h5>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-3">
            <div class="card card-success">
                <div class="card-header">
                    <div class="card-title">Jumlah Total Buku </div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1><?= $jmlbuku['Jumlah'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-info" data-jenis="bytahun" data-nilai="<?= $maxtahun['Tahun_Terbit'] ?>" onclick="rekap_dashboard(this)">
                <div class="card-header">
                    <div class="card-title">Tahun Penerbitan Terbanyak</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1><?= $maxtahun['Tahun_Terbit'] . " (" . $maxtahun['Jumlah'] . ")" ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-warning" data-jenis="bypenerbit" style="cursor: pointer;" data-nilai="<?= $maxpenerbit['Penerbit'] ?>" onclick="rekap_dashboard(this)">
                <div class="card-header">
                    <div class="card-title">Penerbit Terbanyak</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1><?= $maxpenerbit['Penerbit'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-danger" onclick="rekap_dashboard(this)" data-jenis="byrak" style="cursor: pointer;" data-nilai="<?= $maxrak['Rak'] ?>">
                <div class="card-header">
                    <div class="card-title">Rak Penampung Terbanyak</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1>Blok <?= $maxrak['Rak'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" id="rendergrafik1"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" id="rendergrafik2"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="form-group col-md-12">
                    <label>Penerbit</label>
                    <select name="" id="cbopenerbit" class="form-control" onchange="getdatagrafik()">
                        <option value="">Pilih Salah Satu</option>
                        <?php
                        if (is_array($dtpenerbit)) {
                            if (count($dtpenerbit) > 0) {
                                foreach ($dtpenerbit as $items) {
                                    $id = $items['ID_Penerbit'];
                                    $nama = $items['Nama_Penerbit'];
                                    echo "<option value='$id'>$nama</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="card-body" id="rendergrafik3"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blokjudul" style="font-size: 20px;"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="blokhasil" style="font-size: 17px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#mnberanda").addClass("active")
    $(document).ready(function() {
        grafikstatis();
        grafikdinamis();

        function grafikstatis() {
            Highcharts.chart('rendergrafik1', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Data Statis'
                },
                subtitle: {
                    text: 'Data Penjualan 2022'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Unit'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size: 15px;">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color}; padding: 0;">{series.name}:</td>' +
                        '<td style="padding: 0;">&nbsp;<b>{point.y:.0f} Unit</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Penjualan HP',
                    data: [66, 32, 20, 93, 41, 58]
                }]
            });
        }

        function grafikdinamis() {
            Highcharts.chart('rendergrafik2', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Data Dinamis'
                },
                subtitle: {
                    text: 'Data Penjualan Per Tahun'
                },
                xAxis: {
                    categories: [<?php
                                    foreach ($dtbuku as $items) {
                                        echo "'" . $items['Tahun_Terbit'] . "',";
                                    }
                                    ?>],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Buah'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size: 15px;">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color}; padding: 0;">{series.name}:</td>' +
                        '<td style="padding: 0;">&nbsp;<b>{point.y:.0f} Buah</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Penjualan Buku',
                    data: [<?php
                            foreach ($dtbuku as $k) {
                                echo $k['Jumlah'] . ",";
                            }
                            ?>]
                }]
            });
        }
    })

    function getdatagrafik() {
        let penerbit = $('#cbopenerbit').find(':selected').val();
        if (penerbit != '') {
            $.getJSON(`<?= BASEURLKU ?>grafik/${penerbit}`, function(response) {
                if (response.length != 0) {
                    let tahunf = [];
                    let jumlahf = [];
                    $.each(response, function(i, key) {
                        let th = key.Tahun_Terbit
                        let jml = key.Jumlah
                        tahunf.push(th)
                        jumlahf.push(parseInt(jml));
                    })
                    buatgrafik(tahunf, jumlahf)
                } else {
                    swal({
                        icon: 'error',
                        title: 'Maaf',
                        text: 'Data tidak di temukan!'
                    });
                    $('#rendergrafik3').empty();
                }
            })
        } else {
            $('#rendergrafik3').empty();
        }
    }

    function buatgrafik(tahunf, jumlahf) {
        Highcharts.chart('rendergrafik3', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Grafik Data By Penerbit'
            },
            subtitle: {
                text: 'Pengelompokan Berdasarkan Tahun'
            },
            xAxis: {
                categories: tahunf,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size: 15px;">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color}; padding: 0;">{series.name}:</td>' +
                    '<td style="padding: 0;">&nbsp;<b>{point.y:.0f} Buah</b></td></tr>',
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
                name: 'Jumlah Buku',
                data: jumlahf
            }]
        });
    }

    function rekap_dashboard(el) {

        let jenis = $(el).data('jenis');
        let nilai = $(el).data('nilai');

        let judul = "";
        if (jenis == "" || nilai == "") {
            swal({
                title: 'Gagal',
                text: 'Rekap Tidak Terdeteksi!',
                icon: 'error'
            })
            return;
        }
        $.getJSON(
            `<?= BASEURLKU; ?>rekapdashboard/${jenis}/${nilai}`,
            function(res) {
                console.log(res);
                if (res) {
                    let data = "";
                    let daftar = ["success", "primary", "info", "warning", "secondary", "danger", "default"];
                    $.each(res, function(i, obj) {
                        let color = Math.floor(Math.random() * 7);
                        data += `<div class="alert alert-${daftar[color]}  role="alert">${obj.Judul}</div>`
                    })
                    $("#blokhasil").html(data);
                    if (jenis == 'bytahun') {
                        judul = "Rekap Buku Berdasarkan Tahun " + nilai
                    } else if (jenis == 'bypenerbit') {
                        judul = "Rekap Buku Berdasarkan Penerbit " + nilai
                    } else {
                        judul = "Rekap Buku Berdasarkan Rak " + nilai
                    }

                    $("#blokjudul").text(judul)
                    $("#modalDetail").modal('show')
                } else {
                    swal({
                        title: 'Gagal',
                        text: 'Data Tidak Di Temukan!',
                        icon: 'error'
                    })
                    $("#blokhasil").html("")
                }
            }
        )
    }
</script>