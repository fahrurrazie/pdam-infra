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
                        c.nama as karyawan,'' as aksi,d.nama as departemen,
                        e.nama as nama_penyerah, f.nama as nama_penerima
                        FROM permintaan a 
                        left join barang b on a.id_barang=b.id
                        left join karyawan c on a.id_karyawan=c.id
                        left join departemen d on a.id_departemen=d.id
                        left join karyawan e on a.penyerah=e.id
                        left join karyawan f on a.penerima=f.id
                        where a.tanggal_penyerahan like '$bulan%' and a.status='4' 
                        order by a.tanggal_penyerahan")
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
$pdf->Cell(30,10,'Data Penyerahan '.$nama_bulan,0,0,'C');
$pdf->Ln();

//table Head
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(10,40,60,20,40,40,30,40));
$pdf->SetAligns(array('C','C','C','C','C','C','C','C'));
$pdf->Row(array('No','Peminta','Nama Barang','Jumlah','Penyerah','Penerima','Tanggal','Keterangan'));

//table content
$x=1;
foreach ($result as $row) 
{
    $peminta = $row["karyawan"];
    $nama_barang = $row["nama_barang"];
    $jumlah = $row["jumlah_setujui"];
    $penyerah = $row["nama_penyerah"];
    $penerima = $row["nama_penerima"];
    $tanggal_penyerahan = $row["tanggal_penyerahan"];
    $ket_penyerahan = $row["ket_penyerahan"];

    //Now show the columns
    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','L','L','C','L','L','C','L'));
    $pdf->Row(array($x,$peminta,$nama_barang,$jumlah,$penyerah,$penerima,$tanggal_penyerahan,$ket_penyerahan));
    $x++;
}

//tanggal
$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->Cell(230);
$pdf->Cell(20,8,'Banjarmasin '.$tgl,0,0,'L');

$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(240);
$pdf->Cell(20,8,"(___________________________)",0,0,'C');

$pdf->Output();
?>