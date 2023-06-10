<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Data Barang FIREBASE</h2>
                <h5 class="text-white op-7 mb-2">Halaman Pengelolaan Barang</h5>
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
                    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Data Barang</button>
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover" id="tblku">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">ID Barang</th>
                                    <th style="width: 10%;">Brand</th>
                                    <th style="width: 20%;">Nama Barang</th>
                                    <th style="width: 10%;">Harga Barang</th>
                                    <th style="width: 10%;">Kategori</th>
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

<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="my-modal-title">Tambah Barang</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="needs-validation form-add" novalidate>
                    <div class="form-group">
                        <label for="idbarang">ID Barang</label>
                        <input type="text" name="" id="idbarang" maxlength="5" class="form-control" required>
                        <div class="invalid-feedback">
                            ID Barang Harus Di Isi!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" name="" id="brand" class="form-control" required>
                        <div class="invalid-feedback">
                            Brand Harus Di Isi!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="namabarang">Nama Barang</label>
                        <input type="text" name="" id="namabarang" class="form-control" required>
                        <div class="invalid-feedback">
                            Nama Barang Harus Di Isi!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hargabarang">Harga Barang</label>
                        <input type="number" name="" id="hargabarang" class="form-control" required>
                        <div class="invalid-feedback">
                            Harga Barang Harus Di Isi!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Barang</label>
                        <input type="text" name="" id="kategoribarang" class="form-control" required>
                        <div class="invalid-feedback">
                            Kategori Barang Harus Di Isi!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Stok Barang</label>
                        <input type="number" name="" id="stokbarang" class="form-control" required>
                        <div class="invalid-feedback">
                            Stok Barang Harus Di Isi!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="carigambar">Cari Gambar Random</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="query" autofocus placeholder="Silahkan ketikan keyword....">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="buttonsearch"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="renderResult">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto Barang</label>
                        <input type="text" name="" id="gambar" class="form-control" required>
                        <div class="invalid-feedback">
                            Gambar Harus Di Isi!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Barang</label>
                        <textarea name="" id="deskripsi" class="form-control">Default Kosong</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="submitForm">Tambah Data Barang</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Update Data Barang</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form-update" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="imge" class="text-center"></div>
                            <div class="mt-4">
                                <div class="form-group row">
                                    <label for="changeimge" class="col-sm-5 col-form-label">Ganti Foto </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="changeimge">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" id="btnchangeimge">Ganti Foto</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <label for="idbarange" class="col-sm-2 col-form-label">ID Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control" id="idbarange">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="brande" class="col-sm-2 col-form-label">Brand</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="brande">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namabarange" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namabarange">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hargabarange" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hargabarange">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategoribarange" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kategoribarange">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stokbarange" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="stokbarange">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambarbarange" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="gambarbarange">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsibarange" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="deskripsibarange"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>



<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-database.js"></script>


