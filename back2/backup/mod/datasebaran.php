<?php
include"../mod/koneksi.php";
   $xa=$_GET['opt1'];
   $xb=$_GET['opt2'];
$pl=mysql_query("Select * from kabupaten where id='$xb'");
$rl=mysql_fetch_array($pl);
  echo"Kabupaten:$rl[nama]";
	$qa=mysql_query("Select * from kategori");

		$q=mysql_query("select * from kecamatan where id_kabupaten like'$xb%' order by nama asc");
	
	echo"<table class='table table-bordered'>";
	echo"<tr><td rowspan=2>No</td><td rowspan=2>Nama Kecamatan </td>";
	
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
	$w=mysql_query("select * from subkategori where kategori='$a'");
	while($x=mysql_fetch_array($w)){
	$s1 = mysql_query("select count(*) as jml from tbl_informasi where jenis = '$x[id]' and desa like'$xb%'") or die(mysql_error());
	$d1=mysql_fetch_array($s1);
	echo"<td>$d1[jml]</td>";
	}
	echo"</tr>";
	echo"</table>";

?>
