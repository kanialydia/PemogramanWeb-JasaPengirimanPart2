
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Data Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

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
            <nav class="navbar navbar-inverse navbar-fixed-tob " role="navigation">
			
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
                                <a href="index-admin.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
							<li>
                                <a href="registrasi-admin.php"><i class="fa fa-user-plus fa-fw"></i> Tambah Anggota</a>
                            </li>
                            <li>
                                <a href="formkirimadmin.php"><i class="fa fa-edit fa-fw"></i> Form Kirim Barang</a>
                            </li>
							<li>
                                <a href="#"><i class="fa fa-folder fa-fw"></i> Data Paket<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>                                                                                                                          <li>
                                                <a href="datapaket-admin.php">Seluruh Paket</a>
                                            </li>
                                            <li>
                                                <a href="paketkirim-admin.php">Paket Terkirim</a>
                                            </li>
                                            <li>
                                                <a href="paketproses-admin.php">Paket dalam Proses</a>
                                            </li>                                        
                                        <!-- /.nav-third-level -->
                                    </li>									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder fa-fw"></i> Data Anggota<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
											<li>
                                                <a href="lihat-all.php">Seluruh Anggota</a>
                                            </li>
											<li>                                                                                                                          <li>
                                                <a href="lihat-admin.php">Data Admin</a>
                                            </li>
                                            <li>
                                                <a href="lihat-user.php">Data User</a>
                                            </li>
                                            <li>
                                                <a href="lihat-kurir.php">Data Kurir</a>
                                            </li>                                        
                                        <!-- /.nav-third-level -->
                                    </li>									
                                </ul>
                                <!-- /.nav-second-level -->
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
                        <h1 class="page-header">Data Lengkap Paket</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>             
       
        <div class="row">
			<div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Berikut adalah daftar seluruh paket
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
								<?php
							//skrip untuk koneksi
							require('mysqli_connect.php');
							//skrip ini u/ membaca rekaman
							$q="SELECT * FROM paket ";
							$hasil=@mysqli_query ($dbkoneksi, $q);// menjalankan query 
						
								if($hasil){
							
                                    echo '
                                        <thead>
                                            <tr">
												<th>Edit</th>
                                                <th>Hapus</th>
                                                <th>Resi</th>
                                                <th>Nama Pengirim</th>
												<th>Tanggal Kirim</th>
												<th>No. Telepon</th>
												<th>Kota Asal</th>
												<th>Alamat Lengkap Pengirim</th>
												<th>Nama Penerima</th>
												<th>Tanggal Diterima</th>
												<th>No. Telepon</th>
												<th>Kota Tujuanl</th>
												<th>Alamat Lengkap Penerima</th>
												<th>Status</th>
												
                                            </tr>
                                        </thead>
										<tbody>';
										//tampilkan semua user
                                            while($baris=mysqli_fetch_array($hasil, MYSQLI_ASSOC)){
                                        echo'<tr>
												<td><a href="editpaket.php?packetID=' . $baris['packetID'] . '">
												<button type="button" class="btn btn-outline btn-primary btn-xs  btn-info">Edit</button></a></td>
                                                <td><a href="delete.php?packetID=' . $baris['packetID'] . '">
												<button type="button" class="btn btn-outline btn-primary btn-xs  btn-danger">Hapus</button></a></td>
												<td>' . $baris['resi'] . '</td>
                                                <td>' . $baris['sender'] . '</td>
												<td>' . $baris['tglkirim'] . '</td>
                                                <td>' . $baris['sendernumber'] . '</td>
												<td>' . $baris['senderadd'] . '</td>
												<td>' . $baris['alamatsender'] . '</td>
												<td>' . $baris['receiver'] . '</td>
												<td>' . $baris['tglterima'] . '</td>
                                                <td>' . $baris['receivernumber'] . '</td>
												<td>' . $baris['receiveradd'] . '</td>
												<td>' . $baris['alamatreceiver'] . '</td>
												<td>' . $baris['status'] . '</td>
												</tr>
                                        </tbody>';}
									mysqli_free_result($hasil);
								
								}else{
									echo '<p class="error">Terjadi Kesalahan.! </p>';
									echo '<p>' . mysqli_error($dbkoneksi) . '<br><br>Query:' . $q . '</p>'; 
								}
								mysqli_close($dbkoneksi);
								?>
								</table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
							
                        </div>
                        <!-- /.panel -->
                    </div>
                  
				<div class="panel-footer">
					<?php include('footer.php');?>
				</div>
					<!-- /.col-lg-6 -->
        </div>		
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

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>