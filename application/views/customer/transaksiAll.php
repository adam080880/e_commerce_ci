
    <div class="container mt-4">
        <div class="row">
            <div class="col p-5">
                <div class="card m-auto p-3">
                    <a href="<?= base_url() ?>" class="mb-3"> < Belanja lagi</a>
                    <table class="table table-hover table-bordered">
                        <thead class='thead text-center'>
                            <tr>
                                <td>No.</td>
                                <td>Nomor Resi</td>
                                <td>Kirim</td>
                                <td>Terima</td>
                                <td>Total Harga (+kirim)</td>
                                <td>Action</td>                                
                            </tr>
                        </thead>

                        <tbody id="table-transaksi" class='text-center'>
                            
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col">
                            <p class="mt-3">Total transaksi: <b id="total-transaksi"></b></p>
                        </div>                                                 
                    </div>                    
                </div>
            </div>
        </div>
    </div>