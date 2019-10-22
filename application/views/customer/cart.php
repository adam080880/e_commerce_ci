
    <div class="container mt-4">
        <div class="row">
            <div class="col p-5">
                <div class="card m-auto p-3">
                    <a href="<?= base_url() ?>" class="mb-3"> << Belanja lagi</a>
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

                    <p class="mt-3">Total Harga: <b id="total-harga"></b></p>
                </div>
            </div>
        </div>
    </div>