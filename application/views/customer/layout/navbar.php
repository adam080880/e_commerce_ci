<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uncomfortable | <?= $title ?></title>

    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/icon/css/all.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/my.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/initScrolling.css">
        
</head>

<body class='bg-light'>

    <nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm">

        <div class="container">
            <a href="<?= base_url() ?>" class="navbar-brand" style="font-family: 'Oswald'; letter-spacing:0px; font-size:23px; font-weight:600;">Uncomfortable.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarM" aria-controls="navbarM" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarM">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url() ?>categories">All Category</a>
                            <div class="dropdown-divider"></div>
                            <div id="resCate">
                                <?php foreach ($cate as $kategori) : ?>

                                    <a href="<?= base_url() ?>category/<?= $kategori->id ?>" class="dropdown-item"><?= $kategori->kategori ?></a>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item" id="btnLogin">
                        <a href="<?= base_url() ?>login" class="btn btn-outline-dark nav-link pl-4 pr-4 ml-2 wh-white">Login</a>
                    </li>
                    <li class="nav-item" id="btnLogined">
                        <div class="dropdown">
                            <button class="nav-link btn btn-outline-dark pl-4 pr-4 ml-2 wh-white dropdown-toggle username" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?= base_url() ?>profile">Profile</a>
                                <a href="<?= base_url() ?>cart" class="dropdown-item">Cart <span class="badge badge-dark" id="count-cart"></span></a>
                                <a class="dropdown-item" onclick="window.localStorage.removeItem('token'); window.localStorage.removeItem('role'); alert('Kamu logout'); document.location.href=''" href="javascript:;">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>