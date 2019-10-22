<?php
    $badge = explode(',', $item->tipe);    
?>

<div class="container mt-4">
    <div class="row">
        <div class="col p-5">

        </div>
        <div class="col p-5">
            <div class="card">
                <div class="card-header bg-white">
                    <a href="<?= base_url() ?>category/<?= $item->kategori_id ?>"><< Lihat kategori ini..</a>
                </div>
                <div class="card-body p-5">
                    <h2><b><?= $item->nama ?></b></h2>
                    <h4 class="text-dark">Rp. <?= $item->harga ?>, 00</h4>                
                    <?php foreach($badge as $roti): ?>

                        <span class="badge badge-pill badge-dark"><?= $roti ?></span>

                    <?php endforeach; ?>
                </div>   
                <form action="" method="post" id="cart-form">
                    <div class="card-footer bg-white">                    
                        <div class="row">    
                            <div class="col-4">
                                <p class='nav-link mb-0'>Stok: <?= $item->stok ?></p>
                            </div>                
                            <div class="col-6 pr-0">
                                <div class="input-group w-50 ml-auto">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>+</b></div>
                                    </div>
                                    <input min=0 max=<?= $item->stok ?> type="number" class="form-control" id="total" name="total">
                                </div>
                            </div>                    
                            <div class="col-2">
                                <input type="hidden" name="barang_id" value="<?= $item->id ?>" id="barang_id">
                                <button class="btn btn-dark" id="add-to-cart-btn" type="submit"><i class="fa fa-cart-plus"></i></button>
                            </div>                        
                        </div>
                    </div>            
                </form> 
            </div>
        </div>
    </div>
</div>