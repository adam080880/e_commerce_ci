
    <div class="container mt-4">
        <div class="row">
            <div class="col p-5">
                <div class="card m-auto p-3">                    
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 p-3">
                                <div class="pb-2">
                                    <h2 class='head-profile-customer'>DATA USER</h2>
                                    <div class="div" style="width: 10%; border-bottom:2px solid black"></div>
                                </div>                                    
                                <div class="p-2">
                                    <p>
                                        <div class="form-group">
                                            <label for="" class="label-control">Email:</label>
                                            <b id="email" class='form-control'>adam@gmail.com</b>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="label-control">Username:</label>
                                            <span id="username" class='form-control'>adamdaam</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="label-control">Role:</label>
                                            <span id="role" class='form-control'>Customer</span>
                                        </div>

                                    </p>
                                </div>
                            </div>        
                            <div class="col-6 p-3">
                                <div class="pb-2">
                                    <h2 class="head-profile-customer">RIWAYAT TRANSAKSI</h2>
                                    <div class="div" style="width: 10%; border-bottom:2px solid black"></div>
                                </div>

                                <table class="table table-bordered">
                                    <thead class="thead">
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Transaksi</th>                                            
                                            <th>Status</th>
                                        </tr>                                        
                                    </thead>
                                    <tbody class="tbody" id="riwayat-transaksi">

                                    </tbody>
                                </table>
                                <a href="<?= base_url() ?>transaksi">Lebih lengkap..</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="pb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <h2 class="head-profile-customer">ALAMAT PROFILE</h2>
                                            <div class="div" style="width: 10%; border-bottom:2px solid black"></div>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-success" onclick="$('#modalAlamat').modal('show')"><span class="fa fa-plus"></span> Alamat</button>
                                        </div>
                                    </div>
                                </div>                                                                                        
                                <table class="table table-bordered">
                                    <thead class="thead">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="alamat_f">

                                    </tbody>
                                </table>                                
                            </div>
                        </div>

                    </div>                
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAlamat">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Alamat</h5>
                </div>
                <div class="modal-body">
                    <form action="" id="form-profile">

                        <div class="form-group">
                            <label for="nama_alamat" class="label-control">Nama</label>
                            <input type="text" name="nama_alamat" id="nama" class='form-control'/>
                        </div>

                        <div class="form-group">
                            <label for="province" class="label-control">Propinsi</label>
                            <select name="province" id="province" class="form-control province">
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city" class="label-control">Kota / Kab</label>
                            <select name="city" id="city" class="form-control city" disabled="disabled">

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan" class="label-control">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" class='form-control'>
                        </div>

                        <div class="form-group">
                            <label for="kelurahan" class="label-control">Kelurahan</label>
                            <input type="text" name="kelurahan" id="kelurahan" class='form-control'>
                        </div>

                        <div class="form-group">
                            <label for="kode_pos" class="label-control">Kode Pos</label>
                            <input type="text" name="kode_pos" id="kode_pos" class='form-control'>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat_lengkap" class="label-control">Alamat</label>
                            <textarea name="alamat_lengkap" id="alamat" rows="5" class="form-control"></textarea>
                        </div>                        

                    </div>
                    <div class="modal-footer text-right">
                        <button class="btn btn-dark"><span class="fa fa-save"></span></button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAlamat_e">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Alamat</h5>
                </div>
                <div class="modal-body">
                    <form action="" id="form-profile-e">
                        <input type="hidden" name="id_a" id="id_a">
                        <div class="form-group">
                            <label for="nama_alamat" class="label-control">Nama</label>
                            <input type="text" name="nama_alamat" id="nama_e" class='form-control'/>
                        </div>

                        <div class="form-group">
                            <label for="province" class="label-control">Propinsi</label>
                            <select name="province" id="province_e" class="form-control province">
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city" class="label-control">Kota / Kab</label>
                            <select name="city" id="city_e" class="form-control city">

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan" class="label-control">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan_e" class='form-control'>
                        </div>

                        <div class="form-group">
                            <label for="kelurahan" class="label-control">Kelurahan</label>
                            <input type="text" name="kelurahan" id="kelurahan_e" class='form-control'>
                        </div>

                        <div class="form-group">
                            <label for="kode_pos" class="label-control">Kode Pos</label>
                            <input type="text" name="kode_pos" id="kode_pos_e" class='form-control'>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat_lengkap" class="label-control">Alamat</label>
                            <textarea name="alamat_lengkap" id="alamat_e" rows="5" class="form-control"></textarea>
                        </div>                        

                    </div>
                    <div class="modal-footer text-right">
                        <button class="btn btn-danger" id="rmAlamat"><span class="fa fa-trash"></span></button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>