
    <div class="container mt-4">
        <div class="row">
            <div class="col p-5">
                <div class="card m-auto p-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <h2 class="head-profile-customer">DETAIL TRANSAKSI</h2>
                                <div class="div" style="width: 10%; border-bottom:2px solid black"></div>                                

                            </div>
                            <div class="form-group">
                                <label for="" class="label-control">ID Transaksi</label>
                                <p class="form-control" id="transaksi_id"><?= $item['id'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-control">No Resi</label>
                                <p class="form-control"><?= $item['no_resi'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-control">Kirim</label>
                                <p class="form-control"><?= $item['kirim'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-control">Terima</label>
                                <p class="form-control"><?= $item['terima'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-control">Biaya Kirim</label>
                                <p class="form-control"><?= $item['biaya'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-control">Nama Alamat</label>
                                <p class="form-control"><?= $item['nama'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-control">Total Harga (+kirim)</label>
                                <p class="form-control"><?= $item['total'] + $item['biaya'] ?></p>
                            </div>
                        </div>
                    </div>
                                        
                    <table class="table table-hover table-bordered">
                        <thead class='thead text-center'>
                            <tr>
                                <td>No.</td>
                                <td>Nama Barang</td>
                                <td>Jumlah</td>
                                <td>Harga Satuan</td>
                                <td>Harga</td>
                            </tr>
                        </thead>

                        <tbody id="table-cart" class='text-center'>
                            <?php $no = 0; ?>
                            <?php foreach($barang as $res): ?>
                                <tr>
                                    <td><?= ++$no ?></td>
                                    <td><?= $res->nama ?></td>
                                    <td><?= $res->amount ?></td>
                                    <td><?= $res->harga_satuan ?></td>
                                    <td><?= $res->harga ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>            
                    
                    <?php if($item['status'] == 'unverified') { ?>
                        <div class='alert alert-danger'>Barang belum terkirim</div>
                    <?php } else if($item['status'] == 'verified') { ?>
                        <div class='alert alert-success'>Barang sudah terkirim <button class=' ml-3 btn btn-sm'>Sudah sampai? <b> Click Me </b></button></div>
                    <?php } else { ?>
                        <div class="alert alert-success">Barang sudah sampai di tempat anda, terima kasih telah berbelanja di sini :)</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>