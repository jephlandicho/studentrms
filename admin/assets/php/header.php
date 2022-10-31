<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header('location:index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link class="img-rounded" rel="icon" type="image/png" href="assets/img/LI_LOGO.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <?php
    $title = basename($_SERVER['PHP_SELF'],'.php');
    $title = explode('-',$title);
    $title = ucfirst($title[1]);
    ?>
    <title><?=$title ?> | Admin Panel</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="assets/css/now-ui-dashboard.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
        #name{
          line-height: 2;
            font-size: 17px;
            color: white;
        }
          .nav{
            padding: 0;
            list-style-type:none;
            text-decoration: none;
          }
        #icons{
            font-size: 25px;
            color: yellow;
            background-color: transparent;
        }
        .nav-active{
            color: black;
            border-radius: 18px;
            background-color: lightgreen;
            text-decoration: none;
        }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="green">
      <div class="logo">
        <a href="assets/img/LI_LOGO.jpg" class="simple-text logo-mini">
          LI
        </a>
        <a href="#" class="simple-text logo-normal">
        <?= $title; ?>
        </a>
      </div>
      <div class="sidebar-wrapper ps" id="sidebar-wrapper">
        <ul class="nav">
          <li> 
          <a id="name" href="admin-dashboard.php" class="list-group-item admin-link <?= (basename($_SERVER['PHP_SELF'])=='admin-dashboard.php')?"nav-active":""; ?>">
          <i class="now-ui-icons design_app" id="icons"> </i><p> DASHBOARD </p></a> 
          </li>
          <li> 
          <a id="name" href="admin-management.php" class="list-group-item admin-link <?= (basename($_SERVER['PHP_SELF'])=='admin-management.php')?"nav-active":""; ?>">
          <i class="now-ui-icons design_vector" id="icons"></i><p> MANAGEMENT </p></a>
          </li> 
          <li> 
          <a id="name" href="admin-students.php" class="list-group-item admin-link <?= (basename($_SERVER['PHP_SELF'])=='admin-students.php')?"nav-active":""; ?>">
          <i class="now-ui-icons business_badge" id="icons"></i><p> STUDENTS </p></a>
          </li> 
          <li> 
          <a id="name" href="admin-faculty.php" class="list-group-item admin-link <?= (basename($_SERVER['PHP_SELF'])=='admin-faculty.php')?"nav-active":""; ?>">
          <i class="now-ui-icons education_glasses" id="icons"></i><p> FACULTY </p></a>
          </li>
          <li> 
          <a id="name" href="admin-account.php" class="list-group-item admin-link <?= (basename($_SERVER['PHP_SELF'])=='admin-account.php')?"nav-active":""; ?>">
          <i class="now-ui-icons users_single-02" id="icons"></i><p> ADMIN ACCOUNT </p></a>
          </li>
          <li>
          <a id="name" href="admin-website.php" class="list-group-item  admin-link <?= (basename($_SERVER['PHP_SELF'])=='admin-website.php')?"nav-active":""; ?>">
          <i class="now-ui-icons design-2_html5" id="icons"></i><p> WEBSITE </p></a>
          </li>
          <li>
          <a id="name" href="assets/php/logout.php" class="list-group-item">
          <i class="fa fa-sign-out-alt" id="icons"></i><p> LOGOUT </p></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="assets/php/logout.php">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Admin</span>
                  </p>
                </a>
              </li>
            </ul>
        </div>
      </nav>
      <div class="panel-header panel-header-sm">
      <marquee behavior="alternate" direction="right" scrollamount="5" style = "color:white; font-size:20px;">Welcome to Lian Institute Admin Panel</marquee>
      </div>

      <!-- End Navbar -->

