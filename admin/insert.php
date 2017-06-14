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
    .navbar-brand img:hover{
			 -webkit-filter: contrast(200%) brightness(150%);
		}
		
		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (max-width: 767px) {
		  .sidenav {
			height: auto;
			padding: 15px;
		  }
		  .row.content {height: auto;} 
		}
		select:invalid { color: gray; }
		 #mySidenav a {
    position: absolute;
    left: -80px;
    transition: 0.3s;
    padding: 15px;
    width: 340px;
    text-decoration: none;
    font-size: 16px;
    border-radius: 0 5px 5px 0;

  }

  #mySidenav a:hover {
      left: 0;
      color:white;
  }

  #dk {
	    top: 55px;
	    background-color: #9A9796;
	    color: #9A9796;
  }

  #id {
	    top: 135px;
	    background-color: #555;
	    color: #555;
  }

  #dg {
      top: 215px;
      background-color: #9A9796;
      color: #9A9796;
  }

  #csp {
      top: 295px;
      background-color: #555;
      color: #555;
  }

  #lo {
      top: 375px;
      background-color: #9A9796;
      color: #9A9796;
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
							<tr>
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
									<h3 class="panel-title"><i class="fa fa-user"></i> Tambah Data Karyawan </h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<form action="tambah.php" method="post">
											<table class="table table-condensed">
												<tr>
													<td><label for="nik">Nomor Induk Karyawan</label></td>
													<td><input name="nik" type="text" title="Masukan Nomor induk Karyawan" class="form-control" id="nik" placeholder="Nomor Induk Karyawan" required/>
												</tr>
												<tr>
													<td><label for="nama_kar">Nama Karyawan</label></td>
													<td><input name="nama_kar" type="text" title="Masukan Nama Karyawan" class="form-control" id="nama_kar" placeholder="Nama Karyawan" required/></td>
												</tr>
												<tr>
													<td><label for="alamat_kar">Alamat Karyawan</label></td>
													<td><input name="alamat_kar" type="text" title="Masukan Alamat Karyawan" class="form-control" id="alamat_kar" placeholder="Alamat Karyawan" required/></td>
												</tr>
												<tr>
													<td><label for="no_ktp">Nomor KTP</label></td>
													<td><input name="no_ktp" type="text" pattern="[0-9]{16}" title="Masukan 16 digit No.KTP anda" maxlength="16" class="form-control" id="no_ktp" placeholder="Nomor KTP" required/><span id="id" style='color:red'></span></td>
												</tr>
												<tr>
													<td><label for="no_rek">Nomor Rekening</label></td>
													<td><input name="no_rek" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' title="Masukan No.Rekening" class="form-control" id="no_rek" placeholder="Nomor Rekening" required/></td>
												</tr>
												<tr>
													<td><label for="golongan">Golongan</label></td>
													<td> 
														<select class="form-control" name="gol_kar" type="text" class="form-control" id="gol_kar">
															<option value="" disabled selected hidden>Pilih Golongan</option>
															<?php
																$table_name = "karyawan";
																$column_name = "gol_kar";
																$result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'");
																$row = mysql_fetch_array($result);
																$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
																foreach($enumList as $value)
																echo "<option value=\"$value\">$value</option>";
																?>
														</select>
													</td>
												</tr>
												<tr>
													<td><label for="gaji_kar">Gaji Karyawan</label></td>
													<td><input name="gaji_kar" type="text" pattern="([0-9]|&#8734;)+" class="form-control" id="gaji_kar" placeholder="Gaji Karyawan" required/></td>
												</tr>
												<tr>
													<td><input type="submit" value="Insert" class="btn btn-sm btn-default"/>&nbsp;<a href="index.php" class="btn btn-sm btn-default">Kembali</a></td>
												</tr>
											</table>
										</form>
									</div>
								</div> 
							</div>
						</div>
					</div><!-- /.row --> 
				</div><!-- /#page-wrapper -->
			</div><!-- /#wrapper -->
		</div>

		<footer class="container-fluid">
			<p>Copyright © 2017 - Payroll Systemt</p>
		</footer>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>