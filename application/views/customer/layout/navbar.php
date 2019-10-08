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
</head>

<body class='bg-light'>

    <nav class="navbar navbar-light bg-white shadow-sm">

        <div class="container">
            <a href="" class="navbar-brand" style="font-family: 'Oswald'; letter-spacing:0px; font-size:23px; font-weight:600;">Uncomfortable.</a>

            <div class="navbar-expand-lg">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">All Category</a>
                            <div class="dropdown-divider"></div>
                            <div id="resCate">
                                
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="./login" class="btn btn-outline-dark nav-link pl-4 pr-4 ml-2 wh-white">Login</a>
                    </li>
                    <!-- <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link btn btn-outline-dark pl-4 pr-4 ml-2 wh-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Client
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="./profile">Profile</a>                                
                                <a class="dropdown-item" href="./logout">Logout</a>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>

    </nav>