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
$result = $koneksi->query("SELECT a.*,'' as aksi,
                          CONCAT(b.nama,' - ',b.merk,' - ',b.tipe) as barang,
                          c.nama as nama_teknisi
                          FROM perbaikan a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.teknisi=c.id
                          where a.tanggal like '$bulan%'
                          order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC);

$result2 = $koneksi->query("SELECT COUNT(*) as hitung
                          FROM perbaikan a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.teknisi=c.id
                          where a.tanggal like '$bulan%'
                          order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC);

$result3 = $koneksi->query("SELECT COUNT(*) as baru
                          FROM perbaikan a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.teknisi=c.id
                          where a.tanggal like '$bulan%' and status = 'Baru'
                          order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC);

$result4 = $koneksi->query("SELECT COUNT(*) as proses
                          FROM perbaikan a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.teknisi=c.id
                          where a.tanggal like '$bulan%' and status = 'Proses'
                          order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC);

$result5 = $koneksi->query("SELECT COUNT(*) as selesai
                          FROM perbaikan a 
                          left join barang b on a.id_barang=b.id
                          left join karyawan c on a.teknisi=c.id
                          where a.tanggal like '$bulan%' and status = 'Selesai'
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
$pdf->Cell(30,10,'Data Proses Aduan '.$nama_bulan,0,0,'C');
$pdf->Ln();

//table Head
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(10,40,40,30,30,30,25,25,30,20));
$pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C'));
$pdf->Row(array('No','Nama Barang','Aduan','Teknisi','Analisa','Tindakan','Proses','Selesai','Keterangan','Status'));

//table content
$x=1;
foreach ($result as $row) 
{
    $barang = $row["barang"];
    $aduan = $row["aduan"];
    $nama_teknisi = $row["nama_teknisi"];
    $analisa = $row["analisa"];
    $tindakan = $row["tindakan"];
    $tanggal_proses = $row["tanggal_proses"];
    $tanggal_selesai = $row["tanggal_selesai"];
    $ket_selesai = $row["ket_selesai"];
    $status = $row["status"];

    //Now show the columns
    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','L','L','L','L','L','C','C','L','C'));
    $pdf->Row(array($x,$barang,$aduan,$nama_teknisi,$analisa,$tindakan,$tanggal_proses,$tanggal_selesai,$ket_selesai,$status));
    $x++;
}

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(40,40,40,40));
$pdf->SetAligns(array('C','C','C','C'));
$pdf->Row(array('Total Data Perbaikan','Total Status Baru','Total Status Proses','Total Status Selesai'));


foreach ($result2 as $row2)
foreach ($result3 as $row3)
foreach ($result4 as $row4)
foreach ($result5 as $row5)

 {
 $hitung = $row2["hitung"];  
 $baru = $row3["baru"];  
 $proses = $row4["proses"];  
 $selesai = $row5["selesai"];  

    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','C','C','C'));
    $pdf->Row(array($hitung,$baru,$proses,$selesai));
    $x++;
}



//tanggal

$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->Cell(230);
$pdf->Cell(20,8,'Banjarmasin, '.$tgl,0,0,'L');

$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(240);
$pdf->Cell(20,8,"(_____________________________)",0,0,'C');

$pdf->Output();
?>