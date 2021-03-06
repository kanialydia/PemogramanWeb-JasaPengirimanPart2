<!DOCTYPE html>
<html lang="en">
    <head>
		<title>Halaman Registrasi</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

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
	<?php include("header-login-regis.php");?>
	
				
	<body>
		<div id="container">
		
<?php
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					//kondisi apakah telah memasukkan username
					
					
					//apakah nama telah dimasukkan
					if(empty($_POST['name'])){
						$arrayError[]='<script type="text/javascript">alert("Masukkan nama anda");</script> ';
					}
					else{$ln = trim($_POST['name']);
					}
					
					if(empty($_POST['jk'])){
						$arrayError[]='<script type="text/javascript">alert("masukkan jenis kelamin anda");</script> ';
					}
					else{$jk = trim($_POST['jk']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['email'])){
						$arrayError[]='<script type="text/javascript">alert("Masukkan email anda");</script> ';
					}
					else{$e = trim($_POST['email']);
					}
					//apakah kedua password cocok
					if(!empty($_POST['psword1'])){
						if($_POST['psword1'] != $_POST['psword2']){
							$arrayError[]='<script type="text/javascript">alert("Password yang anda masukkan tidak sama");</script> ';
						}
						else{$p = trim($_POST['psword1']);
						}
					}
					else{$arrayError[]='<script type="text/javascript">alert("password tidak boleh kosong");</script>' ;
					}
					//apakah sudah memasukkan no hp
					if(empty($_POST['phonenumber'])){
						$arrayError[]='<script type="text/javascript">alert("Masukkan no. telepon anda");</script> ';
					}
					else{$pn = trim($_POST['phonenumber']);
					}
					//apakah sudah level
					if(empty($_POST['level'])){
						$arrayError[]='<script type="text/javascript">alert("Masukkan level anda");</script>' ;
					}
					else{$level = trim($_POST['level']);
					}
					//jika sebua data terisi
					if(empty($arrayError)){
						require('mysqli_connect.php');//koneksi ke database.
						//melakukan query
						$q = "INSERT INTO pengguna (userID,name,jk,password,email,phonenumber,regtime,level)
						VALUES('','$ln','$jk','$p','$e','$pn',NOW(),'$level' )";
						$hasil = @mysqli_query ($dbkoneksi, $q);//menjalankan query
						if($hasil){//jika berhasil
							echo '<script type="text/javascript">alert("Berhasil menambahkan Anggota");</script> ';
						
						}
						else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Anda belum terdaftar karena Error sistem");</script> ';
							//Debug:
							echo '<p>'. mysqli_error($dbkoneksi).'<br><br>Query: ' .$q. '</p>';
						}
						mysqli_close($dbkoneksi);//menutup koneksi

						//menyertakan footer dan keluar dari skript:
						include('footer.php');
						exit();
					}
					else{
						foreach ($arrayError as $psn) {//menampilkan error
							echo"<h11>$psn</h11>";
						}
						echo '</p><h2>Silahkan coba lagi.</h2>';
					}
				}
				?>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Masukkan Data</h3>
								</div>
								<form action="registrasi-user.php" method="post">
								<div class="panel-body">
								<form role="form">
		
									<!--menampilkan form pada layar-->
									<fieldset>
										
										<!--Pilihan-->
										<div class="form-group">
											<input class="label" for="level"  autofocus 
											id="level" type="text">
											<select class="form-control" name="level">
											<option value="">- Pilih Level Anggota -</option>
											<option value="user"<?php if (isset($_POST['level']) AND ($_POST['level'] == 'user'))
												echo 'selected="selected"';?>>User</option>
											<option value="kurir"<?php if (isset($_POST['level']) AND ($_POST['level'] == 'kurir'))
												echo 'selected="selected"';?>>Kurir</option>
											</select>
										</div>
								
										<!--nama lengkap-->
										
										<div class="form-group">
											<input class="form-control" for="name"  placeholder="Nama Lengkap"  autofocus 
											id="name" type="text" name="name" 
											value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
										</div>
										
										<div class="form-group">
											<input class="label" for="jk" autofocus 
											id="jk" type="text">
											<select class="form-control" name="jk">
											<option value="">- Jenis Kelamin -</option>
											<option value="Wanita"<?php if (isset($_POST['jk']) AND ($_POST['jk'] == 'Wanita'))
												echo 'selected="selected"';?>>Wanita</option>
											<option value="Pria"<?php if (isset($_POST['jk']) AND ($_POST['jk'] == 'Pria'))
												echo 'selected="selected"';?>>Pria</option>
											</select>
										</div>

										<!--password 1-->
										<div class="form-group">
											<input class="form-control" for="psword1"  placeholder="Password"  autofocus 
											id="psword1" type="password" name="psword1"
											value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>">&nbsp;Masukkan 8 sampai 12 karakter.
										</div>

										<!--password 2-->
										<div class="form-group">
											<input class="form-control" for="psword2"  placeholder="Password Konfirmasi"  autofocus 
											id="psword2" type="password" name="psword2"
											value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>">
										</div>
 
										<!--email-->
										<div class="form-group">
											<input class="form-control" for="email"  placeholder="E-mail"  autofocus 
											id="email" type="email" name="email" 
											value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
										</div>

										<!--no.hp-->
										<div class="form-group">
											<input class="form-control" for="phonenumber"  placeholder="No. Telpon"  autofocus 
											id="phonenumber" type="number" name="phonenumber" 
											value="<?php if (isset($_POST['phonenumber'])) echo $_POST['phonenumber']; ?>">
										</div>

										<!--tombol regis-->
										<div>
											<input id="submit" class="btn btn-outline btn-info btn-block" 
											type="submit" name="submit" value="Registrasi">
											<a href="login.php">Login</a>
											<a href="index-1.php">Beranda</a>
											
										</div>
									</fieldset>
								</form>
								</div>
							
						</div>
					</div>
				</div>
				<div class="panel-footer"><?php include('footer.php');?></div>
			</div>
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