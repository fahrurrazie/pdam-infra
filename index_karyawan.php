<?php 
include 'koneksi.php';
error_reporting(0);
session_start();

// cek session jika tidak ada session diarahkan ke login.php
if (!$_SESSION['username']){
header("location:index.php");
}
 $nama=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PDAM BANDARMASIH</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="style/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="style/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="style/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="style/plugins/select2-3.5.4/select2.css">  
  <link rel="stylesheet" href="style/plugins/select2-3.5.4/select2-bootstrap.css">
  <link href="style/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <link href="style/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <style>

</style> 
</head>
  <body class="skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">   
      <header class="main-header">
        <a href="" class="logo">
          <span class="logo-lg"><b>PDAM BANDARMASIH</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
        </nav>
      </header>

      <!-- =============================================== -->

      <aside class="main-sidebar">
        <section class="sidebar" id="scroll-sidebar">
          <li style="margin:1%;"></li>
          <div class="">
            <img class="profile-user-img img-responsive" src="picture/pdam.png" alt="User profile picture">
          </div>
         <li style="margin:1%;"></li>
          <ul class="sidebar-menu">
            <li class="header">MENU UTAMA KARYAWAN</li>
            <style type="text/css">
                  .upper { text-transform: uppercase; }
            </style>
            <li><a href="index_karyawan.php?open=" class="upper"><i class="fa fa-home"></i><?php
                          $nama=$_SESSION['username'];
                          echo "$nama";
                          ?></a></li> 

            <li class='treeview'>
              <a href='#'><i class='fa fa-random'></i> <span>TRANSAKSI</span><i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
                <li><a href='index_karyawan.php?open=aduan_karyawan'><i class='fa fa-random'></i>Aduan</a></li>
                <li><a href='index_karyawan.php?open=perbaikan_karyawan'><i class='fa fa-random'></i>Proses Aduan</a></li>


              </ul>
            </li>
            <li><a href="index.php"><i class="fa fa-power-off"></i><span>LOGOUT</span></a></li>         
          </ul>
        </section>
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section  class="content-header">
          <h1>PDAM BANDARMASIH</h1>
        </section>

        <!-- Main content -->
        <section  class="content">
               
        	<?php 
 
          include "filekar.php";?>        		
          
        </section><!-- /.content -->       
      </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

  
  </body>
</html>