

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Halaman Edit</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
	<?php include ("header-admin.php"); ?>
    <body>
	<div id="wrapper">			
        <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Anggota</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div> 
				<?php
				if ((isset($_GET['userID'])) && (is_numeric($_GET['userID']))){
					$id = $_GET['userID'];
				}elseif ((isset($_POST['userID'])) && (is_numeric($_POST['userID']))){
					$id = $_POST['userID'];
				}else {
					echo '<script type="text/javascript">alert("Halaman Error!!");</script> ';
					exit();
				}
				require('mysqli_connect.php');
				
				//apakah form telah disubmit?
			if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
					$arrayError = array();
				//
				if (empty($_POST['name'])){
					$arrayError[] = '<script type="text/javascript">alert("Form Nama tidak boleh kosong");</script> ';
				}else{
					$fn = mysqli_real_escape_string($dbkoneksi, trim($_POST['name']));
				}
				//
				if (empty($_POST['jk'])){
					$arrayError[] = '<script type="text/javascript">alert("Masukkan jenis kelamin anda");</script> ';
				}else{
					$jk = mysqli_real_escape_string($dbkoneksi, trim($_POST['jk']));
				}
				//
				if (empty($_POST['email'])){
					$arrayError[] = '<script type="text/javascript">alert("Email tidak boleh kosong");</script> ';
				}else{
					$e = mysqli_real_escape_string($dbkoneksi, trim($_POST['email']));
				}
				//
				if (empty($_POST['phonenumber'])){
					$arrayError[] = '<script type="text/javascript">alert("No. telpon tidak boleh kosong");</script> ';
				}else{
					$pn = mysqli_real_escape_string($dbkoneksi, trim($_POST['phonenumber']));
				}
				//
				if (empty($arrayError)){
					$q="UPDATE pengguna SET name='$fn',jk='$jk',email='$e', phonenumber='$pn' WHERE userID = $id LIMIT 1";
					$hasil = @mysqli_query($dbkoneksi, $q);
					
					if (mysqli_affected_rows($dbkoneksi) == 1){
						echo '<script type="text/javascript">alert("Berhasil diedit");</script> ';
					}else{
						echo '<script type="text/javascript">alert("Batal Diedit");</script> ';
						echo '<p>' . mysqli_error($dbkoneksi) . '<br />Query: ' . $q . '</p>';
					}
				}else{
					echo '<script type="text/javascript">alert("alamat email telah terdaftar");</script> ';
				}
			}
				
				//menyeleksi rekaman
				$q = "SELECT name, jk, email, phonenumber FROM pengguna WHERE userID =$id";
				$hasil = @mysqli_query ($dbkoneksi, $q);
				
				
				if(mysqli_num_rows ($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					
					
					//form edit
					echo '
						<div class="col-md-4 col-md-offset-4">
						<form action="edit.php" method="post" role="form">
						<fieldset>
						<div class="form-group">
                            <label>Nama Pengirim</label>
                            <input class="form-control" name="name" type="text"  value="' . $baris[0] . '">
                        </div>
						
						<div class="form-group">
                            <label>Jenis Kelamin</label>
							<select class="form-control" name="jk" type="text">
							<option value="' . $baris[1] . '">' . $baris[1] . '</option>
							<option value="Wanita">Wanita</option>
							<option value="Pria">Pria</option>
                            
                        </select>
						</div>
						
						<div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email"  value="' . $baris[2] . '">
                        </div>
						
						<div class="form-group">
                            <label>No. Telepon</label>
                            <input class="form-control" name="phonenumber" type="number"  value="' . $baris[3] . '">
                        </div>
						
						<br><p><input id="submit" class="btn btn-outline btn-danger btn-block" 
						type="submit" name="submit" value="Update Profile"></p>
						<br><input type="hidden" name="userID" value="' . $id . '"/>
						
						</fieldset>
						</form>
						</div>';
				}else{
				echo "Halaman Error";
				}
				mysqli_close($dbkoneksi);
				?>
		</div>
	</div>
	
	
	
	
	
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
