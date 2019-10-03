<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flame Store | <?= $title ?></title>

    <link href="https://fonts.googleapis.com/css?family=Lobster|PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/icon/css/all.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/my.css">
</head>

<body class='bg-light'>

    <nav class="navbar navbar-light bg-white shadow-sm mb-3">

        <div class="container">
            <a href="" class="navbar-brand" style="font-family: 'Lobster'; letter-spacing:0.5px; font-size:23px">Flame Store</a>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link">categories</a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">  
                    <div class="card-header">

                    </div>                  
                    <div class="card-body" style="height:auto">

                    </div>
                </div>
            </div>
            <div class="col-sm-8 shadow-sm p-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
    </div>

    <script src="<?= base_url() ?>assets/plugins/grabScrolling.js"></script>
    <script src="<?= base_url() ?>assets/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>