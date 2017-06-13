<?php
include "../config.php";
$id_kar				= $_POST['id_kar'];
$kode_gaji			= $_POST['kode_gaji'];
$jam_lembur 		= $_POST['jam_lembur'];
$uang_lembur 	    = $_POST['uang_lembur'];
$total_gaji			= $_POST['total_gaji'];
$bulan_transfer 	= $_POST['bulan_transfer'];
$tgl_transfer	    = $_POST['tgl_transfer'];
$waktu_transfer		= $_POST['waktu_transfer'];

$query = mysql_query("INSERT INTO gaji (id_kar, kode_gaji, jam_lembur, uang_lembur, total_gaji, bulan_transfer, tgl_transfer, waktu_transfer) VALUES ('$id_kar', '$kode_gaji', '$jam_lembur', '$uang_lembur', '$total_gaji', '$bulan_transfer', '$tgl_transfer', '$waktu_transfer')");
if ($query){
	echo "<script>alert('Data Gaji Karyawan Berhasil dimasukan!'); window.location = 'index.php'</script>";	
} else {
	echo "<script>alert('Data Gaji Karyawan Gagal dimasukan!'); window.location = 'index.php'</script>";	
}
?>