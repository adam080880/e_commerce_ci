<div class="card mt-1 shadow-sm" style="border-top:5px solid rgb(255, 112, 29)">
    <div class="card-body">

        <div class="row">
            <div class="col">
                <div class="text-left">
                    <h4><b class='sidebar-group-p'> Barang </b></h4>
                </div>
            </div>
            <div class="col">
                <div class="text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#KategoriModal"> <i class="fas fa-plus-square"></i> Kategori</button>
                </div>
            </div>
        </div>
        <hr>

        <div id="tampil" class="p-3">

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="BarangModal" tabindex="-1" role="dialog" aria-labelledby="BarangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="fBarangTambah" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <div class="form-group">
                        <input type="hidden" name="" id="id_b">
                        <label for="namaBarang" class="label-control">Nama: </label>
                        <input type="text" name="namaBarang" id="namaBarang" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="tipeBarang" class="label-control">Tipe: </label>
                        <input type="text" name="tipeBarang" id="tipeBarang" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sizeBarang" class="label-control">Size: </label>
                        <input type="text" name="sizeBarang" id="sizeBarang" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="hargaBarang" class="label-control">Harga: </label>
                        <input type="number" name="hargaBarang" id="hargaBarang" class="form-control" step="500" min=0 />
                    </div>

                    <div class="form-group">
                        <label for="stokBarang" class="label-control">Stok: </label>
                        <input type="number" name="stokBarang" id="stokBarang" class="form-control" min=0 step=10 />
                    </div>

                    <div class="form-group">
                        <input type="file" name="img_" id="img_" class='form-control'>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="KategoriModal" tabindex="-1" role="dialog" aria-labelledby="KategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="fKategoriTambah">
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="namaKategori" class="label-control">Nama: </label>
                        <input type="text" name="namaKategori" id="namaKategori" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EditKategoriModal" tabindex="-1" role="dialog" aria-labelledby="EditKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="fKategoriEdit">
                <div class="modal-body p-4">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id_e_kat">
                        <label for="namaKategori_e" class="label-control">Nama: </label>
                        <input type="text" name="namaKategori_e" id="namaKategori_e" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ShowBarangModal" tabindex="-1" role="dialog" aria-labelledby="ShowBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="fBarangEdit">
                <div class="modal-body p-4">
                    <div class="form-group">
                        <input type="hidden" name="" id="id_b_e">
                        <label for="namaBarang_e" class="label-control">Nama: </label>
                        <input type="text" name="namaBarang_e" id="namaBarang_e" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="tipeBarang_e" class="label-control">Tipe: </label>
                        <input type="text" name="tipeBarang_e" id="tipeBarang_e" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sizeBarang_e" class="label-control">Size: </label>
                        <input type="text" name="sizeBarang_e" id="sizeBarang_e" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="hargaBarang_e" class="label-control">Harga: </label>
                        <input type="number" name="hargaBarang_e" id="hargaBarang_e" class="form-control" step="500" min=0 />
                    </div>

                    <div class="form-group">
                        <label for="stokBarang_e" class="label-control">Stok: </label>
                        <input type="number" name="stokBarang_e" id="stokBarang_e" class="form-control" step="10" min=0 />
                    </div>

                    <div class="form-group">
                        <label for="kategoriBarang_e" class="label-control">Kategori: </label>
                        <select name="kategoriBarang_e" id="kategoriBarang_e" class="form-control">

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="img" class="label-control">Gambar: </label>
                        <input type="file" name="img" id="img" class='form-control'>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="buttonDeleteBarang" class="btn btn-danger"><i class="fa fa-trash"></i></button> <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>  
                </div>
            </form>
        </div>
    </div>
</div>