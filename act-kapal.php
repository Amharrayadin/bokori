<?php
    include 'connect.php';

    if($_GET['act']=='create'){
        $id_kapal = $_POST['id_kapal'];
        $nama_kapal = $_POST['nama_kapal'];
        $nik_papalimbang = $_POST['nik_papalimbang'];
        
        $sqlinsert = "INSERT INTO `tb_kapal` (`id_kapal`, `nama_kapal`, `nik_papalimbang`) 
        VALUES ('$id_kapal', '$nama_kapal', '$nik_papalimbang')";
        $query = mysqli_query($connect, $sqlinsert);
        
        if($query){
            header("Location:tabel-kapal.php?pesan=Data Berhasil Ditambahkan&alert=alert-success");
          }else{
              header("Location:tabel-kapal.php?pesan=Data Gagal Ditambahkan&alert=alert-danger");
          }
    }

    if($_GET['act']=='delete'){
        $id_kapal = $_GET['id_kapal'];
        $sqlDelete = "DELETE FROM tb_kapal WHERE id_kapal='$id_kapal'";
        $query=mysqli_query($connect, $sqlDelete);

        if($query){
            header("Location:tabel-kapal.php?pesan=Data Berhasil Dihapus&alert=alert-success");
          }else{
              header("Location:tabel-kapal.php?pesan=Data Gagal Dihapus&alert=alert-danger");
          }
    }
                        
    if($_GET['act']=='update'){
        $id_kapaldefault = $_GET['id_kapal'];
        $id_kapal = $_POST['id_kapal'];
        $nama_kapal = $_POST['nama_kapal'];
        $nik_papalimbang = $_POST['nik_papalimbang'];
        
        $sqlupdate = "UPDATE `tb_kapal` SET 
                     `id_kapal` = '$id_kapal', 
                     `nama_kapal` = '$nama_kapal', 
                     `nik_papalimbang` = '$nik_papalimbang' 
                     WHERE `tb_kapal`.`id_kapal` = $id_kapaldefault";
        $query = mysqli_query($connect, $sqlupdate);
        
        if($query){
          header("Location:tabel-kapal.php?pesan=Data Berhasil Diedit&alert=alert-success");
        }else{
            header("Location:tabel-kapal.php?pesan=Data Gagal Diedit&alert=alert-danger");
        }
    }                 
                                                
?>