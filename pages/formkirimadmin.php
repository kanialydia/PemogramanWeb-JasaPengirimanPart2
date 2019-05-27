<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Form kirim Barang</title>

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
                        <h1 class="page-header">Form Kirim Paket</h1>
                    </div>
				<?php
				include "kon.php";
				//skrip ini melakukan query INSERT yg menambah sebuah rekaman pada tabel pengguna.
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$arrayError = array();//inisialisasi array error
					//kondisi apakah telah memasukkan username
					$q="SELECT max(resi) as maxKode FROM paket";
					$hasil = @mysqli_query ($con, $q);
					$data = mysqli_fetch_array($hasil);
					$resi=$data['maxKode'];
					$noUrut=(int) substr($resi, 7, 7);
					$noUrut++;
					$char = "EXPRESS";
					$resi= $char . sprintf("%07s", $noUrut);
					echo'<div class="col-lg-12">';
					echo'<div class="well well-lg">';
					echo '<h2>No. Resi Anda : ';
					echo $resi;
					echo '</h2>';
					echo'</div>';
					echo'</div>';
					
					//apakah nama telah dimasukkan
					if(empty($_POST['sender'])){
						$arrayError[]='<script type="text/javascript">alert("Nama pengirim tidak boleh kosong");</script> ';
					}
					else{$pengirim = trim($_POST['sender']);
					}
					
					if(empty($_POST['sendernumber'])){
						$arrayError[]='<script type="text/javascript">alert("No. Telpon pengirim tidak boleh kosong");</script>';
					}
					else{$nopm = trim($_POST['sendernumber']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['senderadd'])){
						$arrayError[]='<script type="text/javascript">alert("Kota asal tidak boleh kosong");</script> ';
					}
					else{$addka = trim($_POST['senderadd']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['alamatsender'])){
						$arrayError[]='<script type="text/javascript">alert("Alamat pengirim tidak boleh kosong");</script>';
					}
					else{$adds = trim($_POST['alamatsender']);
					}
					
					//apakah nama telah dimasukkan
					if(empty($_POST['receiver'])){
						$arrayError[]='<script type="text/javascript">alert("Nama penerima tidak boleh kosong");</script> ';
					}
					else{$penerima = trim($_POST['receiver']);
					}
					
					if(empty($_POST['receivernumber'])){
						$arrayError[]='<script type="text/javascript">alert("No. Telpon penerima tidak boleh kosong");</script> ';
					}
					else{$nopa = trim($_POST['sendernumber']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['receiveradd'])){
						$arrayError[]='<script type="text/javascript">alert("Kota tujuan tidak boleh kosong");</script>';
					}
					else{$addkt = trim($_POST['receiveradd']);
					}
					
					//apakah alamat email telah dimasukkan
					if(empty($_POST['alamatreceiver'])){
						$arrayError[]='<script type="text/javascript">alert("Alamat penerima tidak boleh kosong");</script>';
					}
					else{$addr = trim($_POST['alamatreceiver']);
					}
			
					//apakah sudah memasukkan no hp
					if(empty($_POST['barang'])){
						$arrayError[]='<script type="text/javascript">alert("Nama barang tidak boleh kosong");</script> ';
					}
					else{$barang = trim($_POST['barang']);
					}
					//apakah sudah level
					if(empty($_POST['weight'])){
						$arrayError[]='<script type="text/javascript">alert("berat barang tidak boleh kosong");</script> ';
					}
					else{$berat = trim($_POST['weight']);
					}
					
					//apakah sudah level
					if(empty($_POST['qty'])){
						$arrayError[]='<script type="text/javascript">alert("Jumlah barang tidak boleh kosong");</script>';
					}
					else{$jumlah = trim($_POST['qty']);
					}
					//apakah sudah level
					if(empty($_POST['description'])){
						$ket = trim($_POST['description']);
					}
					else{$ket = trim($_POST['description']);
					}
					/*if(!empty($_POST['senderadd']) && $_POST['receiveradd']){
						$asal=$data['senderadd'];
						$tujuan=$data['receiveradd'];
						$fee=$data['fee'];
						if(($asal )== $tujuan){
							$fee='20000';
						}
						else{$fee = trim($_POST['fee']);
						}
					}
					else{$arrayError[]='Anda tidak memasukkan password anda.';
					}*/
					
					//jika sebua data terisi
					if(empty($arrayError)){
						require('mysqli_connect.php');//koneksi ke database.
						//melakukan query
						$q = "INSERT INTO paket (packetID,resi,sender,senderadd,alamatsender,sendernumber,tglkirim,receiver,receiveradd,alamatreceiver,receivernumber,tglterima,description,barang,weight,qty,fee,status)
						VALUES('','$resi','$pengirim','$addka','$adds','$nopm',NOW(),'$penerima','$addkt','$addr','$nopa','','$ket','$barang','$berat','$jumlah','','proses' )";
						$hasil = @mysqli_query ($dbkoneksi, $q);//menjalankan query
						if($hasil){//jika berhasil
							echo'<script type="text/javascript">alert("Paket berhasil diproses");</script> ';
							
						}
						else{//jika gagal
							//tampilkan error
							echo '<script type="text/javascript">alert("Paket belum terkirim karena error sistem");</script> ';
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
							echo"<h11>$psn</h11><br>\n";
						}
						echo '</p><h2>Silahkan coba lagi.</h2>';
					}
				}
				?>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<form action="formkirimadmin.php" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                Data Paket Lengkap
                            </div>
							<form action="formkirimadmin.php" method="post">
                            <div class="panel-body">
                             
                                        <form role="form">
										<div class="col-lg-6">
											<h3 class="page-header ">Data Pengirim</h3>
										
											<label>Nama Pengirim</label>
                                            <div class="form-group">
                                                <input class="form-control" for="sender"  placeholder="Nama Pengirim" autofocus 
											id="sender" type="text" name="sender" 
											value="<?php if (isset($_POST['sender'])) echo $_POST['sender']; ?>">
                                            </div>
											<div class="form-group">
                                                <label>No Telpon</label>
                                                <input class="form-control" for="sendernumber"  placeholder="No. Telpon" autofocus 
											id="sendernumber" type="number" name="sendernumber" 
											value="<?php if (isset($_POST['sendernumber'])) echo $_POST['sendernumber']; ?>">
                                            </div>
											<div class="form-group">
                                                <label>Kota Asal</label>
												<input class="label" for="level"  autofocus 
											id="senderadd" type="text">
                                                <select class="form-control" name="senderadd">
												<option value="">- Kota Asal -</option>
                                                    <option value="Bandung"<?php if (isset($_POST['senderadd']) AND ($_POST['senderadd'] == 'Bandung'))
												echo 'selected="selected"';?>>Bandung</option>
                                                    <option value="Bali"<?php if (isset($_POST['senderadd']) AND ($_POST['senderadd'] == 'Bali'))
												echo 'selected="selected"';?>>Bali</option>
                                                    <option value="Jakarta"<?php if (isset($_POST['senderadd']) AND ($_POST['senderadd'] == 'Jakarta'))
												echo 'selected="selected"';?>>Jakarta</option>
                                                    <option value="Medan"<?php if (isset($_POST['senderadd']) AND ($_POST['senderadd'] == 'Medan'))
												echo 'selected="selected"';?>>Medan</option>
                                                    <option value="Surabaya"<?php if (isset($_POST['senderadd']) AND ($_POST['senderadd'] == 'Surabaya'))
												echo 'selected="selected"';?>>Surabaya</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Pengirim</label>
                                                <textarea class="form-control" rows="3" for="alamatsender" placeholder="..." autofocus 
											id="alamatsender" type="text" name="alamatsender" 
											value="<?php if (isset($_POST['alamatsender'])) echo $_POST['alamatsender']; ?>">
												</textarea>
												
                                            </div>
											</div>
											<div class="col-lg-6">
												<h3 class="page-header">Data Penerima</h3>
											
											 <div class="form-group">
                                                <label>Nama Penerima</label>
                                                 <input class="form-control" for="receiver"  placeholder="Nama Penerima" autofocus 
											id="receiver" type="text" name="receiver" 
											value="<?php if (isset($_POST['receiver'])) echo $_POST['receiver']; ?>">
                                            </div>
											<div class="form-group">
                                                <label>No Telpon</label>
                                                <input class="form-control" for="receivernumber"  placeholder="No. Telpon" autofocus 
											id="receivernumber" type="number" name="receivernumber" 
											value="<?php if (isset($_POST['receivernumber'])) echo $_POST['receivernumber']; ?>">
                                            </div>
											<div class="form-group">
                                                <label>Kota Tujuan</label>
												<input class="label" for="level"  autofocus 
											id="receiveradd" type="text">
                                                <select class="form-control" name="receiveradd">
												<option value="">- Kota Tujuan -</option>
                                                    <option value="Bandung"<?php if (isset($_POST['receiveradd']) AND ($_POST['receiveradd'] == 'Bandung'))
												echo 'selected="selected"';?>>Bandung</option>
                                                     <option value="Bali"<?php if (isset($_POST['senderadd']) AND ($_POST['senderadd'] == 'Bali'))
												echo 'selected="selected"';?>>Bali</option>
                                                    <option value="Jakarta"<?php if (isset($_POST['receiveradd']) AND ($_POST['receiveradd'] == 'Jakarta'))
												echo 'selected="selected"';?>>Jakarta</option>
                                                    <option value="Medan"<?php if (isset($_POST['receiveradd']) AND ($_POST['receiveradd'] == 'Medan'))
												echo 'selected="selected"';?>>Medan</option>
                                                    <option value="Surabaya"<?php if (isset($_POST['receiveradd']) AND ($_POST['receiveradd'] == 'Surabaya'))
												echo 'selected="selected"';?>>Surabaya</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Penerima</label>
                                                <textarea class="form-control" rows="3" for="alamatreceiver"  placeholder="..." autofocus 
											id="alamatreceiver" type="text" name="alamatreceiver" 
											value="<?php if (isset($_POST['alamatreceiver'])) echo $_POST['alamatreceiver']; ?>">
												</textarea>
                                            </div>
											</div>
											<div class="col-lg-6">
												<h3 class="page-header">Data Paket</h3>
											
											<div class="form-group">
                                                <label>Nama Barang</label>
                                                <input class="form-control" for="barang"  placeholder="Nama/Jenis Barang" autofocus 
											id="barang" type="text" name="barang" 
											value="<?php if (isset($_POST['barang'])) echo $_POST['barang']; ?>">
                                                <p class="help-block">Contoh: Jam/Buku/Baju/dll.</p>
                                            </div>
											
											<div class="form-group input-group">
                                                <span class="input-group-addon">Berat Barang</span>
                                                <input class="form-control" for="weight"  placeholder="Berat Barang" autofocus 
											id="weight" type="number" name="weight" 
											value="<?php if (isset($_POST['weight'])) echo $_POST['weight']; ?>">
												<span class="input-group-addon">Kg</span>
                                            </div>
											
											<div class="form-group input-group">
                                                <span class="input-group-addon">Jumlah Barang</span>
                                                <input class="form-control" for="qty"  placeholder="qty" autofocus 
											id="qty" type="number" name="qty" 
											value="<?php if (isset($_POST['qty'])) echo $_POST['qty']; ?>">
												<span class="input-group-addon">Pcs</span>
                                            </div>
                                           
											
                                            <div class="form-group">
                                                <label>Keterangan Lainnya</label>
                                                <textarea class="form-control" rows="3" for="Keterangan Lainnya" placeholder="..." autofocus 
											id="description" type="text" name="description" 
											value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>">
												</textarea>
                                            </div>
											<input id="submit" 
											type="submit" name="submit" class="btn btn-outline btn-warning btn-lg btn-block" value="Kirim Paket">
											
											</div>
											<div class="col-lg-6">
											<div class="panel panel-warning">
											<div class="panel-heading">
												Ongkir
											</div>
												<div class="panel-body">
											
													<table class="table table-striped">
													<thead>
														<tr>
															<th>Rute </th>
															<th>Harga</th>
															<th>Rute </th>
															<th>Harga</th>
														</tr>
													</thead>
													<tbody>
													
													<tr>
														<td>Bandung <> Bandung</td>
														<td>10000</td>
														<td>Jakarta <> Surabaya</td>
														<td>15000</td>
													</tr>
													<tr>
														<td>Bandung <> Jakarta</td>
														<td>10000</td>
														<td>Bali <> Bali</td>
														<td>10000</td>
													</tr>
													<tr>
														<td>Bandung <> Bali</td>
														<td>30000</td>
														<td>Bali <> Medan</td>
														<td>40000</td>
													</tr>
													<tr>
														<td>Bandung <> Medan</td>
														<td>35000</td>
														<td>Bali <> Surabaya</td>
														<td>25000</td>
													</tr>
													<tr>
														<td>Bandung <> Surabaya</td>
														<td>20000</td>
														<td>Medan <> Medan</td>
														<td>10000</td>
													</tr>
													<tr>
														<td>Jakarta <> Jakarta</td>
														<td>10000</td>
														<td>Medan <> Surabaya</td>
														<td>35000</td>
													</tr>
													<tr>
														<td>Jakarta <> Bali</td>
														<td>30000</td>
														<td>Surabaya <> Surabaya</td>
														<td>15000</td>
													</tr>
													<tr>
														<td>Jakarta <> Medan</td>
														<td>20000</td>
														<td>-</td>
														<td>-</td>
													</tr>
													
													</tbody>
											
											</div>
											</div>
											</div>
                                            
                                        </form>
                                   
                                <!-- /.row (nested) -->
                            </div>
							</form>
                            <!-- /.panel-body -->
                        </div>
     
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				</form>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
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
