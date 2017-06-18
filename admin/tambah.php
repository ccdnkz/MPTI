<?php
if(isset($_POST['Tambah']))
{
mysql_connect('localhost','root','');
mysql_select_db('payroll');
$validasi= $_POST['nik'];
$resultset_1 = mysql_query("select * from karyawan where nik='".$validasi."' ") or die(mysql_error());
$count = mysql_num_rows($resultset_1);
   if($count == 0)
    {
    	$nik				= $_POST['nik'];
		$nama_kar 		    = $_POST['nama_kar'];
		$alamat_kar 	    = $_POST['alamat_kar'];
		$no_ktp				= $_POST['no_ktp'];
		$no_rek 	        = $_POST['no_rek'];
		$gol_kar	        = $_POST['gol_kar'];
		$gaji_kar			= $_POST['gaji_kar'];
       $resultset_2 = mysql_query("INSERT INTO karyawan (nik, nama_kar, alamat_kar, no_ktp, no_rek, gol_kar, gaji_kar) VALUES ('$nik', '$nama_kar', '$alamat_kar', '$no_ktp', '$no_rek', '$gol_kar', '$gaji_kar')");
    	echo "<script>alert('Data karyawan berhasil dimasukan!'); window.location = 'index.php'</script>";
    }else{
       echo "<script>alert('Data karyawan telah ada!'); window.location = 'index.php'</script>" ;
    }
}
?>