<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Halaman User</title>

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

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="index-admin.php"><i class="fa fa-truck fa-fw"></i> Express</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">  
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Account <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index-user.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
							<li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Cek Ongkir</a>
                            </li>
                            <li>
                                <a href="formkirim.php"><i class="fa fa-edit fa-fw"></i> Kirim Paket</a>
                            </li>
							
							
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
			
			
				<div id="page-wrapper">
          
                <div class="row">
					<div class="col-lg-12">
                        <h1 class="page-header">Form Ubah Password</h1>
                    </div>
				</div>
				<?php
				
			if($_SERVER['REQUEST_METHOD']=='POST'){
				require('mysqli_connect.php');
				$arrayError=array();
			//cek email	
			if (empty($_POST['email'])){
				$arrayError[]='Anda Lupa memasukkan email';
			}else{
				$e=mysqli_real_escape_string($dbkoneksi, trim($_POST['email']));
			}
			
			//memeriksa password
			if (empty($_POST['password'])){
				$arrayError[]='Anda Lupa memasukkan password';
			}else{
				$p=mysqli_real_escape_string($dbkoneksi, trim($_POST['password']));
			}
			
			//cek password baru
			if (!empty($_POST['password1'])){
				if ($_POST['password1']!=$_POST['password2']){
					$arrayError[]='Password baru Tidak sama';
				}else{
					$np=mysqli_real_escape_string($dbkoneksi, trim($_POST['password1']));
				}
			}else{
				$arrayError[]='Anda Lupa memasukkan password baru anda';
			}
			
			if(empty($arrayError)){
				$q= "SELECT userID FROM pengguna WHERE (email='$e' AND password='$p'))";
				$hasil=@mysqli_query($dbkoneksi, $q);
				$num=@mysqli_num_rows($hasil); 
				if($num == 0){
					$baris=mysqli_fetch_array($hasil, MYSQLI_NUM);
					//jalankan query
					$q="UPDATE pengguna SET password='$np' WHERE userID=$baris[0]";
					$hasil=Mysqli_query($dbkoneksi, $q);
					
					if(mysqli_affected_rows($dbkoneksi)==1){
						echo 'Password Terupdate';
					}else{
						echo'Error
						<p class="error">Error sistem.</p>';
						echo'<p>'.mysqli_error($dbkoneksi). '<br /><br />Query: '.$q.'</p>';
					}
					mysqli_close($dbkoneksi);
					exit();
				}else{
					echo'Error!
					<p class="error">Alamat email & password tdk cocok.</p>';
				}
			}else{
				echo'Error!
					<p class="error">Error:<br />';
					foreach ($arrayError as $psn){
						echo"- $psn <br />\n";
					}
					echo '</p><p class="error">Please Try Again.</p><p><br /></p>';
			}
			mysqli_close($dbkoneksi);
			}
			?>
                    <div class="col-md-4 col-md-offset-4">
                      <div class="panel panel-green">
							<div class="panel-heading">
								<h3 class="panel-title">Change Your Password</h3>
							</div>
							
								<form action="passuser.php" method="post">
									<div class="panel-body">
										<form role="form">
											<fieldset>
												<div class="form-group">
													<input class="form-control" id="email"  for="email" 
													placeholder="Email" name="email" type="email" autofocus
													value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
												</div>
												<div class="form-group">
												<label>Password Lama</label>
													<input class="form-control" id="password"  for="password" 
													 placeholder="Masukkan password lama" name="password" type="password"  autofocus
													value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
												</div>
												
												<div class="form-group ">
												<label>Password Baru</label>
													<input class="form-control" id="password1" for="password1" 
													placeholder="Masukkan password baru" name="password1" type="password" autofocus
													value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">
												</div>
												<div class="form-group ">
												<label>Konfirmasi Password Baru</label>
													<input class="form-control" id="password2" for="password2" 
													placeholder="konfirmasi password baru" name="password2" type="password" autofocus
													value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
												</div>
												<!-- Change this to a button or input when using this as a form -->
												<div>
													<input id="submit" class="btn btn-lg btn-success btn-block" 
													type="submit" name="login" value="Update Password">
													<a href="index-user.php" ><h5>Batal</h5></a>
												</div>
											</fieldset>
										</form>
								</form>
								</div>
							</div>  
                    </div>
                    <!-- /.col-lg-12 -->
                           
            
            <!-- /#page-wrapper -->
        </div>
	</div>
</div>
        <!-- /#wrapper -->

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
