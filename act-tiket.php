<?php
    include 'connect.php';

    if($_GET['act']=='create'){
        $id_tiket = $_POST['id_tiket'];
        $nama_tiket = $_POST['nama_tiket'];
        $id_kapal = $_POST['id_kapal'];
        $harga_tiket = $_POST['harga_tiket'];
        
        $sqlinsert = "INSERT INTO `tb_tiket` (`id_tiket`, `nama_tiket`, `harga_tiket`,`id_kapal`) 
        VALUES ('$id_tiket', '$nama_tiket', '$harga_tiket','$id_kapal');";
        $query = mysqli_query($connect, $sqlinsert);
        
        
        if($query){
            header("Location:tabel-tiket.php?pesan=Data Berhasil Ditambahkan&alert=alert-success");
          }else{
              header("Location:tabel-tiket.php?pesan=Data Gagal Ditambahkan&alert=alert-danger");
          }
    }

    if($_GET['act']=='delete'){
        $id_tiket = $_GET['id_tiket'];
        $sqlDelete = "DELETE FROM tb_tiket WHERE id_tiket='$id_tiket'";
        $query=mysqli_query($connect, $sqlDelete);

        if($query){
            header("Location:tabel-tiket.php?pesan=Data Berhasil Dihapus&alert=alert-success");
          }else{
              header("Location:tabel-tiket.php?pesan=Data Gagal Dihapus&alert=alert-danger");
          }
    }
                        
    if($_GET['act']=='update'){
        $id_tiketdefault = $_GET['id_tiket'];
        $id_tiket = $_POST['id_tiket'];
        $nama_tiket = $_POST['nama_tiket'];
        $harga_tiket = $_POST['harga_tiket'];
        $id_kapal = $_POST['id_kapal'];
        
        $sqlupdate = "UPDATE `tb_tiket` SET 
                     `id_tiket` = '$id_tiket', 
                     `nama_tiket` = '$nama_tiket', 
                     `harga_tiket` = '$harga_tiket',
                     `id_kapal` = '$id_kapal' 
                     WHERE `tb_tiket`.`id_tiket` = $id_tiketdefault";
        $query = mysqli_query($connect, $sqlupdate);
        
        if($query){
          header("Location:tabel-tiket.php?pesan=Data Berhasil Diedit&alert=alert-success");
        }else{
            header("Location:tabel-tiket.php?pesan=Data Gagal Diedit&alert=alert-danger");
        }
    }                 
      
    if($_GET['act']=='create-stok'){
        $id_tiket = $_POST['id_tiket'];
        $tgl_stok = $_POST['tgl_stok'];
        $jam_stok = $_POST['harga_tiket'];
        $jumlah_stok = $_POST['jumlah_stok'];
        
        $sqlinsert = "INSERT INTO `tb_stok_tiket` (`id_tiket`, `tgl_stok`, `jam_stok`,`jumlah_stok`) 
        VALUES ('$id_tiket', '$tgl_stok', '$jam_stok','$jumlah_stok');";
        $query = mysqli_query($connect, $sqlinsert);
        
        
        if($query){
            header("Location:tabel-stok-tiket.php?pesan=Data Berhasil Ditambahkan&alert=alert-success");
          }else{
              header("Location:tabel-stok-tiket.php?pesan=Data Gagal Ditambahkan&alert=alert-danger");
          }
    }

    if($_GET['act']=='delete-stok'){
        $id_stok = $_GET['id_stok'];
        $sqlDelete = "DELETE FROM tb_stok_tiket WHERE id_stok='$id_stok'";
        $query=mysqli_query($connect, $sqlDelete);

        if($query){
            header("Location:tabel-stok-tiket.php?pesan=Data Berhasil Dihapus&alert=alert-success");
          }else{
              header("Location:tabel-stok-tiket.php?pesan=Data Gagal Dihapus&alert=alert-danger");
          }
    }
                        
    if($_GET['act']=='edit-stok'){
        $id_stok = $_GET['id_stok'];
        $id_tiket = $_POST['id_tiket'];
        $tgl_stok = $_POST['tgl_stok'];
        $jam_stok = $_POST['jam_stok'];
        $jumlah_stok = $_POST['jumlah_stok'];
        
        $sqlupdate = "UPDATE `tb_stok_tiket` SET 
                     `id_tiket` = '$id_tiket', 
                     `tgl_stok` = '$tgl_stok', 
                     `jam_stok` = '$jam_stok',
                     `jumlah_stok` = '$jumlah_stok' 
                     WHERE `tb_stok_tiket`.`id_stok` = $id_stok";
        $query = mysqli_query($connect, $sqlupdate);
        
        if($query){
          header("Location:tabel-stok-tiket.php?pesan=Data Berhasil Diedit&alert=alert-success");
        }else{
            header("Location:tabel-stok-tiket.php?pesan=Data Gagal Diedit&alert=alert-danger");
        }
    }  
?>