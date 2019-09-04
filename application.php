<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pengarsipan PT. Papandayan Cocoa Industries</title>
    <?php
      // cek Halaman yang di tuju
      array_key_exists('page', $_GET) ? $page = $_GET['page'] : $page = '';
    ?>

    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="asset/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/font-awesome/css/all.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

  </head>

  <body style="font-family: Comic Sans MS, Comic Sans, cursive;">

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="application.php?page=halamanutama">Sistem Pengarsipan</a>
          <img class="img-tengah" src="img/pict1.png" height="40" width="250">
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class=""><a href="application.php?page=halamanutama"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> Input Arsip <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="application.php?page=form-sp"><i class="fas fa-envelope"></i> &nbsp Surat Perizinan</a></li>
                <li><a href="application.php?page=form-bm"><i class="fa fa-forward"></i> &nbsp Surat Masuk</a></li>
                <li><a href="application.php?page=bake"><i class="fa fa-backward"></i> &nbsp Surat Keluar</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book"></i> Menampilkan Data <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="application.php?page=datasp"><i class="fa fa-envelope"></i> &nbsp Surat Perizinan</a></li>
                <li><a href="application.php?page=databm"><i class="fa fa-forward"></i> &nbsp Surat Masuk</a></li>
                <li><a href="application.php?page=databk"><i class="fa fa-backward"></i> &nbsp Surat Keluar</a></li>
              </ul>
            </li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-clipboard-list"></i> Reminder <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="application.php?page=dare1"><i class="fa fa-bell"></i> &nbsp Cek Surat Reminder 1</a></li>
                <li><a href="application.php?page=databm"><i class="fa fa-exclamation-triangle"></i> &nbsp Cek Surat Reminder 2</a></li>
              </ul>
            </li> -->
            <?php if ($_SESSION['hak'] == 'admin') { ?>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Manajemen Users <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="application.php?page=addusers"><i class="fa fa-edit"></i> &nbsp Add User</a></li>
                <li><a href="application.php?page=datausers"><i class="fa fa-address-card"></i> &nbsp Daftar User</a></li>
              </ul>
            </li>
            <?php } ?> 
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['nama']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="application.php?page=profileusers&username=<?php echo $data['username'];?>"><i class="fa fa-user"></i> &nbsp Profile</a></li>
                <li><a href=""><i class="fa fa-cogs"></i>&nbsp Setting</a></li>
                <li class="divider"></li>
                <li><a href="index.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

          <?php 
        //redirect ke halaman data mahasiswa
        if($page=="form-sp") {
          include "pages/form/form-sp.php";
        }
        if($page=="halamanutama") {
          include "pages/halamanutama.php";
        }
          if($page=="") {
          include "pages/halamanutama.php";
        }
          if($page=="bake") {
          include "pages/form/form-bk.php";
        }
        if($page=="form-bm") {
          include "pages/form/form-bm.php";
        }
          if($page=="databm") {
          include "pages/data/Viewbm.php";
        }
        if($page=="databk") {
          include "pages/data/Viewbk.php";
        }
        if($page=="datasp") {
          include "pages/data/Viewsp.php";
        }
        if($page=="detailsp") {
          include "pages/data/Detailsp.php";
        }
        if($page=="detailbm") {
          include "pages/data/Detailbm.php";
        }
        if($page=="detailbk") {
          include "pages/data/Detailbk.php";
        }
        if($page=="addusers") {
          include "pages/form/form-adduser.php";
        }
        if($page=="profileusers") {
          include "pages/data/ProfileUsers.php";
        }
        if($page=="datausers") {
          include "pages/data/ViewUsers.php";
        }
        if($page=="updateusers") {
          include "pages/form/form-updateusers.php";
        }
        if($page=="deleteusers") {
          include "controllers/users/delete.php";
        }
        if($page=="datausers&id_login=") {
          include "pages/data/ViewUsers.php";
        }
      ?>
          
        </div><!-- /.row -->
        
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="asset/js/jquery-1.10.2.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="asset/js/morris/chart-data-morris.js"></script>
    <script src="asset/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="asset/js/tablesorter/tables.js"></script>
    <!-- Sweet Alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </body>
</html>
