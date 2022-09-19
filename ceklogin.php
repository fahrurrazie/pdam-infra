<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi," SELECT * FROM karyawan WHERE username = '$username' AND password = '$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
$get = mysqli_fetch_array($login);
$level = $get['jabatan'];
// cek apakah username dan password di temukan pada database
if($cek > 0){

    // cek jika user login sebagai admin
    

        // buat session login dan username
        $_GET['password'] = $password;
        $_SESSION['username'] = $username;
        $_SESSION['jabatan'] = "jabatan";

        if ($level=="supervisor") {
        header("location:index_admin.php");   
        // alihkan ke halaman dashboard admin
        

    // cek jika user login sebagai teknisi
    }else if ($level =="teknisi"){
        // buat session login dan username
        // alihkan ke halaman dashboard teknisi
        header("location:index_teknisi.php");

    // cek jika user login sebagai pegawai
    }else if($level =="staf"){
        // buat session login dan username
        // alihkan ke halaman dashboard pegawai
        header("location:index_karyawan.php");
    }

    }
    else{

        echo"
        <script>
        alert(' Kata Sandi Atau Nama Pemakai Salah !');
        window.location='index.php'
        </script>
        ";

}
?>
