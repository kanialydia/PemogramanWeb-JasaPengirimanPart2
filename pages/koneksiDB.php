<?php

$host = “localhost”;

$username = “root”;

$password = “”;

$database = “kfk_courier”;

$koneksi = mysql_connect($host, $username, $password);

mysql_select_db($database, $koneksi) or die( “MySQL Gagal Koneksi” );

?>