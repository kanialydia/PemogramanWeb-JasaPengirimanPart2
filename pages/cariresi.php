<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Resi</title>

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
		
	<link href="s3-slider.css" media="screen" rel="stylesheet" type="text/css">
  <link href="demo/page.css" media="screen" rel="stylesheet" type="text/css">

		
    </head>
    <body>
		<div id="container">
        <div id="wrapper">
 <!-- Navigation -->
 				<!-- /.row -->
			<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
            </div>
				<div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                                <!-- Nav tabs -->

								<nav class="navbar navbar-expand-lg navbar-dark bg-danger navbar-fixed-top" role="navigation">
							
										<a class="navbar-brand" href="index-1.php"><i class="fa fa-truck fa-fw"></i>Express</a>
									
									
                                <ul class="nav navbar-nav mr-auto navbar-right navbar-top-links">
									
									
									<li class="active">   
										<a href="perusahaan.php">Perusahaan</a>
									</li>
								
									<li>    
										<a href="produklayanan.php">Produk &amp; Layanan</a>
									</li>
								 
									<li>    
										<a href="solusibisnis.php">Solusi Bisnis</a>
									</li>
						  
									<li>    
										<a href="karir.php">Karir</a>
									</li>
							  
									<li>    
										<a href="kontak.php">Hubungi Kami</a>
									</li>
								
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-user fa-fw"></i> Login <b class="caret"></b>
										</a>
										<ul class="dropdown-menu dropdown-user">
											<li class="divider"></li>
											<li><a href="login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a>
											</li>
										</ul>
									</li>

								</ul>
								</nav>

								<div class="col-lg-12">
								<div id="slider">
								  <div class="slide first">
									<img src="logo/k2.png"  />
									<span> <b>Tugas Pemograman WEB 2018</b><br/>Express adalah jasa pengriman barang</span>
								  </div>
								  <div class="slide">
									<img src="logo/k1.png"/>
									</div>
								  <div class="slide">
									<img src="logo/k3.png"/>
									</div>
								  <div class="slide">
									<img src="logo/k1.png"/>
									</div>
								</div>
								</div>
								

                <!-- /.row -->
                <div class="row">
				<div class="col-lg-12">
				<br>
                    <div class="col-lg-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                Lacak Kiriman
                            </div>
							<form action="cariresi.php" method="post">
                            <div class="panel-body">
                                <form action="cariresi.php" method="post">
											<fieldset>
											 <div class="col-lg-8">
												<div class="form-group">
													<input class="form-control" id="resi"  for="resi" 
													placeholder="Masukkan Resi" name="resi" type="text" required autofocus
													value="<?php if (isset($_POST['resi'])) echo $_POST['resi']; ?>">
												</div>
												</div>
												 <div class="col-lg-4">
												<!-- Change this to a button or input when using this as a form -->
												<div class="form-group">
													<input id="submit" class="btn btn-outline btn-warning " 
													type="submit" name="login" value="TRACKING">
												</div>
												</div>
											</fieldset>
								</form>
							</div>
							</form>
                        </div>
                    </div>
					<div class="col-lg-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                Cek Ongkos Kirim
                            </div>
							<form action="ongkir.php" method="post">
                            <div class="panel-body">
                                <form action="ongkir.php" method="post">
												 <div class="col-md-8 col-md-offset-2">
												<!-- Change this to a button or input when using this as a form -->
												<div class="form-group">
													<input id="submit" class="btn btn-outline btn-warning  btn-block " 
													type="submit" name="submit" value="CHECK">
												</div>
												</div>
								</form>
							</div>
							</form>
                        </div>
                    </div>
					 <div class="col-lg-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                Paket
							</div>
					<?php
					require('mysqli_connect.php');
					echo '<p class="text-center"> Jika form kosong maka resi yang anda cari belum terdaftar atau salah!';
					
					$resi=$_POST['resi'];
					$resi=mysqli_real_escape_string($dbkoneksi, $resi);
					
					$q= "SELECT resi, status, sender, senderadd, tglkirim, receiver, receiveradd, tglterima FROM paket WHERE resi='$resi'";
					$hasil=@mysqli_query ($dbkoneksi, $q);
					
					if($hasil){
						echo'<table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Resi</th>
												<th>Status</th>
												<th>Pengirim</th>
												<th>Kota Asal</th>
                                                <th>Tanggal Kirim</th>
												<th>Penerima</th>
												<th>Kota Tujuan</th>
												<th>Tanggal Diterima</th>
                                            </tr>
                                        </thead>
										<tbody>';
										//tampilkan semua user
                                            while($baris=mysqli_fetch_array($hasil, MYSQLI_ASSOC)){
                                        echo'<tr>
                                                <td>' . $baris['resi'] . '</td>
                                                <td>' . $baris['status'] . '</td>
												<td>' . $baris['sender'] . '</td>
                                                <td>' . $baris['senderadd'] . '</td>
												<td>' . $baris['tglkirim'] . '</td>
												<td>' . $baris['receiver'] . '</td>
												<td>' . $baris['receiveradd'] . '</td>
												<td>' . $baris['tglterima'] . '</td>
                                            </tr>
                                        </tbody>';}
                                    echo '</table>';
									mysqli_free_result($hasil);
								
								}else{
									echo '<p class="error">Terjadi Kesalahan.! </p>';
									echo '<p>' . mysqli_error($dbkoneksi) . '<br><br>Query:' . $q . '</p>'; 
								}
								$q="SELECT COUNT (packetID) FROM paket";
								$hasil=@mysqli_query($dbkoneksi, $q);
								$baris=@mysqli_fetch_array($hasil, MYSQLI_NUM);
								$anggota=$baris[0];
								mysqli_close($dbkoneksi);
					
					?>
                    <!-- /.col-lg-4 -->
                    </div>
                    </div>
				</div>
				</div>
							<div class="panel-footer">
                                <?php include('footer.php');?>
							</div>
                        
                            <!-- /.panel-body -->
                    </div>
                        <!-- /.panel -->
                </div>
					
			</div>
		</div>
	</div>
	
	 <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>
		
		<script src="demo/jquery.js" type="text/javascript"></script>
		<script src="s3-slider.js" type="text/javascript"></script>
		  <script>
			jQuery(function($){
			  $('#slider').s3Slider({timeout:3000, fadeTime:1000});
			});
		  </script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
