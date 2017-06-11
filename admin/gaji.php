<?php
include "../config.php";
session_start();
if(!isset($_SESSION['username'])){
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
    function hitung_gaji() {
		var jam_lembur = document.transfer.jam_lembur.value;
		var uang_lembur = document.transfer.uang_lembur.value;
		var gaji_utama = document.transfer.gaji_utama.value;
		var total_gaji = document.transfer.total_gaji.value;
		uang_lembur = ( gaji_utama / 173 ) * jam_lembur;
		document.transfer.uang_lembur.value = Math.floor( uang_lembur );
		total_gaji = (gaji_utama - uang_lembur) + (2 * uang_lembur);
		document.transfer.total_gaji.value = Math.floor( total_gaji );
	}
	</script>
	<script type="text/javascript">
		// 1 detik = 1000
		window.setTimeout("waktu()",1000);  
		function waktu() {   
			var tanggal = new Date();  
			setTimeout("waktu()",1000);  
			document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
		}
	</script>
	<script language="JavaScript">
		var tanggallengkap = new String();
		var tglblnthn = new String();
		var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
		namahari = namahari.split(" ");
		var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
		namabulan = namabulan.split(" ");
		var tgl = new Date();
		var hari = tgl.getDay();
		var tanggal = tgl.getDate();
		var bulan = tgl.getMonth();
		var tahun = tgl.getFullYear();
		tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;
		tglblnthn = tanggal + "/ " + namabulan[bulan] + "/ " + tahun;

			var popupWindow = null;
			function centeredPopup(url,winName,w,h,scroll){
			LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
			TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
			settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
			popupWindow = window.open(url,winName,settings)
		}
	</script>
	</head>
	<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    html {
      height: 100%;
      box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
      box-sizing: inherit;
    }

    body {
      position: relative;
      margin: 0;
      padding-bottom: 6rem;
      min-height: 100%;
    }

    /**
     * Footer Styles
     */

    footer {
      position: absolute;
      right: 0;
      bottom: 0;
      left: 0;
      padding: 1rem;
      background-color: #555;
      color: white;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
    .navbar-brand img:hover{
			 -webkit-filter: contrast(200%) brightness(150%);
		}
	</style>
	<body>
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img alt="Brand" src="../rsc/logo.png" width="90" /></a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="#">Karyawan</a></li>
						<li><a href="#">Laporan</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $_SESSION['username'] ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Settings</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../logout.php">Logout</a></li>
						</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 sidenav">
					<h4 align="center">Menu</h4>
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="index.php">Data Karyawan</a></li>
						<li><a href="insert.php">Insert Data Karyawan</a></li>
						<li><a href="update.php">Update Data Karyawan</a></li>
						<li><a href="datagaji.php">Data Gaji Karyawan</a></li>
						<li><a href="tampilgaji.php">Cetak Slip Gaji Karyawan</a></li>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
					<br>
				</div>
				<div class="col-sm-9">
					<div class="row">
						<div class="col-lg-12">
							<table width="900">
								<tr>
									<td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
									<td align="left" width="30"> - </td>
									<td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
								</tr>
							</table>
							<br />
							<div class="alert alert-success alert-dismissable">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							 Anda Berada Di Halaman Transfer Gaji Karyawan
							</div>
						</div>
			
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-edit"></i> Data Transfer Gaji Karyawan</h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<?php
										$query = mysql_query("SELECT * FROM karyawan WHERE id_kar='$_GET[kd]'");
										$data  = mysql_fetch_array($query);
										?>
										<form action="transfergaji.php" method="post" autocomplete="off" name="transfer">
											<table class="table table-condensed">
												<tr>
													<td><label for="id_kar">NIK Karyawan</label></td>
													<td><input name="id_kar" type="text" class="form-control" id="id_kar" value="<?php echo $data['nik'];?>" readonly="readonly"/></td>
												</tr>
												<tr>
													<td><label for="kode_gaji">Kode Gaji</label></td>
													<td><select name="kode_gaji" name="kode_gaji" id="kode_gaji" class="form-control" required>
													<option></option>
													<option value="GJ001">GJ001</option>
													<option value="GJ002">GJ002</option>
													<option value="GJ003">GJ003</option>
													<option value="GJ004">GJ004</option>
													</select></td>
												</tr>
												<tr>
													<td><label for="jam_lembur">Jam Lembur</label></td>
													<td><input name="jam_lembur" type="text" class="form-control" id="jam_lembur" autofocus="on" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" required/></td>
												</tr>
												<tr>
													<td><label for="gaji_utama">Gaji Utama</label></td>
													<td><input name="gaji_utama" type="text" class="form-control" id="gaji_utama" value="<?php echo $data['gaji_kar'];?>" readonly="readonly"/></td>
												</tr> 
												<tr>
													<td><label for="uang_lembur">Uang Lembur</label></td>
													<td><input name="uang_lembur" type="text" class="form-control" id="uang_lembur" readonly/></td>
												</tr>
												<tr>
													<td><label for="total_gaji">Total Gaji</label></td>
													<td><input name="total_gaji" type="text" class="form-control" id="total_gaji" readonly/></td>
												</tr>
												<tr>
													<td><label for="bulan_transfer">Bulan Transfer</label></td>
													<td><select name="bulan_transfer" name="bulan_transfer" id="bulan_transfer" class="form-control" required>
													<option></option>
													<option value="Januari">Januari</option>
													<option value="Februari">Februari</option>
													<option value="Maret">Maret</option>
													<option value="April">April</option>
													<option value="Mei">Mei</option>
													<option value="Juni">Juni</option>
													<option value="Juli">Juli</option>
													<option value="Agustus">Agustus</option>
													<option value="September">September</option>
													<option value="Oktober">Oktober</option>
													<option value="November">November</option>
													<option value="Desember">Desember</option>
													</select></td>
												</tr>
												<tr>
													<td><label for="tgl_transfer">Tanggal Transfer</label></td>
													<td><input name="tgl_transfer" type="text" class="form-control" id="tgl_transfer" value="<?php echo "".date("d/m/Y").""; ?>" readonly="readonly"/></td>
												</tr>
												<tr>
													<td><label for="waktu_transfer">Jam Transfer</label></td>
													<td><input name="waktu_transfer" type="text" class="form-control" id="waktu_transfer" value="<?php echo "".date("H:i:s").""?>" readonly="readonly"/></td>
												</tr>
												<tr>
													<td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary" onclick="return confirm('Yakin ingin membuat record?')" style="margin-right:10px;
														"/><a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="container-fluid">
			<p>Footer Text</p>
		</footer>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>