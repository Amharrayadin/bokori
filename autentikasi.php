<?php

include 'connect.php';
if($_GET['act']=='login')
{             
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $level      = $_POST['level'];
                    
    $query = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$username'");
    $data = mysqli_fetch_array($query);
    if(mysqli_num_rows($query) == 0)
    {
        header("Location:login.php?pesan=Username Salah&alert=alert-danger");
    }
    else
    {   if (password_verify($password,$data['password'])) {
        session_start();
        $_SESSION['username']=$data['username'];
        $_SESSION['nik']=$data['nik'];
        $_SESSION['level'] = $data['level'];
        
        if($data['level'] == "Public" && $level=="1")
        { 
            header("Location: index.php");
        }
        else if($data['level'] =="Admin" && $level=="2")
        {
            header("Location: dashboard.php");
        }
        else
        {
            header("Location:login.php?pesan=Login Gagal&alert=alert-danger");
        }
        }else{
            header("Location:login.php?pesan=Password Salah&alert=alert-danger");
        }
    }
}

if($_GET['act']=='register'){
    $nik        = $_POST['nik'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $nohp       = $_POST['nohp'];
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $level      = "Public";

    $cek = "SELECT nik FROM tb_user WHERE nik='$nik'";
    $sqlcek = mysqli_query($connect, $cek);
    $cek2 = "SELECT username FROM tb_user WHERE username='$username'";
    $sqlcek2 = mysqli_query($connect, $cek2);
    if(mysqli_num_rows($sqlcek)!=0){
        header("Location:register.php?pesan=NIK Telah Terdaftar&alert=alert-danger"); 
    }else if(mysqli_num_rows($sqlcek2)!=0){
        header("Location:register.php?pesan=Username Tidak Tersedia&alert=alert-danger"); 
    }else{
        $sqlinsert = "INSERT INTO `tb_user` 
                    (`nik`, `nama`, `alamat`, `nohp`, `email`, `username`, `password`, `level`) 
                    VALUES ('$nik', '$nama', '$alamat', '$nohp', '$email', '$username', '$password', '$level')";
        $query = mysqli_query($connect,$sqlinsert);
        if($query){
            header("Location:login.php?pesan=Register Sukses&alert=alert-success");
        }else{
            header("Location:register.php?pesan=Register Gagal&alert=alert-danger");
        }
    }
}

if($_GET['act']=='register-admin'){
    $nik        = $_POST['nik'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $nohp       = $_POST['nohp'];
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $level      = "Admin";
    
    $cek = "SELECT nik FROM tb_user WHERE nik='$nik'";
    $sqlcek = mysqli_query($connect, $cek);
    $cek2 = "SELECT username FROM tb_user WHERE username='$username'";
    $sqlcek2 = mysqli_query($connect, $cek2);
    if(mysqli_num_rows($sqlcek)!=0){
        header("Location:register-admin.php?pesan=NIK Telah Terdaftar&alert=alert-danger"); 
    }else if(mysqli_num_rows($sqlcek2)!=0){
        header("Location:register-admin.php?pesan=Username Tidak Tersedia&alert=alert-danger"); 
    }else{
        $sqlinsert = "INSERT INTO `tb_user` 
                    (`nik`, `nama`, `alamat`, `nohp`, `email`, `username`, `password`, `level`) 
                     VALUES ('$nik', '$nama', '$alamat', '$nohp', '$email', '$username', '$password', '$level')";
        $query = mysqli_query($connect,$sqlinsert);
        if($query){
            header("Location:login.php?pesan=Register Sukses&alert=alert-success");
        }else{
            header("Location:register-admin.php?pesan=Register Gagal&alert=alert-danger");
        }
    }
}
            
?>