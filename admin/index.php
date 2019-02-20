<?php
require_once '../config.php';

if (!isset($_SESSION['user']) && $_SESSION['user']['email'] == "") {
    header("Location: login.php");
}

$page = isset($_GET['page']) ? $_GET['page'] : NULL;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>assets/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>assets/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="<?= __BASEURL__; ?>assets/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= __BASEURL__; ?>assets/css/AdminLTE.min.css">
    
<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= __BASEURL__; ?>assets/css/skins/_all-skins.min.css">
<!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
            require_once 'header.php';
            require_once 'sidebar.php';
        ?>

        <?php
            if (isset($_GET['page']) && $_GET['page'] != "") {
                
                if ($page == "user") {
                    include_once 'pages/management-user.php';
                } elseif ($page == "blog-posts") {
                    include_once 'pages/blog-posts.php';
                } elseif ($page == "categories") {
                    include_once 'pages/categories.php';
                } elseif ($page == "author") {
                    include_once 'pages/author.php';
                } elseif ($page == "roles" || $page == "role") {
                    include_once 'pages/roles.php';
                } elseif ($page == "comments" || $page == "comment") {
                    include_once 'pages/comments.php';
                }
            } else {
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Title</h3>
                            </div>
                            <div class="box-body">
                                Start creating your amazing application!
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                Footer
                            </div>
                            <!-- /.box-footer-->
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        
        <?php
            }
        ?>

        <?php require_once 'footer.php'; ?>

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="<?= __BASEURL__; ?>assets/jquery/dist/jquery.min.js"></script>
    <script src="<?= __BASEURL__; ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= __BASEURL__; ?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= __BASEURL__; ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?= __BASEURL__; ?>assets/select2/dist/js/select2.min.js"></script>
    <script src="<?= __BASEURL__; ?>assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= __BASEURL__; ?>assets/js/demo.js"></script>
    <script>
        function tanya() {
            let conf = confirm("Apakah Anda yakin akan menghapus data ini ?");
            if(conf == true) {
                return true;
            } else {
                return false;
            }
        }
        $(function() {
            CKEDITOR.replace("isi");
            $("#kategori").select2();
            $("#tanggal").datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
</body>
</html>
