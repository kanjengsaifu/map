<?php
// definisikan koneksi ke database
$server = "localhost";
$username = "u10225avf_edesa";
$password = "admedesa";
$database = "u10225avf_edesa";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

?>
