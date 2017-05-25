<?php
$db = new pdo('mysql:host=localhost;dbname=payroll','root','');

mysql_connect("localhost","root","");
mysql_select_db("payroll");

//fungsi format rupiah 
function format_rupiah($rp) {
	$hasil = "Rp." . number_format($rp, 0, "", ".") . ",00";
	return $hasil;
}
?>