<div class="jumbotron">
    <h1 class='text-center' style="font-weight:100">Selamat Berbelanja</h1>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5">
                <div class="card shadow-sm" style="border-radius:0; border:none">
                    <div class="card-header bg-white" style="height:50px; border:none">
                        <b>Item Top</b> 
                        <hr>
                    </div>
                    <div class="card-body" style="height:250px">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="item_top">
                                <?php $counter__ = 0; foreach($top_list as $top): ?>                                    
                                    <div class="carousel-item <?= $counter__ == 0 ? "active" : "" ?>">
                                        <div class="container">
                                            <b class="d-block"><?= $top->nama ?></b>
                                            <small class="d-block">Rp. <?= $top->harga ?>, 00</small>
                                        </div>
                                    </div>
                                <?php $counter__++; endforeach; ?>
                            </div>
                            <a class="carousel-control-prev bg-dark" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg-dark" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div id="carouselExampleIndicators" class="carousel shadow-sm slide shadow-sm" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= "http://" . $_SERVER['HTTP_HOST'] . "/e_commerce/" ?>assets/img/test.jpg" class="d-block w-100" height=300 alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= "http://" . $_SERVER['HTTP_HOST'] . "/e_commerce/" ?>assets/img/test.jpg" class="d-block w-100" height=300 alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= "http://" . $_SERVER['HTTP_HOST'] . "/e_commerce/" ?>assets/img/test.jpg" class="d-block w-100" height=300 alt="">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="card shadow-sm" style="border-radius:0; border:none">
                    <div class="card-header bg-white" style="border:none">
                        <b>Item Terbaru</b> 
                        <hr class='mb-0'>
                    </div>
                    <div class="card-body" style="border-radius:0">
                        <div class="active-items-gs p-2 swh-1" style="white-space:nowrap;" id="newest-item">
                            <?php foreach($newest_list as $newest): ?>
                                <div class="card col-sm-6 shadow-sm ml-1 mr-1" style="display:inline-block; white-space: nowrap">
                                    <div class="card-body">
                                        <b class="d-block"><a href="<?= base_url() ?>item/<?= $newest->id ?>" class="text-dark opwh-1"><?= $newest->nama ?></a></b>
                                        <small class="d-block">Rp. <?= $newest->harga ?>, 00</small>                                        
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>

        </div>
    </div>    