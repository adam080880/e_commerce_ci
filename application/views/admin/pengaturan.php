<div class="card mt-1 shadow-sm" style="border-top:5px solid rgb(255, 112, 29)">
    <div class="card-body">

        <div class="row">
            <div class="col">
                <div class="text-left">
                    <h4><b class='sidebar-group-p'> Pengaturan </b></h4>
                </div>
            </div>           
        </div>
        <hr>

        <div class="row p-3">
            <div class="card col mr-2">
                <div class="card-body"></div>
            </div>
            <div class="card col ml-2">
                <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="PromoModal" tabindex="-1" role="dialog" aria-labelledby="PromoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengaturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="fPromoTambah">
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label for="kodePromo" class="label-control">Kode Promo: </label>
                        <input type="text" name="kodePromo" id="kodePromo" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="expiredDate" class="label-control">Expired Date: </label>
                        <input type="date" name="expiredDate" id="expiredDate" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="diskon" class="label-control">Potongan Harga: </label>
                        <input type="number" name="diskon" id="diskon" class="form-control" step="0.05" max=1 min=0/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>