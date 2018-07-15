<?php
include"mod/koneksi.php";

if($_GET[module]=='detaildesa'){
include"mod/koneksi.php";
	$q2=mysql_fetch_array(mysql_query("Select * from kecamatan where nama like '%$_GET[kec]%'"));
	$q3=mysql_fetch_array(mysql_query("Select * from desa where nama like'%$_GET[desa]%' and id_kecamatan='$q2[id]'"));
	$ides=$q3[id];
	

	header('Location:http://klikdesa.com/desa/profil.php?id='.$ides);
}

?>
