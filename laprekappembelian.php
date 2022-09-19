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
$result = $koneksi->query("SELECT a.*,b.nama as nama_suplier 
                          FROM pembelian a 
                          left join suplier b on a.id_suplier=b.id
                          where a.tanggal like '$bulan%' 
                          order by a.tanggal")->fetch_all(MYSQLI_ASSOC);


$result2 = $koneksi->query("SELECT SUM(total_harga) as total_harga
                          FROM pembelian a 
                          left join suplier b on a.id_suplier=b.id
                          where a.tanggal like '$bulan%'
                          order by a.tanggal")
                        ->fetch_all(MYSQLI_ASSOC);



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

//nama bulan
$array_bulan=explode("-", $bulan);
if (count($array_bulan)>1){
   $nama_bulan='Bulan '.BulanIndo($array_bulan[1]).' '.$array_bulan[0]; 
}else{
    $nama_bulan='Tahun '.$bulan;
}
//

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Rekap Pembelian '.$nama_bulan,0,0,'C');
$pdf->Ln();

//table Head
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(10,30,50,40,20,40));
$pdf->SetAligns(array('C','C','C','C','C','C'));
$pdf->Row(array('No','Tanggal','Nota','Suplier','Jumlah','Total Harga'));

//table content
$x=1;
foreach ($result as $row) 
{
    $tanggal = $row["tanggal"];
    $nota = $row["nota"];
    $nama_suplier = $row["nama_suplier"];
    $qty = $row["qty"];
    $total_harga = "Rp. ".number_format($row["total_harga"]);

    //Now show the columns
    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','C','L','L','C','R'));
    $pdf->Row(array($x,$tanggal,$nota,$nama_suplier,$qty,$total_harga));
    $x++;
}

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(40));
$pdf->Cell(150);
$pdf->SetAligns(array('C'));
$pdf->Row(array('Total Pembelian'));

foreach ($result2 as $row2)

 {
 $total_harga = $row2["total_harga"];  

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(150);
    $pdf->SetAligns(array('C'));
    $pdf->Row(array('Rp. '.$total_harga));
    $x++;
}



$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->Cell(140);
$pdf->Cell(20,8,'Banjarmasin '.$tgl,0,0,'L');


$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(150);
$pdf->Cell(20,8,"(________________________)",0,0,'C');

$pdf->Output();
?>