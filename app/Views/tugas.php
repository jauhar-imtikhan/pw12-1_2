<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Tugas</h2>
                <h5 class="text-white op-7 mb-2">Halaman Tugas Informasi Sistem</h5>
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
                        <h1><?= $minjmlbuku['Jumlah'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-header">
                    <div class="card-title">Tahun Penerbitan Tersedikit</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1><?= $mintahun['Tahun_Terbit'] . " (" . $mintahun['Jumlah'] . ")" ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-warning">
                <div class="card-header">
                    <div class="card-title">Penerbit Tersedikit</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1><?= $minpenerbit['Penerbit'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-danger">
                <div class="card-header">
                    <div class="card-title">Rak Penampung Tersedikit</div>
                </div>
                <div class="card-body pb-0">
                    <div class="mb-4 mt-2">
                        <h1>Blok <?= $minrak['Rak'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" id="table-2">
            <thead class="thead-light">
                <tr>
                    <th>Tahun Penerbitan Tersedikit</th>
                    <th>Jumlah Penerbit Tersedikit</th>
                    <th>Jumlah Rak Penampungan Tersedikit</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<script>
    $("#mntugas").addClass("active")
    let table = $('#table-2').DataTable()
    $(document).ready(function() {
        $.ajax({
            url: '<?= BASEURLKU ?>getTugas',
            method: 'GET',
            success: function(res) {
                // console.log(res);
                var tbody = $('#table-2 tbody');
                tbody.empty();
                const DATA = $.map(res.data, function(obj) {
                    let string = {
                        tahun: obj.tahun_tersedikit,
                        penerbit: obj.penerbit_tersedikit,
                        rak: obj.rak_tersedikit
                    }
                    return string
                })
                $.each(res, function(i, key) {
                    console.log(key);
                    $.each(key.tahun, function(k, o) {
                        let row = $('<tr>')
                        row.append($('<td>').text(o))
                        row.append($('<td>').text(key.rak))
                        row.append($('<td>').text(key.penerbit))
                        tbody.append(row)
                    })

                })
            },
            error: function(err) {
                console.log(err);
            }
        })
    })
</script>