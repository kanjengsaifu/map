<?php
include "mod/koneksi.php";
$id = abs((int)$_GET['id']);
$s  = mysql_query("select * from halaman where id = '$id'");
$d  = mysql_fetch_array($s);
echo $d['isi'];
echo "<br/>Terakhir diupdate pada $d[tglupdate]";
?>