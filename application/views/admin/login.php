<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Lobster|PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] . "/e_commerce/" ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] . "/e_commerce/" ?>assets/icon/css/all.css">

    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] . "/e_commerce/" ?>assets/my.css">
</head>

<body class='bg-light'>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-5">
        <a class="navbar-brand" href="#">Admin Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link active" href="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/admin/login" ?>">Login <span class="sr-only">current</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= "http://".$_SERVER['HTTP_HOST']."/e_commerce/admin/register" ?>">Register</a>
                </li>                
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="w-50 m-auto">
                        <form action="" method="post" class="form" id="login">
                            <div class="form-group">
                                <label for="username" class="label-control">Username</label>
                                <input type="text" name="username" id="username" class='form-control' placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password" class="label-control">Password</label>
                                <input type="password" name="password" id="password" class='form-control' placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary"><span class="fa fa-sign-in-alt"></span> Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/plugins/grabScrolling.js"></script>    
    <script src="<?= base_url() ?>assets/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/page/login.js"></script>

</body>

</html>