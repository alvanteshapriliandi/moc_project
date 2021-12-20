<?php 
    require ('function/GudangFunction.php');
    require ('function/GlobalFunction.php');
    $gudang = new Gudang;
    $global = new GlobalFunction;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Gudang</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 0 7px rgb(0 0 0 / 10%) !important;
        }
        .text-right {
            text-align: right !important;
        }
        .bg-purple {
            background: #6f42c1;
        }
        /* .card-header h3 {
            color: #fff;
        } */
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-ligh bg-purple">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#"><strong>Selamat Datang Di Aplikasi Gudang</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="<?php echo $global->get_url(); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="<?php echo $global->get_url() . '?page=barang'; ?>">Barang</a>
                </li>
            </ul>
        </div>
    </nav>
