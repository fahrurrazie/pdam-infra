<?php
error_reporting(E_ALL & ~E_NOTICE);
include "koneksi.php"; 
switch ($_GET['hapus'])
{	

	case 'suplier' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from suplier where id = '$id' ");
	break;

	case 'barang' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from barang where id = '$id' ");
	break;

	case 'karyawan' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from karyawan where id = '$id' ");
	break;

	case 'keaktifan' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from keaktifan where id = '$id' ");
	break;

	case 'pembelian' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from pembelian where id = '$id' ");

					//detail
					//select detail
					$data_detail = $koneksi->query("SELECT * FROM pembelian_detail where id_pembelian = '$id'")->fetch_all(MYSQLI_ASSOC);

					//update stok barang, kurangi
					foreach ($data_detail as $detail) {
						$id_barang=$detail['id_barang'];
						$jumlah_beli=$detail['qty'];

						$barang = $koneksi->query("SELECT * FROM barang where id ='$id_barang'")->fetch_assoc();

						$stok=$barang['stok']-$jumlah_beli;

						$sql = $koneksi->query(" UPDATE barang set  stok = '$stok', harga = '$harga'	WHERE id = $id_barang; ");
					}
					//hapus detail
					$sql_detail = $koneksi->query(" DELETE from pembelian_detail where id_pembelian = '$id' ");
	break;


	case 'aduan' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from perbaikan where id = '$id' ");
	break;


	case 'perbaikan' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from perbaikan where id = '$id' ");
	break;

	case 'perawatan' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from perawatan where id = '$id' ");
					//hapus detail
					$sql_detail = $koneksi->query(" DELETE from perawatan_detail where id_perawatan = '$id' ");
	break;


	case 'departemen' :	$id=$_GET['id'];				
					$sql = $koneksi->query(" DELETE from departemen where id = '$id' ");
	break;


																															
}

?>