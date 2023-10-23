<?php
session_start();
include "config/baglanti.php";
include "config/fonksyon.php";
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   
    header("Location:../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="az">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"content="">
    <meta name="description"content="">
    <meta name="robots" content="noindex,nofollow">
    <title>Program</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.jpg">
    <link href="css/style.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Iki tari arasi hesaplama div css stil kodu -->
    <style>

.card-box {
    cursor: pointer;
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}
.bg-purpure {
    background-color: #ff0646 !important;
}
.bg-darkblue {
    background-color: #3d01ff !important;
}


    #gunFarkiMesaji {
        
        color: red; 
        font-weight: bold; 
        font-size: 16px; 
    }
    .vaxt{
        width:280px;
        height:316px;
        background-color:#f5f6f7;
        padding: 10px;
        
    }
    .gosterge{
        margin-top: 70px;
    }
    .filtr{
        color:white;
        font-size:14px;
        font-style:bold;
    }
    .tamamlandi{
        color:white;
        background-color:#05dc1e;
        border:none;
    }
    .bagla{
        color:white;
        background-color:#ff0303;
    }
    /* @font-face {
  font-family: 'Digital-7';
  src: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/184191/Digital-7.eot?#iefix') format('embedded-opentype'), 
   url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/184191/Digital-7.woff') format('woff'), 
   url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/184191/Digital-7.ttf')  format('truetype'), 
   url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/184191/Digital-7.svg#Digital-7') format('svg');font-weight: normal;font-style: normal;}
::selection{background:#333;}::-moz-selection{background:#111;} */
/* *,html{margin:0;}
body{background:#333} */
figure{width:210px;height:210px;position:absolute;top:55%;left:80%;margin-left:-105px;transform-style: preserve-3d;-webkit-transform-style: preserve-3d;-webkit-transform: rotateX(-35deg) rotateY(45deg);transform: rotateX(-35deg) rotateY(45deg);transition:2s;}
figure:hover{-webkit-transform:rotateX(-50deg) rotateY(45deg);transform:rotateX(-50deg) rotateY(45deg);}
.face{width:100%;height:100%;position:absolute;-webkit-transform-origin: center;transform-origin: center;background:#000;text-align:center;}
.clock{font-size:180px;font-family: 'Digital-7';margin-top:20px;color:#2982FF;text-shadow:0px 0px 5px #000;-webkit-animation:color 10s infinite;animation:color 10s infinite;line-height:180px;}
.front{-webkit-transform: translate3d(0, 0, 105px);transform: translate3d(0, 0, 105px);background:#111;}
.left{-webkit-transform: rotateY(-90deg) translate3d(0, 0, 105px);transform: rotateY(-90deg) translate3d(0, 0, 105px);background:#151515;}
.top{-webkit-transform: rotateX(90deg) translate3d(0, 0, 105px);transform: rotateX(90deg) translate3d(0, 0, 105px);background:#222;}

@keyframes color{
  0%{color:#2982ff;text-shadow:0px 0px 5px #000;}
  50%{color:#cc4343;text-shadow:0px 0px 5px #ff0000;}
}
@-webkit-keyframes color{
  0%{color:#2982ff;text-shadow:0px 0px 5px #000;}
  50%{color:#cc4343;text-shadow:0px 0px 5px #ff0000;}
}
</style>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand ms-4" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo.png" alt="homepage" class="dark-logo" />

                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto mt-md-0 ">
                    </ul>
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="assets/images/user.png" alt="user" class="profile-pic me-2">
                                <?php
                                      $username = $_SESSION['username'];
                                      $soyad = $_SESSION['surname'];
                                      echo $username . ' ' . $soyad;
                                
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>