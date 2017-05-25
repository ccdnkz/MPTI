<?php
include "../config.php";
$nik				= $_POST['nik'];
$nama_kar 		    = $_POST['nama_kar'];
$alamat_kar 	    = $_POST['alamat_kar'];
$no_ktp				= $_POST['no_ktp'];
$no_rek 	        = $_POST['no_rek'];
$gol_kar	        = $_POST['gol_kar'];
$gaji_kar			= $_POST['gaji_kar'];

$query = mysql_query("INSERT INTO karyawan (nik, nama_kar, alamat_kar, no_ktp, no_rek, gol_kar, gaji_kar) VALUES ('$nik', '$nama_kar', '$alamat_kar', '$no_ktp', '$no_rek', '$gol_kar', '$gaji_kar')");
if ($query){
	echo "<script>alert('Data Karyawan Berhasil dimasukan!'); window.location = 'index.php'</script>";
} else {
	echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'index.php'</script>";
}
?>