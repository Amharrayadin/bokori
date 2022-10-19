<?php
    include 'connect.php';

    if($_GET['act']=='create'){
        $nik_papalimbang = $_POST['nik_papalimbang'];
        $nama_papalimbang = $_POST['nama_papalimbang'];
        $alamat_papalimbang = $_POST['alamat_papalimbang'];
        $nohp_papalimbang = $_POST['nohp_papalimbang'];
        
        $sqlinsert = "INSERT INTO `tb_papalimbang` (`nik_papalimbang`, `nama_papalimbang`, `alamat_papalimbang`, `nohp_papalimbang`) 
        VALUES ('$nik_papalimbang', '$nama_papalimbang', '$alamat_papalimbang', '$nohp_papalimbang')";
        $query = mysqli_query($connect, $sqlinsert);
        
        if($query){
          header("Location:tabel-papalimbang.php?pesan=Data Berhasil Ditambahkan&alert=alert-success");
        }else{
            header("Location:tabel-papalimbang.php?pesan=Data Gagal Ditambahkan&alert=alert-danger");
        }
    }

    if($_GET['act']=='delete'){
        $nik_papalimbang = $_GET['nik_papalimbang'];
        $sqlDelete = "DELETE FROM tb_papalimbang WHERE nik_papalimbang='$nik_papalimbang'";
        $query=mysqli_query($connect, $sqlDelete);

        if($query){
          header("Location:tabel-papalimbang.php?pesan=Data Berhasil Dihapus&alert=alert-success");
        }else{
            header("Location:tabel-papalimbang.php?pesan=Data Gagal Dihapus&alert=alert-danger");
        }
    }
                        
    if($_GET['act']=='update'){
        $nik_papalimbangdefault = $_GET['nik_papalimbang'];
        $nik_papalimbang = $_POST['nik_papalimbang'];
        $nama_papalimbang = $_POST['nama_papalimbang'];
        $alamat_papalimbang = $_POST['alamat_papalimbang'];
        $nohp_papalimbang = $_POST['nohp_papalimbang'];
        
        $sqlupdate = "UPDATE `tb_papalimbang` SET 
                     `nik_papalimbang` = '$nik_papalimbang',
                     `nama_papalimbang` = '$nama_papalimbang',
                     `alamat_papalimbang` = '$alamat_papalimbang',
                     `nohp_papalimbang` = '$nohp_papalimbang' 
                     WHERE `tb_papalimbang`.`nik_papalimbang` = '$nik_papalimbangdefault'";
        $query = mysqli_query($connect, $sqlupdate);
        
        if($query){
          header("Location:tabel-papalimbang.php?pesan=Data Berhasil Diedit&alert=alert-success");
        }else{
            header("Location:tabel-papalimbang.php?pesan=Data Gagal Diedit&alert=alert-danger");
        }
    }                 
                                                
?>