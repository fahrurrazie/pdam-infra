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
        <a href="index_admin.php" class="logo">
          <span class="logo-lg"><b>PDAM BANDARMASIH</b></span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only"> Toggle navigation</span>
          </a>
<div class="navbar-custom-menu">
       <ul class="nav navbar-nav" > 
      <li class="dropdown notifications-menu">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fa fa-bell-o"></i>

          <?php 

          $notif = $koneksi->query("SELECT COUNT(*) AS angka FROM perbaikan WHERE status = 'Baru' ");
          $tampil = mysqli_fetch_assoc($notif);

           ?>

          <span class="label label-warning"><?php echo $tampil['angka'] ?></span> 
          </a>
          <ul class=" dropdown-menu dropdown-menu-lg dropdown-menu-right">  

           <li class="header"><?php echo $tampil['angka'] ?> Notifications</li>           

          <?php 

            $msg = $koneksi->query("SELECT a.*, b.nama as departemen, c.nama as id_barang FROM perbaikan a 
                                  LEFT JOIN departemen b ON a.departemen = b.id 
                                  LEFT JOIN barang c ON a.id_barang = c.id
                                  WHERE status = 'Baru' ");
                                  while ($isi = $msg->fetch_assoc() ) {  ?>
          <li>   
             <div class="dropdown-divider"></div>
       
                <!-- <a href="?halaman=perbaikan&aksi=detail&id=<?php echo $isi['id'] ?>" class="dropdown-item">     -->
                  <a href="index_admin.php?open=perbaikan" class="dropdown-item">


                    ADUAN         : <?php echo $isi['aduan'] ?> <br>
                    BARANG        : <?php echo $isi['id_barang'] ?> <br>
                    TEMPAT    : <?php echo $isi['departemen'] ?> <br>
                    TANGGAL       : <?php echo $isi['tanggal'] ?> <br><br>

                  </a>

                <?php } ?>
              
          </li>
                </ul>
      </li>
       </ul> 
       </div>
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
            <li class="header">MENU UTAMA ADMIN</li>           
                <style type="text/css">
               .upper { text-transform: uppercase; }
                </style>
                      <li><a href="index_admin.php" class="upper"><i class="fa fa-home"></i><?php
                              $nama=$_SESSION['username'];
                              echo "$nama";
                              ?></a></li>  
            <li class='treeview'>
                <a href='#'><i class='fa fa-copy'></i> <span>MASTER</span><i class='fa fa-angle-left pull-right'></i></a>
                  <ul class='treeview-menu'>
                    <li><a href='index_admin.php?open=karyawan'><i class='fa fa-dropbox'></i>Karyawan</a></li>
                    <li><a href='index_admin.php?open=suplier'><i class='fa fa-dropbox'></i>Suplier</a></li>
                    <li><a href='index_admin.php?open=barang'><i class='fa fa-dropbox'></i>Barang</a></li>
                    <li><a href='index_admin.php?open=departemen'><i class='fa fa-dropbox'></i>Departemen</a></li>
                  </ul>
            </li>
            <li class='treeview'>
              <a href='#'><i class='fa fa-random'></i> <span>TRANSAKSI</span><i class='fa fa-angle-left pull-right'></i></a>
                <ul class='treeview-menu'>
    
                    <li><a href='index_admin.php?open=aduan_perbaikan'><i class='fa fa-random'></i>Aduan</a></li>
                    <li><a href='index_admin.php?open=perbaikan'><i class='fa fa-random'></i>Proses Aduan</a></li>
                    <li><a href='index_admin.php?open=rekappembelian'><i class='fa fa-random'></i>Pembelian</a></li>
                    <li><a href='index_admin.php?open=permintaan'><i class='fa fa-random'></i>Permintaan</a></li>
                    <li><a href='index_admin.php?open=penyerahan'><i class='fa fa-random'></i>Penyerahan</a></li>
                    <li><a href='index_admin.php?open=peminjaman'><i class='fa fa-random'></i>Peminjaman</a></li>
                    <li><a href='index_admin.php?open=rekapperawatan'><i class='fa fa-random'></i>perawatan</a></li>

                </ul>
            </li>
              <li class='treeview'>
              <a href='#'><i class='fa fa-sort-amount-desc'></i> <span>LAPORAN</span><i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
                <li><a href='index_admin.php?open=rekapkinerjaperbaikan'><i class='fa fa-random'></i>Kinerja Perbaikan</a></li>
                <li><a href='index_admin.php?open=rekapkinerjaperawatan'><i class='fa fa-random'></i>Kinerja Perawatan</a></li>
                <li><a href='index_admin.php?open=rekapdepartemen'><i class='fa fa-random'></i>Kerusakan Departemen</a></li>
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
 
          include "file.php";?>           
          
        </section><!-- /.content -->       
      </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

  
  </body>
</html>