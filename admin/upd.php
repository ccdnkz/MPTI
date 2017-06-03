<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

$nik				= $_POST['nik'];
$nama_kar 		    = $_POST['nama_kar'];
$alamat_kar 	    = $_POST['alamat_kar'];
$no_ktp				= $_POST['no_ktp'];
$no_rek 	        = $_POST['no_rek'];
$gol_kar	        = $_POST['gol_kar'];
$gaji_kar			= $_POST['gaji_kar'];

// Membuat Koneksi dengan Database
$conn = new mysqli($servername, $username, $password, $dbname);
// Sudah Terkoneksi ?
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Perintah Eksekusi
$sql = "UPDATE karyawan SET nik='$nik', nama_kar='$nama_kar', alamat_kar='$alamat_kar', no_ktp='$no_ktp', no_rek='$no_rek', gol_kar='$gol_kar', gaji_kar='$gaji_kar' where nik = '$nik'";


// $conn->query($sql) = Eksekusi $sql(Query) di Koneksi Database $conn
// Check Jika Berhasil (=== TRUE)
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record berhasil terupdate'); window.location = 'update.php'</script>";
} else {
    echo "<script>alert('Record gagal diupdate'); window.location = 'update.php'</script>" . $conn->error;
}

$conn->close();
?>