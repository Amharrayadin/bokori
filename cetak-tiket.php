<?php
// memanggil library FPDF
require('fpdf181/fpdf.php');
include 'connect.php';

$id_penyeberangan = $_GET['id_penyeberangan'];
$nik = $_GET['nik'];

$sqluser = "SELECT nama, alamat, nohp, email FROM tb_user WHERE nik='$nik'";
$queryuser = mysqli_query($connect,$sqluser);
$user = mysqli_fetch_row($queryuser);

$sqlget = "SELECT tb_penyeberangan.id_penyeberangan,
                    tb_penyeberangan.nik, 
                    tb_penyeberangan.jumlah_penyeberangan, 
                    tb_penyeberangan.total_harga, 
                    tb_penyeberangan.status_penyeberangan, 
                    tb_penyeberangan.admin,
                    tb_penyeberangan.id_stok,
                    tb_stok_tiket.tgl_stok,
                    tb_stok_tiket.jam_stok, 
                    tb_stok_tiket.id_tiket,
                    tb_tiket.nama_tiket,
                    tb_tiket.id_kapal, 
                    tb_kapal.nama_kapal,
                    tb_tiket.harga_tiket,
                    tb_papalimbang.nama_papalimbang
                    FROM tb_penyeberangan INNER JOIN (tb_stok_tiket INNER JOIN (tb_tiket INNER JOIN (tb_kapal INNER JOIN tb_papalimbang ON tb_kapal.nik_papalimbang = tb_papalimbang.nik_papalimbang) ON tb_tiket.id_kapal = tb_kapal.id_kapal) ON tb_stok_tiket.id_stok = tb_tiket.id_tiket) ON tb_penyeberangan.id_stok=tb_stok_tiket.id_stok";
$query = mysqli_query($connect, $sqlget);
$data = mysqli_fetch_row($query);

// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Courier','',10);
$pdf->Cell(200,2,'-----------------------------------------------------------------------------------------',0,1);

$pdf->SetFont('Courier','B',14);
$pdf->Cell(200,5,'PENYEBERANGAN PULAU BOKORI',0,1,'C');
$pdf->SetFontSize(12);
$pdf->Cell(200,5,'TIKET PENYEBERANGAN',0,1,'C');

$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Courier','',10);
$pdf->Cell(2,5,'ID PENYEBERANGAN',0,1);
$pdf->Cell(2,5,'#',0,0);
$pdf->Cell(0,5,$id_penyeberangan,0,1);

$pdf->Cell(7,5,'',0,1);
$pdf->setX(10);
$pdf->Cell(5,5,'NAMA       : ',0,0);
$pdf->setX(40);
$pdf->Cell(10,5,$user[0],0,1);
$pdf->setX(10);
$pdf->Cell(10,5,'ALAMAT     :',0,0);
$pdf->setX(40);
$pdf->Cell(0,5,$user[1],0,1);
$pdf->setX(10);
$pdf->Cell(10,5,'NO TELEPON :',0,0);
$pdf->setX(40);
$pdf->Cell(0,5,$user[2],0,1);
$pdf->setX(10);
$pdf->Cell(10,5,'EMAIL      :',0,0);
$pdf->setX(40);
$pdf->Cell(0,5,$user[3],0,1);
$pdf->setX(10);

$pdf->Cell(7,2,'',0,1);
$pdf->Cell(5,5,'DATA PERJALANAN',0,1);
$pdf->Cell(30,5,'TANGGAL',1,0,'C');
$pdf->Cell(30,5,'JAM' ,1,0,'C');
$pdf->Cell(50,5,'NAMA KAPAL',1,0,'C');
$pdf->Cell(50,5,'NAMA PAPALIMBANG',1,1,'C');

$pdf->Cell(30,5,$data[7],1,0,'C');
$pdf->Cell(30,5,$data[8],1,0,'C');
$pdf->Cell(50,5,$data[12],1,0,'C');
$pdf->Cell(50,5,$data[14],1,1,'C');

$pdf->Cell(7,2,'',0,1);
$pdf->Cell(5,5,'DETAIL PEMBAYARAN',0,1);
$pdf->Cell(60,5,'TIKET',1,0,'C');
$pdf->Cell(30,5,'JUMLAH',1,0,'C');
$pdf->Cell(30,5,'HARGA TIKET' ,1,0,'C');
$pdf->Cell(40,5,'TOTAL',1,1,'C');

$pdf->Cell(60,5,$data[10],1,0,'C');
$pdf->Cell(30,5,$data[2],1,0,'C');
$pdf->Cell(30,5,$data[13] ,1,0,'C');
$pdf->Cell(40,5,$data[3],1,1,'C');

$pdf->SetFont('Courier','B',12);
$pdf->Cell(60,5,'TOTAL BAYAR',1,0,'C');
$pdf->Cell(60,5,'',1,0,'C');
$pdf->Cell(40,5,$data[3],1,1,'C');

$pdf->SetFont('Courier','',8);
$pdf->Cell(5,5,'*Konfirmasi Pemesanan dan Pembayaran Dilakukan Paling Lambat 30 Menit Sebelum Waktu Penyeberangan',0,1);

$pdf->SetFont('Courier','',10);
$pdf->Cell(200,2,'-----------------------------------------------------------------------------------------',0,1);

$pdf->SetTitle('Struk Penyeberangan',[true]);

$pdf->Output();

?>