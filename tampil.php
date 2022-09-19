<?php

include "koneksi.php";
switch ($_GET['data'])
{
//suplier
case 'suplier'   : 
  if ($_GET['jenis_filter']!='-'){
    $jenis='';

    $jns=explode(",", $_GET['jenis_filter']);
    foreach ($jns as $j) {
      if($jenis==''){
        $jenis="jenis like '%$j%' ";
      }else{
        $jenis=$jenis." and jenis like '%$j%' ";
      }
    }
    $sql = $koneksi->query("SELECT *,'' as aksi FROM suplier where ".$jenis)->fetch_all(MYSQLI_ASSOC); 
  }
  else
  {
    $sql = $koneksi->query("SELECT *,'' as aksi FROM suplier")->fetch_all(MYSQLI_ASSOC); 
  }
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editsuplier'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM suplier where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'selectsuplier'   :  
  $sql = $koneksi->query("SELECT id as id, nama as text FROM suplier ")->fetch_all(MYSQLI_ASSOC);
  $kirim=array('suplier' => $sql); 
  echo json_encode($kirim);

break;

//barang
case 'barang'   : 
  $sql = $koneksi->query("SELECT *,'' as aksi FROM barang")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editbarang'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM barang where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'selectbarang'   :  
  $sql = $koneksi->query("SELECT id as id, CONCAT(nama,' - ',merk,' - ',tipe) as text FROM barang ")->fetch_all(MYSQLI_ASSOC);
  $kirim=array('barang' => $sql); 
  echo json_encode($kirim);

break;



//karyawan
case 'karyawan'   : 
  $sql = $koneksi->query("SELECT *,'' as aksi FROM karyawan")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                

break;

case 'editkaryawan'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM karyawan where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'selectkaryawan'   :  
  $sql = $koneksi->query("SELECT id as id, nama as text FROM karyawan ")->fetch_all(MYSQLI_ASSOC);
  $kirim=array('karyawan' => $sql); 
  echo json_encode($kirim);

break;

case 'selectjabatan'   :  
  $sql = $koneksi->query("SELECT id as id, jabatan as text FROM karyawan ")->fetch_all(MYSQLI_ASSOC);
  $kirim=array('karyawan' => $sql); 
  echo json_encode($kirim);

break;


case 'selectteknisi'   :  
  $sql = $koneksi->query("SELECT id as id, nama as text FROM karyawan where jabatan = 'teknisi' ")->fetch_all(MYSQLI_ASSOC);
  $kirim=array('karyawan' => $sql); 
  echo json_encode($kirim);

break;

//pembelian
case 'rekappembelian'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT a.*,'' as aksi,
                          b.nama as nama_suplier 
                          FROM pembelian a 
                          left join suplier b on a.id_suplier=b.id
                          where a.tanggal like '$bulan%' 
                          order by a.tanggal")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

//aduan perbaikan
case 'aduan'   :
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT a.*,'' as aksi,
                          CONCAT(b.nama,' - ',b.merk,' - ',b.tipe) as barang,
                          c.nama as departemen
                          FROM perbaikan a 
                          left join barang b on a.id_barang=b.id
                          left join departemen c on a.departemen=c.id
                          where a.tanggal like '$bulan%' 
                          order by a.tanggal")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editaduan'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM perbaikan where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

//perbaikan
case 'perbaikan'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT a.*,'' as aksi,
                          CONCAT(b.nama,' - ',b.merk,' - ',b.tipe) as barang,
                          c.nama as nama_teknisi
                          FROM perbaikan a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.teknisi=c.id
                          where a.tanggal like '$bulan%' 
                          order by a.tanggal")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'notifperbaikan'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT a.*,'' as aksi,
                          CONCAT(b.nama,' - ',b.merk,' - ',b.tipe) as barang,
                          c.nama as nama_teknisi
                          FROM perbaikan a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.teknisi=c.id
                          where a.tanggal like '$bulan%' 
                          order by a.tanggal")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

//perawatan
case 'rekapperawatan'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT a.*,'' as aksi,
                          b.nama as teknisi,
                          c.nama as departemen
                          FROM perawatan a 
                          left join karyawan b on a.id_karyawan=b.id
                          left join departemen c on a.id_departemen=c.id
                          where a.tanggal like '$bulan%' 
                          order by a.tanggal")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'notifikasi'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT a.*, b.nama as departemen, c.nama as id_barang FROM perbaikan a 
                                  LEFT JOIN departemen b ON a.departemen = b.id 
                                  LEFT JOIN barang c ON a.id_barang = c.id
                                  WHERE status = 'Baru'")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

//rekapkinerjaperbaikan
case 'rekapkinerjaperbaikan'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT b.nik, b.nama, COUNT(*) AS jumlah FROM perbaikan a JOIN karyawan
                  b ON a.teknisi = b.id where tanggal like '$bulan%'
                  GROUP BY b.nama order by jumlah DESC")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

//rekapkinerjaperawatan
case 'rekapkinerjaperawatan'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT c.nik, c.nama, COUNT(*) AS jumlah FROM perawatan a JOIN  
                  perawatan_detail b 
                  ON a.id = b.id_perawatan 
                  JOIN 
                  karyawan c ON a.id_karyawan = c.id
                  where tanggal like '$bulan%' GROUP BY c.nama 
                  order by jumlah DESC")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;


//departemen
case 'departemen'   : 
  $sql = $koneksi->query("SELECT *,'' as aksi FROM departemen")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editdepartemen'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM departemen where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'selectdepartemen'   :  
  $sql = $koneksi->query("SELECT id as id, nama as text FROM departemen ")->fetch_all(MYSQLI_ASSOC);
  $kirim=array('departemen' => $sql); 
  echo json_encode($kirim);

break;


case 'rekapdepartemen'   :  
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT b.nama, COUNT(*) AS jumlah FROM perbaikan a 
                          JOIN departemen b ON a.departemen = b.id 
                          where tanggal like '$bulan%' GROUP BY b.nama order by jumlah DESC ")
                          ->fetch_all(MYSQLI_ASSOC);
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);

