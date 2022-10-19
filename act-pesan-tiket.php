<?php
include 'connect.php';
if($_GET['act']=='cancel'){
    $id_penyeberangan = $_GET['id_penyeberangan'];
    $sql = "UPDATE tb_penyeberangan SET status_penyeberangan='2' WHERE id_penyeberangan = '$id_penyeberangan'";
    $query = mysqli_query($connect, $sql);

    $jumlah_penyeberangan = $_GET['jumlah_penyeberangan'];
    $id_stok = $_GET['id_stok'];
    $stok = mysqli_query($connect, "SELECT jumlah_stok FROM tb_stok_tiket WHERE id_stok = '$id_stok'");
    $stk = mysqli_fetch_row($stok);
    $stokbaru = $stk[0] + $jumlah_penyeberangan;

    $updatestok = mysqli_query($connect, "UPDATE tb_stok_tiket SET jumlah_stok='$stokbaru' WHERE id_stok='$id_stok'");

    if ($query){
        header("Location:pesanan.php?pesan=Pesanan Berhasil Dibatalkan&alert=alert-success");
    }
}

if($_GET['act']=='confirm'){
    $id_penyeberangan = $_GET['id_penyeberangan'];
    $admin = $_GET['admin'];
    $sql = "UPDATE tb_penyeberangan SET status_penyeberangan='1', admin='$admin' WHERE id_penyeberangan = '$id_penyeberangan'";
    $query = mysqli_query($connect, $sql);
    if ($query){
        header("Location:tabel-penyeberangan.php?pesan=Penyeberangan Berhasil Dikonfirmasi&alert=alert-success");
    }
}

if($_GET['act']=='delete'){
    $id_penyeberangan = $_GET['id_penyeberangan'];
    $sql = "DELETE FROM tb_penyeberangan WHERE id_penyeberangan = '$id_penyeberangan'";
    $query = mysqli_query($connect, $sql);
    if ($query){
        header("Location:tabel-penyeberangan.php?pesan=Riwayat Pesananan Penyeberangan Berhasil Dihapus&alert=alert-success");
    }
}


if($_GET['act']=='beli'){
    $id_stok = $_GET['id_stok'];
    $jumlah_penyeberangan = $_GET['jumlah_penyeberangan'];
    $nik = $_GET['nik'];
    $total_harga = $_GET['total_harga'];
    $sisa_stok = $_GET['sisa_stok'];
    $jumlah_stok = $_GET['jumlah_stok'];
    if($jumlah_stok>=$jumlah_penyeberangan){
      $sqlpesan = "INSERT INTO tb_penyeberangan (nik, id_stok, jumlah_penyeberangan, total_harga, status_penyeberangan) 
                  VALUES('$nik', '$id_stok', '$jumlah_penyeberangan', '$total_harga','0')";
      $sqlstok = "UPDATE tb_stok_tiket SET jumlah_stok = '$sisa_stok' WHERE id_stok = '$id_stok'";
      $querypesan = mysqli_query($connect,$sqlpesan);
      $querystok = mysqli_query($connect,$sqlstok);
      if($querypesan){
        header("Location:pesanan.php?pesan=Pesanan Berhasil Ditambahkan&alert=alert-success");
      }
    
    }else{
        header("Location:pesan-tiket.php?pesan=Stok Tidak Cukup&alert=alert-danger"); 
    }
            
}

?>