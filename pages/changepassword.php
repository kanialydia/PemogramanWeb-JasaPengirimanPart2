<?php

require_once “koneksiDB.php”;

$passwordlama = $_POST[‘password’];

$passwordbaru = $_POST[‘passwordbaru’];

$konfirmasipassword = $_POST[‘konfirmasipassword’];

$userID = $_POST[‘userID’];

$cekuser = “select * from pengguna where userID = ‘$userID’ and password = ‘$password'”;

$querycekuser = mysql_query($cekuser);

$count =? mysql_num_rows($querycekuser);

if ($count >= 1){

$updatepassword = “update pengguna set password = ‘$passwordbaru’ where userID = ‘$userID'”;

$updatequery = mysql_query($updatepassword);

if($updatequery)

{

“Password telah diganti menjadi $passwordbaru”;

}

}

?>