<div class="jumbotron mb-5">
    <h1 class='text-center' style="font-weight:100">Selamat Berbelanja</h1>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="card shadow-sm">
                    <div class="card-header bg-white" style="height:50px">
                        Item Top
                    </div>
                    <div class="card-body" style="height:250px">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" id="item_top">
                                <!-- <div class="carousel-item">

                                    </div> -->
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-2">
                <div id="carouselExampleIndicators" class="carousel shadow-sm slide" data-ride="carousel">
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

        <div class="row mt-3">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        Item Terbaru
                    </div>
                    <div class="card-body" style="min-height: 200px">
                        <div class="row" id="newest-item">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">

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