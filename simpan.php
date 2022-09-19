<?php

include "koneksi.php";

switch ($_POST['simpan'])
{
	//suplier
	case 'suplier'   :
		$id = $_POST['id'];
		$nama = $_POST['nama'];  $alamat = $_POST['alamat'];  $kota = $_POST['kota'];  
		$telp = $_POST['telp']; $email = $_POST['email']; $jenis = '';

		foreach ($_POST['jenis'] as $j) {
			if($jenis==''){
				$jenis=$j;
			}else{
				$jenis=$jenis.','.$j;
			}
		}

		if (strlen($id)> 0){
			$sql = $koneksi->query(" UPDATE suplier 
				set  nama = '$nama', alamat = '$alamat', kota = '$kota' , telp = '$telp', email = '$email', jenis = '$jenis'  
				WHERE id = $id; ");
		}else{
			$sql = $koneksi->query(" INSERT INTO suplier (nama, alamat, kota, telp, email, jenis) 
				VALUES ('$nama', '$alamat', '$kota', '$telp', '$email', '$jenis') ");	
		}	

	break;

	//barang
	case 'barang'   :
		$id = $_POST['id'];
		$nama = $_POST['nama'];  $merk = $_POST['merk'];  $tipe = $_POST['tipe'];  $stok = $_POST['stok']; 

		if (strlen($id)> 0){
			$sql = $koneksi->query(" UPDATE barang 
				set  nama = '$nama', merk = '$merk', tipe = '$tipe' , stok = '$stok' 
				WHERE id = $id; ");
		}else{
			$sql = $koneksi->query(" INSERT INTO barang (nama, merk, tipe, stok) 
				VALUES ('$nama', '$merk', '$tipe', '$stok') ");	
		}	

	break;

	//karyawan
	case 'karyawan'   :
		$id = $_POST['id'];
		$nik = $_POST['nik'];  $nama = $_POST['nama'];  $alamat = $_POST['alamat'];  $jabatan = $_POST['jabatan']; 
		$departemen = $_POST['departemen']; $keterangan = $_POST['keterangan']; $username = $_POST['username'];   $password = $_POST['password'];  

		if (strlen($id)> 0){
			$sql = $koneksi->query(" UPDATE karyawan 
				set  nik = '$nik', nama = '$nama', alamat = '$alamat' , jabatan = '$jabatan' , departemen = '$departemen' , keterangan = '$keterangan', username = '$username', password = '$password'
				WHERE id = $id; ");
		}else{
			$sql = $koneksi->query(" INSERT INTO karyawan (nik, nama, alamat, jabatan, departemen, keterangan, username, password) 
				VALUES ('$nik', '$nama', '$alamat', '$jabatan', '$departemen', '$keterangan', '$username', '$password') ");	


			}


	break;


	case 'keaktifan'   :
		$id = $_POST['id'];
    	$id_karyawan = $_POST['id_karyawan'];  $jumlah_pemeliharaan = $_POST['jumlah_pemeliharaan'];  
		$jumlah_perbaikan = $_POST['jumlah_perbaikan']; 

		if (strlen($id)> 0){
			$sql = $koneksi->query(" UPDATE keaktifan 
				set   id_karyawan = '$id_karyawan', jumlah_pemeliharaan = '$jumlah_pemeliharaan' , jumlah_perbaikan = '$jumlah_perbaikan'
				WHERE id = $id; ");
		}else{
			$sql = $koneksi->query(" INSERT INTO keaktifan (id_karyawan, jumlah_pemeliharaan, jumlah_perbaikan) 
				VALUES ( '$id_karyawan', '$jumlah_pemeliharaan', '$jumlah_perbaikan') ");	
		}	

	break;


		//pembelian
	case 'pembelian'   :
		//var_dump($_POST);

		$nota = $_POST['data'][0]['value'];  $tanggal = $_POST['data'][1]['value'];  $suplier = $_POST['data'][2]['value'];  
		$qty_pembelian = $_POST['data'][3]['value']; $total = $_POST['data'][4]['value'];

		$detail=$_POST['detail'];

		$sql = $koneksi->query(" INSERT INTO pembelian (nota, tanggal, id_suplier, qty, total_harga ) 
				VALUES ('$nota', '$tanggal', '$suplier', '$qty_pembelian', '$total') ");

		$data = $koneksi->query("SELECT * FROM pembelian order by id desc limit 1")->fetch_assoc();
		$id = $data['id'];

		for ($i=0; $i <count($detail) ; $i++) {

			$id_barang=$detail[$i][1]; $qty=$detail[$i][3]; $satuan=$detail[$i][4]; $harga=$detail[$i][5];

			$sql = $koneksi->query(" INSERT INTO pembelian_detail (id_pembelian, id_barang, qty, satuan, harga ) 
			VALUES ('$id', '$id_barang', '$qty', '$satuan', '$harga') ");

			//update harga dan stok
			$barang = $koneksi->query("SELECT * FROM barang where id ='$id_barang'")->fetch_assoc();

			$stok=$qty+$barang['stok'];;

			$sql = $koneksi->query(" UPDATE barang set  stok = '$stok', harga = '$harga'	WHERE id = $id_barang; ");
			//
		}	

	break;




//perawatan
	case 'perawatan'   :
		//var_dump($_POST);

		$tanggal = $_POST['data'][0]['value'];  $id_departemen = $_POST['data'][1]['value'];  
		$lokasi = $_POST['data'][2]['value']; 
		$id_karyawan = $_POST['data'][3]['value']; $mengetahui = $_POST['data'][4]['value'];

		$detail=$_POST['detail'];

		$sql = $koneksi->query(" INSERT INTO perawatan (lokasi, tanggal, id_departemen, id_karyawan, mengetahui ) 
				VALUES ('$lokasi', '$tanggal', '$id_departemen', '$id_karyawan', '$mengetahui') ");

		$data = $koneksi->query("SELECT * FROM perawatan order by id desc limit 1")->fetch_assoc();
		$id = $data['id'];

		for ($i=0; $i <count($detail) ; $i++) {

				$id_barang=$detail[$i][1]; $keterangan=$detail[$i][3];

				$sql = $koneksi->query(" INSERT INTO perawatan_detail (id_perawatan, id_barang, keterangan) 
				VALUES ('$id', '$id_barang', '$keterangan') ");

}
	

	break;

	//aduan
	case 'aduan'   :
		$id = $_POST['id'];
		$aduan = $_POST['aduan'];  $tanggal = $_POST['tanggal'];  $id_barang = $_POST['barang']; $departemen = $_POST['departemen']; 
		$ruangan = $_POST['ruangan'];  $vol = $_POST['vol']; 

		if (strlen($id)> 0){
			$sql = $koneksi->query(" UPDATE perbaikan 
				set  aduan = '$aduan', tanggal = '$tanggal', id_barang = '$id_barang' , id_departemen = '$departemen', ruangan = '$ruangan', vol = '$vol' 
				WHERE id = $id; ");
		}else{
			$sql = $koneksi->query(" INSERT INTO perbaikan (aduan, tanggal, id_barang, departemen, ruangan, vol, status) 
				VALUES ('$aduan', '$tanggal', '$id_barang', '$departemen', '$ruangan', '$vol', 'Baru') ");	
		}	


	break;

	//prosesperbaikan
	case 'prosesperbaikan'   :
		$id = $_POST['id'];
		$analisa = $_POST['analisa'];  $tindakan = $_POST['tindakan']; $tanggal_proses = $_POST['tanggal_proses']; 
		$teknisi = $_POST['teknisi']; 

		$sql = $koneksi->query(" UPDATE perbaikan 
			set  analisa = '$analisa', tindakan = '$tindakan', tanggal_proses = '$tanggal_proses',
				 teknisi = '$teknisi'  , status ='Proses' 
			WHERE id = $id; ");

	break;

	//selesaiperbaikan
	case 'selesaiperbaikan'   :
		$id = $_POST['id_perbaikan'];
		$tanggal_selesai = $_POST['tanggal_selesai']; $ket_selesai = $_POST['ket_selesai'];  

		$sql = $koneksi->query(" UPDATE perbaikan SET tanggal_selesai = '$tanggal_selesai' , ket_selesai = '$ket_selesai' ,
								status ='Selesai' 
								WHERE id = $id; ");

	break;



	//departemen
	case 'departemen'   :
		$id = $_POST['id'];
		$nama = $_POST['nama'];

		if (strlen($id)> 0){
			$sql = $koneksi->query(" UPDATE departemen 
				set  nama = '$nama' 
				WHERE id = $id; ");
		}else{
			$sql = $koneksi->query(" INSERT INTO departemen (nama) 
				VALUES ('$nama') ");	
		}	

	break;

	//permintaan
	case 'permintaan'   :
		$id = $_POST['id'];  $tanggal = $_POST['tanggal'];  $id_karyawan = $_POST['karyawan']; $id_departemen = $_POST['departemen'];
		$id_barang = $_POST['barang']; $jumlah = $_POST['jumlah'];  $satuan = $_POST['satuan']; $ket = $_POST['ket'];

		if (strlen($id)> 0){
			$sql=$koneksi->query("UPDATE permintaan SET tanggal = '$tanggal', id_karyawan = '$id_karyawan',
									id_departemen = '$id_departemen',id_barang = '$id_barang', 
									jumlah = '$jumlah', satuan = '$satuan',
									ket = '$ket' WHERE id ='$id'; ");
		}else{
			$sql = $koneksi->query(" INSERT INTO permintaan (tanggal, id_karyawan, id_departemen, id_barang,  jumlah,  satuan, ket) 
				VALUES ('$tanggal', '$id_karyawan', '$id_departemen', '$id_barang', '$jumlah', '$satuan', '$ket') ");	
		}

	break;

	case 'verifikasi'   :
		$id = $_POST['id_permintaan'];  $tanggal_status = $_POST['tanggal_status'];  $status = $_POST['status_verifikasi']; 
		$jumlah_setujui = $_POST['jumlah_setujui']; $ket = $_POST['ket'];

		$sql=$koneksi->query("UPDATE permintaan 
								SET tanggal_status = '$tanggal_status', jumlah_setujui = '$jumlah_setujui', status = '$status', ket='$ket' 
								WHERE id ='$id'; ");

	break;

//penyerahan
	case 'penyerahan'   :
		$id = $_POST['id'];  $tanggal_penyerahan = $_POST['tanggal_penyerahan'];  $ket_penyerahan = $_POST['ket_penyerahan'];
		$penyerah = $_POST['penyerah'];  $penerima = $_POST['penerima'];

		$sql=$koneksi->query("UPDATE permintaan SET tanggal_penyerahan = '$tanggal_penyerahan', ket_penyerahan = '$ket_penyerahan',
							  penyerah = '$penyerah', penerima = '$penerima', 
							  status='4' WHERE id ='$id'; ");

		//update  stok
			//1, ambil id barang
			$penyerahan=$koneksi->query("SELECT * FROM permintaan where id ='$id'")->fetch_assoc();
			$id_barang=$penyerahan['id_barang'];
			$jumlah_setujui=$penyerahan['jumlah_setujui'];
			//2.select barang
			$barang = $koneksi->query("SELECT * FROM barang where id ='$id_barang'")->fetch_assoc();
			//3.kurangi stok
			$stok=$barang['stok']-$jumlah_setujui;

			$sql = $koneksi->query(" UPDATE barang set  stok = '$stok'	WHERE id = $id_barang; ");
		//

	break;

	//peminjaman
	case 'peminjaman'   :
		$id = $_POST['id'];  $tanggal = $_POST['tanggal']; $id_barang = $_POST['barang']; 
		$peminjam = $_POST['peminjam']; $penyerah = $_POST['penyerah']; $jumlah = $_POST['jumlah']; $ket = $_POST['ket'];
		$jumlah_lama = $_POST['jumlah_lama'];

		if (strlen($id)> 0){
			$sql=$koneksi->query("UPDATE peminjaman SET tanggal = '$tanggal', id_barang = '$id_barang', 
									penyerah = '$penyerah', peminjam = '$peminjam', jumlah = '$jumlah',
									ket = '$ket' WHERE id ='$id'; ");
			//update  stok
				//1.select barang
				$barang = $koneksi->query("SELECT * FROM barang where id ='$id_barang'")->fetch_assoc();
				//2.kurangi stok
				$stok=($barang['stok']+$jumlah_lama)-$jumlah;
				//3.update stok
				$sql = $koneksi->query(" UPDATE barang set  stok = '$stok'	WHERE id = $id_barang; ");
			//
		}else{
			$sql = $koneksi->query(" INSERT INTO peminjaman (tanggal, id_barang, penyerah, peminjam, jumlah, ket) 
				VALUES ('$tanggal', '$id_barang', '$penyerah', '$peminjam', '$jumlah', '$ket') ");	
			//update  stok
				//1.select barang
				$barang = $koneksi->query("SELECT * FROM barang where id ='$id_barang'")->fetch_assoc();
				//2.kurangi stok
				$stok=$barang['stok']-$jumlah;
				//3.update stok
				$sql = $koneksi->query(" UPDATE barang set  stok = '$stok'	WHERE id = $id_barang; ");
			//
		}

	break;

	//pengembalian
	case 'pengembalian'   :
		$id = $_POST['id_pengembalian'];
		$tanggal_kembali = $_POST['tanggal_kembali'];  

		// var_dump($_POST);
		$sql = $koneksi->query(" UPDATE peminjaman SET tanggal_kembali = '$tanggal_kembali' , status ='1' 
			WHERE id = $id; ");
		//update  stok
			//1, ambil id barang dari tabel peminjaman
			$peminjaman=$koneksi->query("SELECT * FROM peminjaman where id ='$id'")->fetch_assoc();
			$id_barang=$peminjaman['id_barang'];

			$jumlah_pinjam=$peminjaman['jumlah'];
			//2.select barang
			$barang = $koneksi->query("SELECT * FROM barang where id ='$id_barang'")->fetch_assoc();
			//3.kembalikan stok
			$stok=$barang['stok']+$jumlah_pinjam;
			//4.update stok
			$sql = $koneksi->query(" UPDATE barang set  stok = '$stok'	WHERE id = $id_barang; ");
		//

	break;



}

?>