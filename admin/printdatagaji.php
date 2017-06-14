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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
	<style>
		@page { size: auto;  margin: 0mm; }
    	@media print
			{    
			    .no-print, .no-print *
			    {
			        display: none !important;
			    }
			    .panel,.panel-heading {
			    	border: none !important;
			    }
			}
	</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<table width="900">
						<tr>
						<td width="250"><div class="Tanggal no-print"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
						<td align="left" width="30"> - </td>
						<td align="left" width="620"> <h4><div id="time"></div></h4></td>
						</tr>
					</table>
					<br />
				</div>
		
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title text-center"><i class="fa fa-user"></i> Data Penggajian Karyawan Bulan <?php echo $_GET['bln']; ?> </h3> 
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<?php
								$tampil=mysql_query("SELECT karyawan.nik, karyawan.nama_kar, karyawan.no_rek, karyawan.gaji_kar, gaji.kode_gaji, 
								gaji.uang_lembur, gaji.total_gaji, gaji.tgl_transfer, gaji.waktu_transfer FROM karyawan, gaji WHERE karyawan.id_kar=gaji.id_kar AND gaji.bulan_transfer='$_GET[bln]'");
								$total=mysql_num_rows($tampil); ?>
								<table class="table table-bordered table-hover table-striped tablesorter">
								<tr>
									<th>Kode<i class="fa fa-sort"></i></th>
									<th>Nama<i class="fa fa-sort"></i></th>
									<th>No Rek <i class="fa fa-sort"></i></th>
									<th>Kode Gaji <i class="fa fa-sort"></i></th>
									<th>Gaji Utama <i class="fa fa-sort"></i></th>
									<th>Uang lembur <i class="fa fa-sort"></i></th>
									<th>Total Gaji <i class="fa fa-sort"></i></th>
									<th>Tanggal Transfer <i class="fa fa-sort"></i></th>
									<th>Waktu Transfer <i class="fa fa-sort"></i></th>
								</tr>
								<?php while($data=mysql_fetch_array($tampil))
								{ ?>
								<tr>
									<td><?php echo $data['nik'];?></td>
									<td><?php echo $data['nama_kar']; ?></a></td>
									<td><?php echo $data['no_rek']; ?></td>
									<td><?php echo $data['kode_gaji']; ?></td>
									<td>Rp.<?php echo number_format($data['gaji_kar'],2,",",".");?></td>
									<td>Rp.<?php echo number_format($data['uang_lembur'],2,",",".");?></td>
									<td>Rp.<?php echo number_format($data['total_gaji'],2,",",".");?></td>
									<td><?php echo $data['tgl_transfer'];?></td>
									<td><?php echo $data['waktu_transfer']; ?></td>
								</tr>
								<?php
								}
								?>
								</table>
						   </div>
							<div class="text-right no-print">
								<a href="#" class="btn btn-sm btn-warning" onclick="window.print();return false"><i class="fa fa-print"></i> Cetak Data</a>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="../bootstrap/js/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>