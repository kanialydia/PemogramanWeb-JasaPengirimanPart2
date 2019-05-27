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

		<style type="text/css">
			p{text-align:center;}
			input.fI-left{float:left;}
			#submit-yes{float:left; margin-left:220px;}
			#submit-no{float:left; margin-left:20px;}
			</style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
	<?php include ("header-kurir.php"); ?>
    <body>
	<div id="wrapper">			
        <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Kirim Paket</h1>
                    </div>
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
					if($_POST['yakin']=='Ya'){
						$q ="UPDATE paket SET status='terkirim',tglterima=NOW() WHERE packetID=$id LIMIT 1";
						$hasil = @mysqli_query ($dbkoneksi, $q);
					
						if (mysqli_affected_rows($dbkoneksi) == 1){
						echo '<script type="text/javascript">alert("Paket telah terkirim");</script> ';
						}else{
						echo '<script type="text/javascript">alert("Error sistem");</script> ';
						echo '<p>' . mysqli_error($dbkoneksi) . '<br />Query: ' . $q . '</p>';
						}
					}else{
					echo '<script type="text/javascript">alert("Paket batal dikirim");</script> ';
					
					}
				}else{
					
					$q = "SELECT CONCAT (resi) FROM paket WHERE packetID=$id";
					$hasil = @mysqli_query ($dbkoneksi, $q);
					
				if(mysqli_num_rows($hasil) == 1){
					$baris = mysqli_fetch_array ($hasil, MYSQLI_NUM);
					echo "<h3> Kirim paket dengan resi: $baris[0]?</h3>";
					
					//form hapus
					echo '<form action="kirim.php" method="post">
						<br><p><input id="submit-yes" class="btn btn-lg btn-primary " 
						type="submit" name="yakin" value="Ya">
						<input id="submit-no" class="btn btn-lg btn-primary btn-danger" 
						type="submit" name="yakin" value="Tidak"></p>
						<br><input type="hidden" name="packetID" value="' . $id . '"/>
						
						
						</form>';
						
				}else{
					echo '<p class="error">Halaman Error</p>';
					echo '<p>&nbsp;</p>';
				}
				}
				
				mysqli_close($dbkoneksi);
				echo '<p>&nbsp;</p>';
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
