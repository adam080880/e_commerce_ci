<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - <?= $title ?></title>

    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/icon/css/all.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/my.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div style="width:13%;" class='shadow-sm'>
                <!-- As a link -->
                <nav class="navbar navbar-dark bg-danger-sidebar shadow-sm" style="min-height:70px">
                    <a class="navbar-brand" href="#"><span style="font-family: 'Oswald'; letter-spacing:0px; font-weight:600; font-size:23px"> Uncomfortable.</span></a>
                </nav>

                <!-- Sidebar component -->
                <nav class="nav flex-column mt-3 pl-1">
                    <div class="group-sidebar mb-3">
                        <p class='nav-link mb-0 sidebar-group-p'><b> Dashboard</b></p>
                        <div class="ml-2">
                            <a class="nav-link text-secondary-sidebar" href="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>admin/barang"><img src="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>assets/img/sidebar/barang.svg" alt="" width=25 height=25 class="d-inline-block align-top mr-2"> Barang</a>
                            <a class="nav-link text-secondary-sidebar" href="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>admin/promo"><img src="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>assets/img/sidebar/discount.svg" alt="" width=25 height=25 class="d-inline-block align-top mr-2"> Promo</a>
                            <a class="nav-link text-secondary-sidebar" href="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>admin/users"><img src="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>assets/img/sidebar/users.svg" alt="" width=25 height=25 class="d-inline-block align-top mr-2"> Users</a>
                            <div style="display:none">Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/"             title="Flaticon">www.flaticon.com</a></div>
                        </div>
                    </div>
                    <div class="group-sidebar mb-3">
                        <p class='nav-link mb-0 sidebar-group-p'><b> Transaksi</b></p>
                        <div class="ml-2">
                            <a class="nav-link active text-secondary-sidebar" href="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>admin/riwayat"><img src="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>assets/img/sidebar/penjualan.svg" alt="" width=25 height=25 class="d-inline-block align-top mr-2"> Riwayat</a>                        
                        </div>
                    </div>
                    <div class="group-sidebar">
                        <p class='nav-link mb-0 sidebar-group-p'><b> Settings</b></p>
                        <div class="ml-2">
                            <a class="nav-link active text-secondary-sidebar" href="#"><img src="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/" ?>assets/img/sidebar/config.svg" alt="" width=25 height=25 class="d-inline-block align-top mr-2"> Pengaturan</a>                        
                        </div>                        
                    </div>
                </nav>
            </div>

            <!-- Home Page -->
            <div class="col pl-0 pr-0">
                <!-- As a link -->
                <nav class="navbar navbar-light bg-white shadow-sm mr-0" style="min-height:70px">
                    <a class="navbar-brand" href="javascript:;"><i class="fa fa-bars" style='color:rgb(248, 91, 0)'></i></a>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="javascript: ;" onclick="window.localStorage.removeItem('token');window.localStorage.removeItem('role'); alert('Kamu logout'); document.location.href=''" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </nav>

                <div class="body p-4" style="background-color:#f4f0f0;min-height:93vh">