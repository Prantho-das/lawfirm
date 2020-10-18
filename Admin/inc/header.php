<?php
ob_start();
include('../class/class.php');
include('../class/help.php');
session_start();
$db = new database;
if (!isset($_SESSION['aid'])) {
    echo "<script>window.location.href='login'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Easy Justise</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <script src="plugins/jquery/jquery.min.js"></script>
    <style>
    ::-webkit-scrollbar{
  display:none;
}
        @media only screen and (max-width:400px) {

            .table td,
            .table th {
                padding: .15rem !important;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }
        }

        @media only screen and (max-width:650px) {
            .appoint table {
                font-size: 0.6rem;
            }

            .appoint .btn {
                font-size: 0.6rem;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index" class="brand-link">
                <img src="../img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Easy Justice</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/Supreme-Court.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="index" class="d-block">
                            <?php
                            echo $_SESSION['adminname'];
                            ?>
                        </a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="service" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Service
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lawyer" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Lawyer
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="user" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a href="order" class="nav-link">
                                <i class="nav-icon far fa-money-bill-alt"></i>
                                <p>
                                    Payment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="appointment" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Appointment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item px-3">
                                <?php
                                if (isset($_REQUEST['logout'])) {
                                    if (isset($_POST["logout"]) == "logoutadmin") {
                                        if (isset($_SESSION['aid'])) {
                                            session_reset();
                                            session_destroy();
                                            echo "<script>window.location.href='login'</script>";
                                        }
                                    }
                                }
                                ?>
                                <form action="" method="POST">
                                    <input type="hidden" value="logoutadmin" name="logout">
                                    <button name="logout" style="margin: 2rem 0rem;" class="btn btn-sm btn-danger">
                                        <i class="fas fa-lock mr-3"></i>
                                        Log Out</button>
                                </form>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="message" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                </p>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>