<!-- Function Seacrh Image -->
<script>
    $('#buttonsearch').click(function() {
        let query = $('#query').val();
        $.ajax({
            url: `https://api.unsplash.com/photos/random/?client_id=k38NwOM7M2LoZ_PiCdUceQV20RFGsaz0eTa5di0pCS8&query=${query}`,
            method: 'GET',
            success: function(res) {
                let data = res.urls
                let r = "";
                r +=
                    $('#renderResult').append(
                        $(`<div class="card" style="width: 14rem; cursor: pointer;" onclick="addtopath(this)" data-image="${data.small}">
                            <div class="card-header text-center mt-2">
                                <h5>Klik Gambar Untuk Memilih </h5>
                            </div>
                            <div class="card-body text-center" data-image="${data.small}" >
                                <img class="rounded" width="50%" src="${data.small}" alt="">
                            </div>
                        </div>`)
                    )
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

    $('#btnchangeimge').click(function() {
        let query = $('#changeimge').val();
        $.ajax({
            url: `https://api.unsplash.com/photos/random/?client_id=k38NwOM7M2LoZ_PiCdUceQV20RFGsaz0eTa5di0pCS8&query=${query}`,
            method: 'GET',
            success: function(res) {
                let data = res.urls
                $('#imge').empty();
                $('#imge').append(
                    $('<img class="rounded" width="70%">').attr('src', data.small)
                )
                addtopathe(data.small)
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

    function addtopath(params) {
        let data = $(params).data('image');
        $('#gambar').val(data)
    }

    function addtopathe(data) {
        $('#gambarbarange').val(data)
    }
</script>

<!-- Function Create, Read, Update, Delete -->
<script>
    $('#mnproduct').addClass('active');
    let table = $('#tblku').DataTable();

    const firebaseConfig = {
        apiKey: "AIzaSyDnNVePneOZ74x8vfdb-Uzd3FE5czWCppI",
        authDomain: "crud-603c6.firebaseapp.com",
        databaseURL: "https://crud-603c6-default-rtdb.firebaseio.com",
        projectId: "crud-603c6",
        storageBucket: "crud-603c6.appspot.com",
        messagingSenderId: "30829452231",
        appId: "1:30829452231:web:8c8ad9ae742f99ab6517e2",
        measurementId: "G-HMCKT5NYD2"
    };

    firebase.initializeApp(firebaseConfig);
    let db = firebase.database();
    let dtbarang = db.ref('product');
    dtbarang.on('value', sukses, gagal);

    function sukses(datas) {
        let dt = "";
        table.clear();
        $.each(datas.val(), function(i, obj) {
            let brand = obj.brand;
            let nama = obj.title;
            let harga = Rupiah(obj.price);
            let kategori = obj.category;
            let btn = `<button class="btn btn-warning text-white btn-sm" onclick="edit(this)" data-id="${i}"><i class="fa fa-edit"></i></button>
           <button class="btn btn-danger btn-sm" onclick="hapus(this)" data-id="${i}"><i class="fa fa-trash"></i></button>`;
            dt = [i, brand, nama, harga, kategori, btn];
            table.rows.add([dt]).draw()
        })
    }

    function gagal(error) {
        console.log(error);
    }

    function edit(params) {
        let id = $(params).data('id');
        dtbarang.child(id).get().then(function(obj) {
            $('#modalEdit').modal('show');
            $('#idbarange').val(id);
            $('#brande').val(obj.val().brand);
            $('#namabarange').val(obj.val().title);
            $('#hargabarange').val(Rupiah(obj.val().price));
            $('#kategoribarange').val(obj.val().category);
            $('#gambarbarange').val(obj.val().thumbnail);
            $('#deskripsibarange').val(obj.val().description);
            $('#stokbarange').val(obj.val().stock);
            let = $('#imge').append(
                $('<img class="rounded" width="70%">').attr('src', obj.val().thumbnail)
            );
            $('#modalEdit').on('hidden.bs.modal', function(e) {
                $('#imge').empty()
                $('#changeimge').val("")
            })

        })
    }

    $('.form-update').submit(function(e) {
        e.preventDefault();
        let id = $('#idbarange').val();
        let brand = $('#brande').val();
        let nama = $('#namabarange').val();
        let harga = $('#hargabarange').val();
        let kategori = $('#kategoribarange').val();
        let foto = $('#gambarbarange').val();
        let deskripsi = $('#deskripsibarange').val();
        let stok = $('#stokbarange').val();

        db.ref("product/" + id).set({
            brand: brand,
            title: nama,
            category: kategori,
            description: deskripsi,
            price: formatclean(harga),
            thumbnail: foto,
            stock: stok
        }, (err) => {
            if (err) {
                swal({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal update data barang!'
                })
            } else {
                swal({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Berhasil update data barang!'
                })
                location.reload();
            }
        })
    })

    $('.form-add').submit(function(e) {
        e.preventDefault();
        let id = $('#idbarang').val();
        let brand = $('#brand').val();
        let nama = $('#namabarang').val();
        let harga = $('#hargabarang').val();
        let kategori = $('#kategoribarang').val();
        let foto = $('#gambar').val();
        let deskripsi = $('#deskripsi').val();
        let stok = $('#stokbarang').val();
        if (id == "" || brand == '' || nama == "" || harga == "" || kategori == "" || foto == "" || deskripsi == "" || stok == "") {
            swal({
                icon: 'error',
                title: 'Maaf',
                text: 'Masih ada isian yang kosong!'
            })
            return
        } else {
            db.ref("product/" + id).set({
                brand: brand,
                title: nama,
                category: kategori,
                description: deskripsi,
                price: harga,
                thumbnail: foto,
                stock: stok
            }, (err) => {
                if (err) {
                    swal({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal menambahkan data barang!'
                    })
                } else {
                    swal({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Berhasil menambahkan data barang!'
                    })
                    reset_form_tambah();
                }
            })
        }



    })

    function reset_form_tambah() {
        $('#idbarang').val("");
        $('#brand').val("");
        $('#namabarang').val("");
        $('#hargabarang').val("");
        $('#kategoribarang').val("");
        $('#gambar').val("");
        $('#deskripsi').val("Default Kosong");
        $('#stokbarang').val("");
        $('#renderResult').empty()
    }

    function Rupiah(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(number);
    }

    function formatclean(params) {
        let numbersOnly = params.replace(/\D/g, '');
        return numbersOnly;
    }

    function hapus(params) {
        let id = $(params).data('id')
        swal({
                title: "Apakah anda yakin?",
                text: "Ingin menghapus data barang ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    db.ref('product/' + id).set({},
                        (error) => {
                            if (error) {
                                swal({
                                    icon: "error",
                                    title: 'Gagal',
                                    text: 'Gagal menghapus data barang!'
                                });

                            } else {
                                swal({
                                    icon: "success",
                                    title: 'Berhasil',
                                    text: 'Berhasil menghapus data barang!'
                                });
                            }
                        }
                    )
                } else {
                    swal({
                        icon: "info",
                        title: 'Yeay',
                        text: 'Anda tidak jadi menghapus data barang ini!'
                    });
                }
            });

    }
</script>


<!-- Optional: Place to the bottom of scripts -->