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
$bulan=BulanIndo($a[1]);
$tgl=$a[2].' '.$bulan.' '.$a[0];
//batas tanggal
$result = $koneksi->query("SELECT *,'' as aksi FROM karyawan")->fetch_all(MYSQLI_ASSOC);

//Inisiasi untuk membuat header kolom

//For each row, add the field to the corresponding column

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

$pdf->SetFont('Arial','B',13);
$pdf->Cell(130);
$pdf->Cell(30,10,'DATA KARYAWAN',0,0,'C');
$pdf->Ln();

//table Head
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(10,30,50,50,50,50,40)); //280
$pdf->SetAligns(array('C','C','C','C','C','C','C'));
$pdf->Row(array('No','NIK','Nama','Alamat','Jabatan','Departemen','Keterangan'));

//table content
$x=1;
foreach ($result as $row) 
{
    $nik = $row["nik"];
    $nama = $row["nama"];
    $alamat = $row["alamat"];
    $jabatan = $row["jabatan"];
    $departemen = $row["departemen"];
    $keterangan = $row["keterangan"];

    //Now show the columns
    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','C','L','L','L','L','L'));
    $pdf->Row(array($x,$nik,$nama,$alamat,$jabatan,$departemen,$keterangan));
    $x++;
}

//tanggal
$pdf->SetFont('Arial','',11);
$pdf->Cell(220);
$pdf->Cell(20,8,'Dicetak Tanggal '.$tgl,0,0,'L');

$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(240);
$pdf->Cell(20,8,"(______________________________)",0,0,'C');

$pdf->Output();
?>