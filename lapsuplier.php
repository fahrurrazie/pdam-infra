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
    $result = $koneksi->query("SELECT *,'' as aksi FROM suplier where ".$jenis)->fetch_all(MYSQLI_ASSOC); 
  }
  else
  {
    $result = $koneksi->query("SELECT *,'' as aksi FROM suplier")->fetch_all(MYSQLI_ASSOC); 
  }

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
$pdf->Cell(30,10,'DATA SUPLIER',0,0,'C');
$pdf->Ln();

//table Head
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(10,30,30,30,30,30,30));
$pdf->SetAligns(array('C','C','C','C','C','C','C'));
$pdf->Row(array('No','Nama','Alamat','Kota','Telpon','Email','Jenis'));

//table content
$x=1;
foreach ($result as $row) 
{
    $nama = $row["nama"];
    $alamat = $row["alamat"];
    $kota = $row["kota"];
    $telp = $row["telp"];
    $email = $row["email"];
    $jenis = $row["jenis"];

    //Now show the columns
    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','L','L','L','C','L','L'));
    $pdf->Row(array($x,$nama,$alamat,$kota,$telp,$email,$jenis));
    $x++;
}


$pdf->SetFont('Arial','',11);
$pdf->Cell(140);
$pdf->Cell(20,8,'Banjarmasin,  '.$tgl,0,0,'L');


$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(150);
$pdf->Cell(20,8,"(______________________________)",0,0,'C');

$pdf->Output();
?>