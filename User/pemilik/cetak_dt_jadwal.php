<?php
include '../koneksi.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Laporan Jadwal',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Sistem Informasi Akademik',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Lembaga Kursus',0,'L');
$pdf->SetX(4);
$pdf->SetLineWidth(0.1);
$pdf->Line(1,3.2,28.5,3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Jadwal",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Dicetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5, 0.8, 'Kursus', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Pengajar', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Ruangan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Hari', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jam', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$queryjadwal = mysql_query ("SELECT kd_jadwal, kursus.nm_kursus, pengajar.nm_pengajar, ruangan.nm_ruangan, hari, jam FROM jadwal INNER JOIN kursus ON kursus.kd_kursus=jadwal.kd_kursus INNER JOIN pengajar ON pengajar.kd_pengajar=jadwal.kd_pengajar INNER JOIN ruangan ON ruangan.kd_ruangan=jadwal.kd_ruangan ORDER BY hari DESC");
if($queryjadwal == false){
  die ("Terjadi Kesalahan : ". mysql_error());
}
while ($jadwal = mysql_fetch_array ($queryjadwal, MYSQL_ASSOC)){
	$pdf->Cell(5, 0.8, $jadwal['nm_kursus'] , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $jadwal['nm_pengajar'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $jadwal['nm_ruangan'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $jadwal['hari'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $jadwal['jam'], 1, 1,'C');
}

$pdf->Output("cetak_jadwal.pdf","I");

?>
