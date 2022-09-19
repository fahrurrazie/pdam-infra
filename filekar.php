<?php
if(isset($_GET['open'])) {
	switch ($_GET['open']){	
		default			: if(!file_exists ("membagusi/berandakar.php")) die ("File tidak ada"); 
								include "membagusi/berandakar.php"; break;

		case '' 		: if(!file_exists ("membagusi/berandakar.php")) die ("File tidak ada"); 
								include "membagusi/berandakar.php"; break;


		case 'suplier'   :if(!file_exists ("suplier.php")) die ("File tidak ada"); 
								include "suplier.php";  break;

		case 'barang'   :if(!file_exists ("barang.php")) die ("File tidak ada"); 
								include "barang.php";  break;	

	    case 'karyawan'   :if(!file_exists ("karyawan.php")) die ("File tidak ada"); 
								include "karyawan.php";  break;

		case 'pembelian'   :if(!file_exists ("pembelian.php")) die ("File tidak ada"); 
								include "pembelian.php";  break; 

		case 'rekappembelian'   :if(!file_exists ("rekappembelian.php")) die ("File tidak ada"); 
								include "rekappembelian.php";  break;

		case 'perawatan'   :if(!file_exists ("perawatan.php")) die ("File tidak ada"); 
								include "perawatan.php";  break; 

		case 'rekapperawatan'   :if(!file_exists ("rekapperawatan.php")) die ("File tidak ada"); 
								include "rekapperawatan.php";  break;

		case 'perawatantek'   :if(!file_exists ("perawatantek.php")) die ("File tidak ada"); 
								include "perawatantek.php";  break; 



		case 'aduan_perbaikan'   :if(!file_exists ("aduan.php")) die ("File tidak ada"); 
								include "aduan.php";  break;

		case 'aduan_karyawan'   :if(!file_exists ("aduankar.php")) die ("File tidak ada"); 
								include "aduankar.php";  break;


		case 'perbaikan'   :if(!file_exists ("perbaikan.php")) die ("File tidak ada"); 
								include "perbaikan.php";  break;

		case 'perbaikan_karyawan'   :if(!file_exists ("perbaikankar.php")) die ("File tidak ada"); 
								include "perbaikankar.php";  break;

		case 'departemen'   :if(!file_exists ("departemen.php")) die ("File tidak ada"); 
								include "departemen.php";  break;

		case 'rekapdepartemen'   :if(!file_exists ("rekapdepartemen.php")) die ("File tidak ada"); 
								include "rekapdepartemen.php";  break;


		case 'permintaan'   :if(!file_exists ("permintaan.php")) die ("File tidak ada"); 
								include "permintaan.php";  break;

		case 'penyerahan'   :if(!file_exists ("penyerahan.php")) die ("File tidak ada"); 
								include "penyerahan.php";  break;
																																																																																																																																																																																																																																																														
		case 'peminjaman'   :if(!file_exists ("peminjaman.php")) die ("File tidak ada"); 
								include "peminjaman.php";  break;


		case 'rekapkinerjaperbaikan'   :if(!file_exists ("rekapkinerjaperbaikan.php")) die ("File tidak ada"); 
								include "rekapkinerjaperbaikan.php";  break;

		case 'rekapkinerjaperawatan'   :if(!file_exists ("rekapkinerjaperawatan.php")) die ("File tidak ada"); 
								include "rekapkinerjaperawatan.php";  break;


	}
}
else {
	if(!file_exists ("membagusi/berandakar.php")) die ("File tidak ada"); 
		include "membagusi/berandakar.php"; 
}
?>