<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Data Buku</h2>
                <h5 class="text-white op-7 mb-2">Halaman Pengelolaan Buku</h5>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="car-header">
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Data Buku</button>
                    <a href="<?= BASEURLKU ?>pdfdinamis" class="btn btn-warning  m-2" target="_blank">Cetak PDF Dinamis</a>
                    <a href="<?= BASEURLKU ?>pdfstatis" class="btn btn-secondary text-white m-2" target="_blank">Cetak PDF Statis</a>
                    <a href="<?= BASEURLKU ?>excelstatis" class="btn btn-success text-white m-2" target="_blank">Cetak Excel Statis</a>
                    <a href="<?= BASEURLKU ?>exceldinamis" class="btn btn-danger text-white m-2" target="_blank">Cetak Excel Dinamis</a>
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover" id="tblku">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Kode</th>
                                    <th style="width: 20%;">Judul</th>
                                    <th style="width: 10%;">Pengarang</th>
                                    <th style="width: 10%;">Penerbit</th>
                                    <th style="width: 10%;">Tahun</th>
                                    <th style="width: 10%;">ISBN</th>
                                    <th style="width: 15%;">Operasi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="modalAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURLKU ?>adddatabuku" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group col-md-12">
                        <label>Kode Buku</label>
                        <input type="text" name="txtkodex" class="form-control fupdate" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Judul</label>
                        <input type="text" name="txtjudulx" class="form-control ftambah" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>ISBN</label>
                        <input type="text" name="txtISBNx" class="form-control ftambah" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Pengarang</label>
                        <select name="txtpengarangx" class="form-control ">
                            <option value="">Pilih Salah Satu</option>
                            <?php if (is_array($dtpengarang)) {
                                if (count($dtpengarang) > 0) {
                                    foreach ($dtpengarang as $k) {
                                        $id = $k['ID_Pengarang'];
                                        $nama = $k['Nama_Pengarang'];
                                        echo "<option value='$id'>$nama</option>";
                                    }
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Penerbit</label>
                        <select name="txtpenerbitx" class="form-control ">
                            <option value="">Pilih Salah Satu</option>
                            <?php if (is_array($dtpenerbit)) {
                                if (count($dtpenerbit) > 0) {
                                    foreach ($dtpenerbit as $k) {
                                        $id = $k['ID_Penerbit'];
                                        $nama = $k['Nama_Penerbit'];
                                        echo "<option value='$id'>$nama</option>";
                                    }
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="row form-group">
                        <div class="form-group col-md-6">
                            <label>Tahun Terbit</label>
                            <input type="text" name="txttahunx" class="form-control ftambah" maxlength="4" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Rak</label>
                            <input type="text" name="txtrakx" class="form-control ftambah" autocomplete="off">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Body -->
<div class="modal fade" id="ModalKelola" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-kelola">
                    <?= csrf_field() ?>
                    <div class="form-group col-md-12">
                        <label>Kode Buku</label>
                        <input type="text" name="txtkodexe" readonly id="txtkodexe" class="form-control fupdate" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Judul</label>
                        <input type="text" name="txtjudulxe" id="txtjudulxe" class="form-control fupdate" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>ISBN</label>
                        <input type="text" name="txtISBNxe" id="txtISBNxe" class="form-control fupdate" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Pengarang</label>
                        <select name="txtpengarangxe" id="txtpengarangxe" class="form-control ">
                            <option value="">Pilih Salah Satu</option>
                            <?php if (is_array($dtpengarang)) {
                                if (count($dtpengarang) > 0) {
                                    foreach ($dtpengarang as $k) {
                                        $id = $k['ID_Pengarang'];
                                        $nama = $k['Nama_Pengarang'];
                                        echo "<option value='$id'>$nama</option>";
                                    }
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Penerbit</label>
                        <select name="txtpenerbitxe" id="txtpenerbitxe" class="form-control ">
                            <option value="">Pilih Salah Satu</option>
                            <?php if (is_array($dtpenerbit)) {
                                if (count($dtpenerbit) > 0) {
                                    foreach ($dtpenerbit as $k) {
                                        $id = $k['ID_Penerbit'];
                                        $nama = $k['Nama_Penerbit'];
                                        echo "<option value='$id'>$nama</option>";
                                    }
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="row form-group">
                        <div class="form-group col-md-6">
                            <label>Tahun Terbit</label>
                            <input type="text" name="txttahunxe" id="txttahunxe" class="form-control fupdate" maxlength="4" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Rak</label>
                            <input type="text" name="txtrakxe" id="txtrakxe" class="form-control fupdate" autocomplete="off">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-warning" onclick="reset_form_update()">Reset Form</button>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" onclick="hapus(this)" id="btnhapus" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->

<script>
    $(document).ready(function() {
        $('input[name="txtISBN"]').keyup(function() {
            var text = $(this).val();
            var formattedText = formatText(text);
            $(this).val(formattedText);
        });

        function formatText(text) {
            // Menghapus semua karakter "-" yang ada sebelum memformat ulang
            text = text.replace(/-/g, '');

            // Menambahkan karakter "-" setiap 3 karakter menggunakan regex dan replace
            text = text.replace(/(\d{3})/g, '$1-');
            return text;
        }
    });

    $("#mndata").addClass("active");
    let table = $("#tblku").DataTable({
        ajax: {
            url: '<?= BASEURLKU ?>/getbuku',
        },
        columns: [{
                "data": "Kode_Buku"
            },
            {
                "data": "Judul"
            }, {
                "data": "Nama_Pengarang"
            }, {
                "data": "Nama_Penerbit"
            }, {
                "data": "Tahun_Terbit"
            }, {
                "data": "ISBN"
            }, {
                "render": function(id, type, data) {
                    btn = '';
                    btn += '<button class="btn btn-primary " data-id="' + data.Kode_Buku + '" onclick="kelola(this)"><i class="fa fa-edit"></i> Kelola</button>'
                    return btn
                }
            }
        ]
    });

    function kelola(el) {
        let id = $(el).data('id');
        $('#ModalKelola').modal('show');
        $('#btnhapus').attr('data-id', id)
        $.ajax({
            url: '<?= BASEURLKU ?>/getbuku/' + id,
            method: 'GET',
            success: function(res) {
                $('#txtkodexe').val(res.data.Kode_Buku);
                $('#txtjudulxe').val(res.data.Judul);
                $('#txtpengarangxe').val(res.data.ID_Pengarang).change();
                $('#txtpenerbitxe').val(res.data.ID_Penerbit).change();
                $('#txttahunxe').val(res.data.Tahun_Terbit);
                $('#txtrakxe').val(res.data.Rak);
                $('#txtISBNxe').val(res.data.ISBN);

            },
            error: function(err) {
                console.log(err);
            }
        })
    }

    $('.form-kelola').submit(function(e) {
        e.preventDefault();
        let dataForm = new FormData(this);
        $.ajax({
            url: '<?= BASEURLKU ?>/updateBuku',
            method: 'POST',
            data: dataForm,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.icon || res.title || res.text) {
                    swal({
                        icon: res.icon,
                        title: res.title,
                        text: res.text
                    });
                    table.ajax.reload()

                }
            },
            error: function(err) {
                console.log(err);
            }
        })

    })

    function reset_form_update() {
        $('.fupdate').val("")
        $('#txtpenerbitxe').val("").change()
        $('#txtpengarangxe').val("").change()
    }

    function hapus(params) {
        let id = $(params).data('id');
        $.ajax({
            url: '<?= BASEURLKU ?>/deleteBuku/' + id,
            method: 'DELETE',
            data: {
                csrf_test_name: '<?= csrf_field() ?>'
            },
            success: function(res) {
                if (res.icon || res.title || res.text) {
                    swal({
                        icon: res.icon,
                        title: res.title,
                        text: res.text
                    })
                    table.ajax.reload()
                    $('#ModalKelola').modal('hide');
                }
            },
            error: function(err) {
                console.log(err);
            }
        })
    }
</script>
<?php if (session()->getFlashdata('success')) : ?>
    <script>
        swal({
            title: 'Berhasil',
            text: 'Berhasil menambahkan data!',
            icon: 'success'
        })
    </script>
<?php endif; ?>