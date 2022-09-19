<?php
include "koneksi.php";						  
require('fpdf/mc_table.php');
 //tanggal
$today = date('Y-m-d');
function BulanIndo($bulan){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");            
  $result = $BulanIndo[(int)$bulan-1];;     
  return($result);
}

$a=explode("-",$today);
$bln=BulanIndo($a[1]);
$tgl=$a[2].' '.$bln.' '.$a[0];
//batas tanggal

$bulan=$_GET['bulan'];
$result = $koneksi->query("SELECT a.*,CONCAT(b.nama,' - ',b.merk,' - ',b.tipe) as nama_barang ,
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

$result2 = $koneksi->query("SELECT COUNT(*) as pinjam
                          FROM peminjaman a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.penyerah=c.id
                          where a.tanggal like '$bulan%' and status = '0'
                          order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC);

$result3 = $koneksi->query("SELECT COUNT(*) as sudahkembali
                          FROM peminjaman a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.penyerah=c.id
                          where a.tanggal like '$bulan%' and status = '1'
                          order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC);


//Create a new PDF file
$pdf = new PDF_MC_Table('L','mm',array(297,210)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);
$pdf->Cell(10);
$pdf->Image("picture/pdam.png", 10, 10 , 20 , 20);
$pdf->Cell(10);
$pdf->Image("picture/sgs.jpg", 270, 10 , 20 , 20);
$pdf->Ln();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(130);
$pdf->Cell(30,5,'PERUSAHAAN DAERAH AIR MINUM BANDARMASIH',0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(130);
$pdf->Cell(30,5,'Jl. Achmad Yani Km. 2,5 No.12 Kota Pos 30 Banjarmasin 70236',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(130);
$pdf->Cell(30,5,'Telp. (0511) 3253617 / 3251690 / 3252541 Fax.(0511) 3253238',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(130);
$pdf->Cell(30,5,'Website : www.pdambandarmasih.com e-mail : contact@pdambandarmasih.com',0,0,'C');

$pdf->Line(10, 31, 290, 31);
$pdf->Ln();

//nama bulan
$array_bulan=explode("-", $bulan);
if (count($array_bulan)>1){
   $nama_bulan='Bulan '.BulanIndo($array_bulan[1]).' '.$array_bulan[0]; 
}else{
    $nama_bulan='Tahun '.$bulan;
}
//
$pdf->SetFont('Arial','B',13);
$pdf->Cell(130);
$pdf->Cell(30,10,'Data Peminjaman '.$nama_bulan,0,0,'C');
$pdf->Ln();

//table Head
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(10,30,50,20,40,40,35,30,25));
$pdf->SetAligns(array('C','C','C','C','C','C','C','C','C'));
$pdf->Row(array('No','Tanggal','Nama Barang','Jumlah','Penyerah','Peminjam','Keterangan','Status','Tanggal Kembali'));

//table content
$x=1;
foreach ($result as $row) 
{
    $tanggal = $row["tanggal"];
    $nama_barang = $row["nama_barang"];
    $jumlah = $row["jumlah"];
    $penyerah = $row["penyerah"];
    $peminjam = $row["peminjam"];
    $ket = $row["ket"];
    switch ($row["status"]) {
      case '0':
        $status='Pinjam';
      break;
      case '1':
        $status='Sudah Kembali';
      break;
    }
    $tanggal_kembali = $row["tanggal_kembali"];

    //Now show the columns
    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','L','L','C','L','L','L','C','C'));
    $pdf->Row(array($x,$tanggal,$nama_barang,$jumlah,$penyerah,$peminjam,$ket,$status,$tanggal_kembali));
    $x++;
}

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(55,55));
$pdf->SetAligns(array('C','C'));
$pdf->Row(array('Total Barang Dipinjam','Total Barang Sudah Kembali'));


foreach ($result2 as $row2)
foreach ($result3 as $row3)

 {
 $pinjam = $row2["pinjam"];  
 $sudahkembali = $row3["sudahkembali"];  

    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','C'));
    $pdf->Row(array($pinjam,$sudahkembali));
    $x++;
}


//tanggal
$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->Cell(230);
$pdf->Cell(20,8,'Banjarmasin, '.$tgl,0,0,'L');

$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(240);
$pdf->Cell(20,8,"(___________________________)",0,0,'C');

$pdf->Output();
?>