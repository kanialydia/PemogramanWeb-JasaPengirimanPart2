

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
                    
                    <!-- /.col-lg-12 -->
                </div> 
				<?php
				if ((isset($_GET['packetID'])) && (is_numeric($_GET['packetID']))){
					$id = $_GET['packetID'];
				}elseif ((isset($_POST['packetID'])) && (is_numeric($_POST['packetID']))){
					$id = $_POST['packetID'];
				}else {
					echo '<p class="error"> Halaman ini Error</p>';
					exit();
				}
				require('mysqli_connect.php');
				
				//apakah form telah disubmit?
			if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
					$arrayError = array();
				//
				if (empty($_POST['sender'])){
					$arrayError[] = '<script type="text/javascript">alert("Nama Pengirim tidak boleh kosong");</script>';
				}else{
					$fn = mysqli_real_escape_string($dbkoneksi, trim($_POST['sender']));
				}
				//
				if (empty($_POST['receiver'])){
					$arrayError[] = '<script type="text/javascript">alert("Nama penerima tidak boleh kosong");</script>';
				}else{
					$r = mysqli_real_escape_string($dbkoneksi, trim($_POST['receiver']));
				}
				//
				if (empty($_POST['senderadd'])){
					$arrayError[] = '<script type="text/javascript">alert("Kota Asal tidak boleh kosong");</script>';
				}else{
					$asal = mysqli_real_escape_string($dbkoneksi, trim($_POST['senderadd']));
				}
				//
				if (empty($_POST['receiveradd'])){
					$arrayError[] = '<script type="text/javascript">alert("Kota Tujuan tidak boleh kosong");</script>';
				}else{
					$tujuan = mysqli_real_escape_string($dbkoneksi, trim($_POST['receiveradd']));
				}
				//
				if (empty($_POST['alamatsender'])){
					$arrayError[] = '<script type="text/javascript">alert("Alamat pengirim tidak boleh kosong");</script>';
				}else{
					$as = mysqli_real_escape_string($dbkoneksi, trim($_POST['alamatsender']));
				}
				//
				if (empty($_POST['alamatreceiver'])){
					$arrayError[] = '<script type="text/javascript">alert("Alamat penerima tidak boleh kosong");</script>';
				}else{
					$tj = mysqli_real_escape_string($dbkoneksi, trim($_POST['alamatreceiver']));
				}
				//
				if (empty($_POST['sendernumber'])){
					$arrayError[] = '<script type="text/javascript">alert("No.Pengirim tidak boleh kosong");</script>';
				}else{
					$sn = mysqli_real_escape_string($dbkoneksi, trim($_POST['sendernumber']));
				}
				//
				if (empty($_POST['receivernumber'])){
					$arrayError[] = '<script type="text/javascript">alert("No.penerima tidak boleh kosong");</script>';
				}else{
					$rn = mysqli_real_escape_string($dbkoneksi, trim($_POST['receivernumber']));
				}
				//
				if (empty($arrayError)){
					$q="UPDATE paket SET sender='$fn',senderadd='$asal',alamatsender='$as', sendernumber='$sn', 
					receiver='$r', receiveradd='$tujuan', alamatreceiver='$tj', receivernumber='$rn' WHERE packetID = $id LIMIT 1";
					$hasil = @mysqli_query($dbkoneksi, $q);
					
					if (mysqli_affected_rows($dbkoneksi) == 1){
						echo '<h3>  Berhasil diedit.</h3>';
					}else{
						echo '<script type="text/javascript">alert("Batal diedit");</script>';
						
					}
				}else{
					echo '<script type="text/javascript">alert("Telah Terdaftar");</script>';
				}
			}
				
				//menyeleksi rekaman
				$q = "SELECT sender,senderadd, alamatsender, sendernumber,receiver, receiveradd, alamatreceiver, receivernumber FROM paket WHERE packetID =$id";
				$hasil = @mysqli_query ($dbkoneksi, $q);
				
				
				if(mysqli_num_rows ($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					
					
					//form edit
					echo '
						<div class="col-lg-12">
						<div class="panel panel-danger">
                            <div class="panel-heading">
                                Edit Paket
                            </div>
						<form action="editpaket.php" method="post" role="form">
						<fieldset>
						<div class="col-lg-6">

						<div class="form-group">
                            <label>Nama Pengirim</label>
                            <input class="form-control" name="sender" type="text"  value="' . $baris[0] . '">
                        </div>
						
						<div class="form-group">
                            <label>Kota Asal</label>
							<select class="form-control" name="senderadd" type="text">
							<option value="' . $baris[1] . '">' . $baris[1] . '</option>
							<option value="Bandung">Bandung</option>
							<option value="Bali">Bali</option>
							<option value="Jakarta">Jakarta</option>
							<option value="Medan">Medan</option>
							<option value="Surabaya">Surabaya</option>
                            
                        </select>
						</div>
						
						<div class="form-group">
                            <label>Alamat Pengirim</label>
                            <input class="form-control" name="alamatsender" type="text"  value="' . $baris[2] . '">
                        </div>
						
						<div class="form-group">
                            <label>No. Telepon Pengirim</label>
                            <input class="form-control" name="sendernumber" type="number"  value="' . $baris[3] . '">
                        </div>
						</div>
						<div class="col-lg-6">
						
						<div class="form-group">
                            <label>Nama Penenerima</label>
                            <input class="form-control" name="receiver" type="text"  value="' . $baris[4] . '">
                        </div>
						
						<div class="form-group">
                            <label>Kota Tujuan</label>
							<select class="form-control" name="receiveradd" type="text">
							<option value="' . $baris[5] . '">' . $baris[5] . '</option>
							<option value="Bandung">Bandung</option>
							<option value="Bali">Bali</option>
							<option value="Jakarta">Jakarta</option>
							<option value="Medan">Medan</option>
							<option value="Surabaya">Surabaya</option>
                            
                        </select>
						</div>
						
						<div class="form-group">
                            <label>Alamat Pengirim</label>
                            <input class="form-control" name="alamatreceiver" type="text"  value="' . $baris[6] . '">
                        </div>
						
						<div class="form-group">
                            <label>No. Telepon Pengirim</label>
                            <input class="form-control" name="receivernumber" type="number"  value="' . $baris[7] . '">
                        </div>
						</div>
						<div class="col-md-4 col-md-offset-4">
						<br><p><input id="submit" class="btn btn-outline btn-danger btn-block" 
						type="submit" name="submit" value="Update Profile"></p>
						<br><input type="hidden" name="packetID" value="' . $id . '"/>
						<div class="col-lg-6">
						</fieldset>
						</form>
						</div>
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
