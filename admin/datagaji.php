﻿<?php
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
    <title>Payroll</title>
	
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" href="../rsc/icon.png">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
		// 1 detik = 1000
		window.setTimeout("startTime()",1000);  
		function checkTime(i) {
		  if (i < 10) {
		    i = "0" + i;
		  }
		  return i;
		}

		function startTime() {
		  var today = new Date();
		  var h = today.getHours();
		  var m = today.getMinutes();
		  var s = today.getSeconds();
		  // add a zero in front of numbers<10
		  m = checkTime(m);
		  s = checkTime(s);
		  document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
		  t = setTimeout(function() {
		    startTime()
		  }, 500);
		}
		startTime();
	</script>
	<script language="JavaScript">
		var tanggallengkap = new String();
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
      background: url('../rsc/bg.jpg') no-repeat center center fixed; 
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
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
		#mySidenav a {
    position: absolute;
    left: -80px;
    transition: 0.3s;
    padding: 15px;
    width: 340px;
    text-decoration: none;
    font-size: 16px;
    border-radius: 0 5px 5px 0;
    color:white;
    text-align: right;
	}

	#mySidenav a:hover {
	    left: 0;
	    color:white;
	}

	#dk {
	    top: 55px;
	    background-color: #9A9796;
	}

	#id {
	    top: 135px;
	    background-color: #555;
	}

	#dg {
	    top: 215px;
	    background-color: #9A9796;
	}

	#csp {
	    top: 295px;
	    background-color: #555;
	}

	#lo {
	    top: 375px;
	    background-color: #9A9796;
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
				<a class="navbar-brand" href="index.php"><img alt="Brand" src="../rsc/logo.png" width="90" /></a></a>
				</div>
			</div><!-- /.container-fluid -->
		</nav>

		<div class="container-fluid">
			<div class="row">
        <div class="col-sm-3 sidenav" id="mySidenav">
          <h4 align="center">Menu</h4>
          <ul class="nav nav-stacked">
          	<a href="index.php" id ="dk">Data Karyawan</a>
            <a href="insert.php" id ="id">Insert Data Karyawan</a>
            <a href="datagaji.php" id ="dg">Data Gaji Karyawan</a>
            <a href="tampilgaji.php" id ="csp">Cetak Slip Gaji Karyawan</a>
            <a href="../logout.php" id ="lo">Logout</a>
          </ul>
            
        </div>
				
				<div class="col-sm-9">
					<div class="row">
						<div class="col-lg-12">
							<table width="900">
								<tr style="color:white;">
									<td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
									<td align="left" width="30"> - </td>
									<td align="left" width="620"> <h4><div id="time"></div></h4></td>
								</tr>
							</table>
							<br />
						</div>
		
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user"></i> Data Penggajian Karyawan </h3> 
								</div>
								<div class="panel-body">
											<form method="post">
												<div class="col-lg-5" style="margin-bottom:10px;">
													<select name="blntrf" class="form-control" required>
													<option value="" disabled hidden selected>Select Month</option>
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
												</select>
												</div>
												<div class="col-sm-5" style="margin-bottom:10px;">
													<button type="submit" class="btn btn-basic" name="submitsort">Retrieve</button>
												</div>
											</form>
								
									<div class="table-responsive col-lg-12">
										<?php
										$sort="";
										if($_SERVER["REQUEST_METHOD"] == "POST"){
											$sort = $_POST['blntrf'];
										}
										$tampil=mysql_query("SELECT karyawan.nik, karyawan.nama_kar, karyawan.no_rek, karyawan.gaji_kar, gaji.kode_gaji, 
										gaji.uang_lembur, gaji.total_gaji, gaji.tgl_transfer, gaji.waktu_transfer,gaji.bulan_transfer FROM karyawan, gaji WHERE karyawan.id_kar=gaji.id_kar AND gaji.bulan_transfer='$sort'");
										
										$total=mysql_num_rows($tampil); ?>
										<table class="table table-bordered table-hover table-striped tablesorter">
								  
										<tr>
											<th>Kode <i class="fa fa-sort"></i></th>
											<th>Nama <i class="fa fa-sort"></i></th>
											<th>No Rek <i class="fa fa-sort"></i></th>
											<th>Kode Gaji <i class="fa fa-sort"></i></th>
											<th>Gaji Utama <i class="fa fa-sort"></i></th>
											<th>Uang lembur <i class="fa fa-sort"></i></th>
											<th>Total Gaji <i class="fa fa-sort"></i></th>
											<th>Bulan Transfer <i class="fa fa-sort"></i></th>
											<th>Waktu Transfer <i class="fa fa-sort"></i></th>
										</tr>
										<?php while($data=mysql_fetch_array($tampil))
										{
										?>
										<tr>
											<td><?php echo $data['nik'];?></td>
											<td><?php echo $data['nama_kar']; ?></a></td>
											<td><?php echo $data['no_rek']; ?></td>
											<td><?php echo $data['kode_gaji']; ?></td>
											<td>Rp.<?php echo number_format($data['gaji_kar'],2,",",".");?></td>
											<td>Rp.<?php echo number_format($data['uang_lembur'],2,",",".");?></td>
											<td>Rp.<?php echo number_format($data['total_gaji'],2,",",".");?></td>
											<td><?php echo $data['bulan_transfer'];?></td>
											<td><?php echo $data['waktu_transfer']; ?></td>
										</tr>
										<?php
										}
										?>
										</table>
									</div>
									<div class="text-right col-lg-12">
										<a href="printdatagaji.php?hal=printdatagaji&bln=<?php echo $sort;?>" target="_blank"><button type="submit" class="btn btn-info" name="submit">Klik disini untuk mencetak data penggajian karyawan</button>
										</a>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="container-fluid">
			<p>Copyright © 2017 - Payroll System</p>
		</footer>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="../bootstrap/js/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>