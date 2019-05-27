<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
    <head>
      <title>Selamat datang admin</title>
      <link href="style.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <div id="profile">
      <b id="welcome">Selamat Datang admin : <i><?php echo $login_session; ?></i></b></p>
      <b>Nama : <?php echo $nama_session; ?></b></p>
      <b>phone : <?php echo $nomor_session; ?></b></p>
      <b>jenis Kelamin : <?php echo $jk_session; ?></b></p>
      <b>Hobi : <?php echo $hobi_session; ?></b></p> 
      <b id="logout"><a href="logout.php">Log Out</a></b>
    </div>
</body>
</html>