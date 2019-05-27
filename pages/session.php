<?php
include 'mysqli_connect.php';
// Memulai Session
session_start();
$user_check=$_SESSION['userID'];
$sql2="select * from pengguna where userID='$user_check'";
$ses_sql=mysqli_query($dbkoneksi, $sql2);
// Ambil data user dengan mysql_fetch_assoc
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['email'];
$nama_session =$row['name'];
$nomor_session =$row['phonenumber'];
$jk_session =$row['jk'];
if(!isset($login_session)){
    header('Location: login.php'); // Mengarahkan ke login page
}
?>