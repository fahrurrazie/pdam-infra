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

$result = $koneksi->query("SELECT *,'' as aksi FROM barang")->fetch_all(MYSQLI_ASSOC);

//Create a new PDF file
$pdf = new PDF_MC_Table('P','mm',array(297,210)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);
$pdf->Cell(10);
$pdf->Image("picture/pdam.png", 10, 10 , 20 , 20);
$pdf->Cell(170);
$pdf->Image("picture/sgs.jpg", 180, 10 , 20 , 20);
$pdf->Ln();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(80);
$pdf->Cell(30,5,'PERUSAHAAN DAERAH AIR MINUM BANDARMASIH',0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(80);
$pdf->Cell(30,5,'Jl. Achmad Yani Km. 2,5 No.12 Kota Pos 30 Banjarmasin 70236',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80);
$pdf->Cell(30,5,'Telp. (0511) 3253617 / 3251690 / 3252541 Fax.(0511) 3253238',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80);
$pdf->Cell(30,5,'Website : www.pdambandarmasih.com e-mail : contact@pdambandarmasih.com',0,0,'C');

$pdf->Line(10, 31, 200, 31);
$pdf->Ln();

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA BARANG',0,0,'C');
$pdf->Ln();

//table Head
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(10,50,40,40,30,20));
$pdf->SetAligns(array('C','C','C','C','C','C'));
$pdf->Row(array('No','Nama','Merk','Tipe','Harga','Stok'));

//table content
$x=1;
foreach ($result as $row) 
{
    $nama = $row["nama"];
    $merk = $row["merk"];
    $tipe = $row["tipe"];
    $harga = "Rp. ".number_format($row["harga"]);
    $stok = $row["stok"];

    //Now show the columns
    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','L','L','L','R','C'));
    $pdf->Row(array($x,$nama,$merk,$tipe,$harga,$stok));
    $x++;
}


$pdf->SetFont('Arial','',11);
$pdf->Cell(140);
$pdf->Cell(20,8,'Banjarmasin, '.$tgl,0,0,'L');


$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(150);
$pdf->Cell(20,8,"(______________________________)",0,0,'C');

$pdf->Output();
?>