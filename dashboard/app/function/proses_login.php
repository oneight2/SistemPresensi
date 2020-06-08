<?php

include_once("../function/config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip='$username'");
$admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");

if (mysqli_num_rows($pegawai) == 1 or mysqli_num_rows($admin) == 1) {
    session_start();
    //variable tahun ajaran
 
    if (mysqli_num_rows($pegawai) == 1) {
        $rows = mysqli_fetch_assoc($pegawai);

        if ($password == $rows['password']) {
           

            $_SESSION['id_user'] = $rows['nip'];
            $_SESSION['nama_user'] = $rows['nama_pgw'];
            $_SESSION['status'] = 'pegawai';
            header("Location: " . BASE_URL . "dashboard");
        }
   
    } elseif (mysqli_num_rows($admin) == 1) {
        $rows = mysqli_fetch_assoc($admin);

        if ($password == $rows['password']) {
            $_SESSION['id_user'] = $rows['id'];
            $_SESSION['nama_user'] = $rows['username'];
            $_SESSION['status'] = 'admin';
            header("Location: " . BASE_URL . "dashboard");
        }
    }
    
}

header("Location: " . BASE_URL . "login/error");
