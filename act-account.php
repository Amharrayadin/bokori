<?php

include 'connect.php';

if($_GET['act']=='update'){
    $nikdefault = $_GET['nik'];
    $nik        = $_POST['nik'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $nohp       = $_POST['nohp'];
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $gambarLama = $_POST['gambar'];


    if( $_FILES["gambar"]["error"] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sqlupdate = "UPDATE `tb_user` SET 
                 `nik`      = '$nik', 
                 `nama`     = '$nama', 
                 `alamat`   = '$alamat',
                 `nohp`     = '$nohp', 
                 `email`    = '$email', 
                 `username` = '$username',
                 `gambar`   = '$gambar' 
                 WHERE `tb_user`.`nik` = $nikdefault";
    $query = mysqli_query($connect, $sqlupdate);
    
    if($query){
      header("Location:account.php?pesan=Data Berhasil Diperbarui&alert=alert-success");
    }else{
      header("Location:account.php?pesan=Data Gagal Diperbarui&alert=alert-danger");
    }
} 
function upload() {

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {    // pesan error 4 -> tidak ada gambar diupload
        echo "<script>
                alert('Gambar belum diupload!');
                window.location='account.php';
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ["jpeg", "jpg", "png"];
    $ekstensiGambar = explode(".", $namaFile);   // explode -> memecah string menjadi array
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {    // mengecek apakah ada string didalam array
        echo "<script>
                alert('Silahkan upload gambar yang valid!');
                window.location='account.php';
              </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if( $ukuranFile > 1024000 ) { // 1024000 byte (1 MB)
        echo "<script>
                alert('Gambar melebihi 1 MB!');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'assets/img/profile/' . $namaFileBaru);

    return $namaFileBaru;
}

if($_GET['act']=='delete'){
    
    $nik = $_GET['nik'];

    $sqlget="SELECT gambar FROM tb_user WHERE nik='$nik'";
    $queryget= mysqli_query($connect,$sqlget);

    if($data['gambar']!=""){
        unlink("assets/img/profile/".$data['gambar']);
      }

    $sqldelete = "DELETE FROM tb_user WHERE nik='$nik'";
    $query = mysqli_query($connect,$sqldelete);

    if($query){
      session_start();
      if(session_destroy()) 
      {
        header("Location:login.php?pesan=Akun Berhasil Dihapus&alert=alert-success");
      }
      }else{
        header("Location:account.php?pesan=Data Gagal Dihapus&alert=alert-danger");
      }
}

if($_GET['act']=='update_public'){
  $nikdefault = $_GET['nik'];
  $nik        = $_POST['nik'];
  $nama       = $_POST['nama'];
  $alamat     = $_POST['alamat'];
  $nohp       = $_POST['nohp'];
  $email      = $_POST['email'];
  $username   = $_POST['username'];
  $gambarLama = $_POST['gambar'];


  if( $_FILES["gambar"]["error"] === 4 ) {
      $gambar = $gambarLama;
  } else {
      $gambar = upload();
  }

  $sqlupdate = "UPDATE `tb_user` SET 
               `nik`      = '$nik', 
               `nama`     = '$nama', 
               `alamat`   = '$alamat',
               `nohp`     = '$nohp', 
               `email`    = '$email', 
               `username` = '$username',
               `gambar`   = '$gambar' 
               WHERE `tb_user`.`nik` = $nikdefault";
  $query = mysqli_query($connect, $sqlupdate);
  
  if($query){
    header("Location:profil.php?pesan=Data Berhasil Diperbarui&alert=alert-success");
  }else{
    header("Location:profil.php?pesan=Data Gagal Diperbarui&alert=alert-danger");
  }
} 

if($_GET['act']=='delete_public'){

  $nik = $_GET['nik'];

  $sqlget="SELECT gambar FROM tb_user WHERE nik='$nik'";
  $queryget= mysqli_query($connect,$sqlget);

  if($data['gambar']!=""){
      unlink("assets/img/profile/".$data['gambar']);
    }

  $sqldelete = "DELETE FROM tb_user WHERE nik='$nik'";
  $query = mysqli_query($connect,$sqldelete);

  if($query){
      header("Location:login.php?pesan=Akun Berhasil Dihapus&alert=alert-success");
    }else{
      header("Location:profil.php?pesan=Data Gagal Dihapus&alert=alert-danger");
    }
}
?>