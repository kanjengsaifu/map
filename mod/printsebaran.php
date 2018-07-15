<?php
include"../mod/koneksi.php";
   $xa=$_GET['xa'];
   $xb=$_GET['xb'];
   $xz=$_GET['xz'];

 header("Content-type: application/vnd.ms-excell");
	header("Expires: 0");
	header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment;Filename=datasebaran.xls");
	$qa=mysql_query("Select * from kategori");
	if($xz==99){
		
		$q=mysql_query("select * from kabupaten where id_prov like'$xb%' order by nama asc");
	
	echo"<table border=1 class='table table-hover table-bordered'>";
	echo"<tr><td rowspan=2>No</td><td rowspan=2>Nama Kabupaten/ Kota </td>";
	
	}
	
	elseif($xz==1){
		$q=mysql_query("select * from kecamatan where id_kabupaten like'$xb%' order by nama asc");
	
	echo"<table class='table table-bordered'>";
	echo"<tr><td rowspan=2>No</td><td rowspan=2>Nama Kecamatan </td>";
		
	}
elseif($xz==2){
		$q=mysql_query("select * from desa where id_kecamatan like'$xb%' order by nama asc");
	
	echo"<table class='table table-bordered'>";
	echo"<tr><td rowspan=2>No</td><td rowspan=2>Nama Desa/ Kelurahan </td>";
}elseif($xz==3){
	$q=mysql_query("select * from desa where id like'$xb%' order by nama asc");
	
	echo"<table class='table table-bordered'>";
	echo"<tr><td rowspan=2>No</td><td rowspan=2>Nama Desa </td>";
	
}
	$qq=mysql_query("select * from subkategori where kategori='$xa'");
	$zz=mysql_num_rows($qq);
	echo"<td colspan=$zz align=center>Jumlah(Unit)</td></tr><tr>";
	while($rr=mysql_fetch_array($qq)){
		echo"<td>$rr[namasub]</td>";
	}
	echo"</tr>";
	$no=1;
	while($a=mysql_fetch_array($q)){
		
	echo"<tr><td>$no</td><td>$a[nama]</td>";
	$b=mysql_query("select * from subkategori where kategori='$xa'");
	while($c=mysql_fetch_array($b)){
	
		 $s0 = mysql_query("select count(*) as jml from tbl_informasi where jenis = '$c[id]' and desa like '$a[id]%'") or die(mysql_error());
	
	$d0=mysql_fetch_array($s0);
	echo"<td>$d0[jml]</td>";
	}
	echo"</tr>";
	$no++;
	}

	echo"<tr><td colspan=2>Total Jumlah</td>";
	$w=mysql_query("select * from subkategori where kategori='$xa'");
	while($x=mysql_fetch_array($w)){
	$s1 = mysql_query("select count(*) as jml from tbl_informasi where jenis = '$x[id]' and desa like'$_GET[opt2]%'") or die(mysql_error());
	$d1=mysql_fetch_array($s1);
	echo"<td>$d1[jml]</td>";
	}
	echo"</tr>";
	echo"</table>";

?>
