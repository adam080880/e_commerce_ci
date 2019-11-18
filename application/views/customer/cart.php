
    <div class="container mt-4">
        <div class="row">
            <div class="col p-5">
                <div class="card m-auto p-3">
                    <a href="<?= base_url() ?>" class="mb-3"> < Belanja lagi</a>
                    <table class="table table-hover table-bordered">
                        <thead class='thead text-center'>
                            <tr>
                                <td>No.</td>
                                <td>Nama Barang</td>
                                <td>Jumlah</td>
                                <td>Harga Satuan</td>
                                <td>Harga</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody id="table-cart" class='text-center'>
                            
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col">
                            <p class="mt-3">Total Harga: <b id="total-harga"></b></p>
                        </div>                                                 
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" id="checkoutBtn">                                                        
                                <div class="form-group ">
                                    <label for="promoToken" class="label-control">Kode Promo</label>
                                    <input type="text" name="promoToken" id="promoToken" class='form-control' placeholder="Kode Promo">
                                </div>

                                <div class="form-group">
                                    <label for="alamat" class="label-control">Alamat</label>
                                    <select name="alamat" id="alamat" class="form-control">
                                        
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <button type="submit" class='btn btn-success ml-auto'>Checkout</button>
                                </div>                                                    
                            </form>

                            <b class='mt-4'>ATURAN MAIN</b>
                            <ul class='ul'>
                                <li>Ongkir = Rp. 10000,00</li>
                                <li>Pengantaran maksimal 7 hari</li>
                                <li>Jika tak memiliki kode promo, cukup kosongkan</li>
                                <li>Lebih baik tanyakan stok terlebih dahulu, untuk kepastian</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>