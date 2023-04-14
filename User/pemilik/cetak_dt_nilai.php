<?php
include '../koneksi.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Laporan Nilai',0,'L');
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
$pdf->Cell(25.5,0.7,"Nilai",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Dicetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5, 0.8, 'Peserta', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Kursus', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nilai', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$querynilai = mysql_query ("SELECT kd_nilai, nilai.kd_peserta, nilai.kd_kursus, nilai, peserta.kd_peserta, peserta.nm_peserta, kursus.kd_kursus, kursus.nm_kursus FROM nilai
        INNER JOIN peserta ON nilai.kd_peserta=peserta.kd_peserta
        INNER JOIN kursus ON nilai.kd_kursus=kursus.kd_kursus");
if($querynilai == false){
  die ("Terjadi Kesalahan : ". mysql_error());
}
while ($nilai = mysql_fetch_array ($querynilai, MYSQL_ASSOC)){
	$pdf->Cell(5, 0.8, $nilai['nm_peserta'] , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $nilai['nm_kursus'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $nilai['nilai'], 1, 1,'C');
}

$pdf->Output("cetak_Nilai.pdf","I");

?>
