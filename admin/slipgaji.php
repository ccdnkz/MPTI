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
		.table-borderless > tbody > tr > td,
		.table-borderless > tbody > tr > th,
		.table-borderless > tfoot > tr > td,
		.table-borderless > tfoot > tr > th,
		.table-borderless > thead > tr > td,
		.table-borderless > thead > tr > th {
		    border: none;
		}
    </style>

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
	<body>
		<div class="col-lg-6" style="margin-top:20px;">
            <div class="panel panel-primary">
              <div class="panel-heading">
              <?php
              $tampil=mysql_query("SELECT * FROM karyawan k,gaji g WHERE k.id_kar=g.id_kar AND k.nik='$_GET[kd]' AND g.waktu_transfer='$_GET[wkt]'");
              $total=mysql_num_rows($tampil);
              $data=mysql_fetch_array($tampil);
              ?>
              <h3 class="panel-title" ><i class="fa fa-user"></i> Slip Gaji Karyawan Bulan <?php echo $data['bulan_transfer']; ?> </h3> 
              </div>
              <div class="panel-body">
                 <div class="table-responsive " id="pagy2">
					<table class="table table-condensed table-hover table-striped tablesorter">
						<?php 
						
						?>
						<tr>
							<td>Kode Karyawan</td>
							<td>:</td>
							<td><?php echo $data['nik']; ?></td>
						</tr>
						<tr>
							<td>Nama Karyawan</td>
							<td>:</td>
							<td><?php echo $data['nama_kar']; ?></a></td>
						</tr>
						<tr>
							<td>Nomor Rekening</td>
							<td>:</td>
							<td><?php echo $data['no_rek']; ?></td>
						</tr>
						<tr>
							<td>Kode Gaji</td>
							<td>:</td>
							<td><?php echo $data['kode_gaji']; ?></td>
						</tr>
						<tr>
							<td>Gaji Utama</td>
							<td>:</td>
							<td>Rp.<?php echo number_format($data['gaji_kar'],2,",",".");?></td>
						</tr>
						<tr>
							<td>Uang Lembur</td>
							<td>:</td>
							<td>Rp.<?php echo number_format($data['uang_lembur'],2,",",".");?></td>
						</tr>
						<tr>
							<td>Total Gaji</td>
							<td>:</td>
							<td>Rp.<?php echo number_format($data['total_gaji'],2,",",".");?></td>
						</tr>
						<tr>
							<td>Tanggal Transfer</td>
							<td>:</td>
							<td><?php echo $data['tgl_transfer'];?></td>
						</tr>
						<tr>
							<td>Waktu Transfer</td>
							<td>:</td>
							<td><?php echo $data['waktu_transfer']; ?></td>
						</tr>
                   </table>
                </div>
                <table class="table table-borderless">
				    <tbody>
				      <tr class="text-center">
				        <td>Payroll,</td>
				        <td >Diterima Oleh,</td>
				      </tr>
				      <tr>
				      	<td>&nbsp;</td>
				      	<td>&nbsp;</td>
				      </tr>
				      <tr class="text-center">
				        <td>Agus Rianto</td>
				        <td><?php echo $data['nama_kar'];?></td>
				      </tr>

				    </tbody>
				  </table>
                </div>
                <div class="text-right no-print">
                  <a href="#" target="_blank" class="btn btn-xs btn-warning" onclick="window.print();return false">Cetak  <i class="fa fa-print"></i></a>
                </div>
              </div> 
            </div>
          </div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>