break;
                   

case 'keaktifan'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT a.*,'' as aksi,
                          b.nama as id_karyawan
                          FROM keaktifan a 
                          left join karyawan b on a.id_karyawan=b.id
                          where a.tanggal like '$bulan%' 
                          order by a.tanggal")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
break;

case 'keaktifan_perbaikan'   : 
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT COUNT(*) as jumlah_perbaikan
                          FROM perbaikan a 
                          left join karyawan b on a.teknisi=b.id
                          where a.tanggal like '$bulan%' and teknisi = ''
                          order by a.tanggal")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 


break;

//permintaan
case 'permintaan'   : 
  $bulan=$_GET['bulan'];
  $sql = $koneksi->query("SELECT a.*,CONCAT(b.nama,' - ',b.merk,' - ',b.tipe) as nama_barang ,
                        c.nama as karyawan,'' as aksi,d.nama as departemen
                        FROM permintaan a 
                        left join barang b on a.id_barang=b.id
                        left join karyawan c on a.id_karyawan=c.id
                        left join departemen d on a.id_departemen=d.id
                        where a.tanggal like '$bulan%' 
                        order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editpermintaan'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT a.*,b.stok FROM permintaan a left join barang b on a.id_barang=b.id where a.id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'penyerahan'   : 
  $bulan=$_GET['bulan'];
  $sql = $koneksi->query("SELECT a.*,CONCAT(b.nama,' - ',b.merk,' - ',b.tipe) as nama_barang ,
                        c.nama as karyawan,'' as aksi,d.nama as departemen,
                        e.nama as nama_penyerah, f.nama as nama_penerima
                        FROM permintaan a 
                        left join barang b on a.id_barang=b.id
                        left join karyawan c on a.id_karyawan=c.id
                        left join departemen d on a.id_departemen=d.id
                        left join karyawan e on a.penyerah=e.id
                        left join karyawan f on a.penerima=f.id
                        where a.tanggal like '$bulan%' and (a.status='2' or a.status='4')
                        order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

//peminjaman
case 'peminjaman'   : 
  $bulan=$_GET['bulan'];
  $sql = $koneksi->query("SELECT a.*,CONCAT(b.nama,' - ',b.merk,' - ',b.tipe) as nama_barang ,
                        c.nama as penyerah,
                        d.nama as peminjam,
                        '' as aksi 
                        FROM peminjaman a 
                        left join barang b on a.id_barang=b.id
                        left join karyawan c on a.penyerah=c.id
                        left join karyawan d on a.peminjam=d.id
                        where a.tanggal like '$bulan%'
                        order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;
  
  $bulan=$_GET['bulan']; 
  $sql = $koneksi->query("SELECT a.*,'' as aksi,
                          b.nama as nama_suplier 
                          FROM pembelian a 
                          left join suplier b on a.id_suplier=b.id
                          where a.tanggal like '$bulan%' 
                          order by a.tanggal")
                  ->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);              

case 'editpeminjaman'   :   
  $id=$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM peminjaman where id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;
}

?>