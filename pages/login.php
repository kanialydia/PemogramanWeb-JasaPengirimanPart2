<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Login</title>
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
	

	
	<body>
		<div id="container">
		 <div id="wrapper">
		<div class="wrapper afterclear">
 <!-- Navigation -->
 
            
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
            </div>
				<div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
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

                        </div>
                            <!-- /.panel-body -->
                    </div>
                        <!-- /.panel -->
                </div>
				<?php
			//Bagian ini berfungsi untuk memproses submisi form login!
			//memeriksa apakah form login sudah terisi:
			if (isset($_POST['login'])){
				include "koneksi.php";

				$cek_data=mysqli_query($conn, "SELECT * FROM pengguna WHERE
				email ='".$_POST['email']."' AND password = '".$_POST['password']."' ");
				$data = mysqli_fetch_array($cek_data);
				$level = $data['level'];
				if (mysqli_num_rows($cek_data) > 0){
					if($level == 'admin'){
						header("Location:index-admin.php");
					}elseif($level == 'user'){
						header("Location:index-user.php");
					}elseif($level == 'kurir'){
						header('Location:index-kurir.php');
					}
				}else{
					echo '<script type="text/javascript">alert("Email atau password tidak boleh kosong");</script> ';
				}
			}
			?>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						
							<div class="login-panel panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Please Sign In</h3>
							</div>
							
								<form action="login.php" method="post">
									<div class="panel-body">
										<form role="form">
											<fieldset>
												<div class="form-group">
													<input class="form-control" id="email"  for="email" 
													placeholder="Email" name="email" type="email" required autofocus
													value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
												</div>
												<div class="form-group ">
													<input class="form-control" id="password" for="password" 
													placeholder="Password" name="password" type="password" required autofocus
													value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
												</div>
												<div class="checkbox">
													<label>
														<input name="remember" type="checkbox" value="Remember Me">Remember Me
													</label>
												</div>
												<!-- Change this to a button or input when using this as a form -->
												<div>
													<input id="submit" class="btn btn-outline btn-success btn-block" 
													type="submit" name="login" value="Login">
													<a href="registrasi-user.php" ><h5>Registrasi</h5></a>
													<a href="index-1.php" ><h5>Beranda</h5></a>
												</div>
											</fieldset>
										</form>
								</form>
								</div>
							</div>
						
					</div>
				</div>
		</div>
		<div class="panel-footer">
            <?php include('footer.php');?>
		</div>
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
