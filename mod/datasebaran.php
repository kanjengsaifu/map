<?php
include"../mod/koneksi.php";
   $xa=$_GET['opt1'];
   $xb=$_GET['opt2'];
   $xz=$_GET['opt9'];
	
	$jumCol = 0;
?>
	<link rel="stylesheet" type="text/css" href="fixed-table/css/fixed_table_rc.css" />
<?php
echo"<div align='right'><a href='mod/printsebaran.php?xa=$xa&xb=$xb&xz=$xz'><img src='img/excel.png'></a></div>
<div class='table-container'>";
	$qa=mysql_query("Select * from kategori");
	if($xz==99){
		
		$q=mysql_query("select * from kabupaten where id_prov like'$xb%' order by nama asc");
	
	echo"<table id='fixed-table'><thead>";
	echo"<tr><th rowspan=2>No</th><th rowspan=2>Nama Kabupaten/ Kota </th>";
	
	}
	
	elseif($xz==1){
		$q=mysql_query("select * from kecamatan where id_kabupaten like'$xb%' order by nama asc");
	
	echo"<table  id='fixed-table'><thead>";
	echo"<tr><th rowspan=2>No</th><th rowspan=2>Nama Kecamatan </th>";
		
	}
elseif($xz==2){
		$q=mysql_query("select * from desa where id_kecamatan like'$xb%' order by nama asc");
	
	echo"<table  id='fixed-table'><thead>";
	echo"<tr><th rowspan=2>No</th><th rowspan=2>Nama Desa/ Kelurahan </th>";
}elseif($xz==3){
	$q=mysql_query("select * from desa where id like'$xb%' order by nama asc");
	
	echo"<table  id='fixed-table'><thead>";
	echo"<tr><th rowspan=2>No</th><th rowspan=2>Nama Desa </th>";
	
}else{
	$q=mysql_query("select * from provinsi order by nama asc");
	
	echo"<table  id='fixed-table'><thead>";
	echo"<tr><th rowspan=2>No</th><th rowspan=2>Nama Provinsi </th>";
	
	
}
	$qq=mysql_query("select * from subkategori where kategori='$xa'");
	$zz=mysql_num_rows($qq);
	$jumCol = $zz;
	//echo"<th colspan=$zz align=center>Jumlah(Unit)</th><tr>";
	while($rr=mysql_fetch_array($qq)){
		echo"<th>$rr[namasub]</th>";
	}
	echo"</tr></thead><tbody>";
	$no=1;
	while($a=mysql_fetch_array($q)){
		
	echo"<tr><td>$no</td><td>";
	if($xz==99){
	echo"
	<a href=# onclick=\"FlipOtherCombo(this,'kab',$a[id])\">$a[nama]</a></td>";
	}elseif($xz==1){
	echo"
	<a href=# onclick=\"FlipOtherCombokec(this,'kec',$a[id])\">$a[nama]</a></td>";
		
	}elseif($xz==2){
			echo"
	<a href=# onclick=\"FlipOtherCombodesa(this,'desa',$a[id])\">$a[nama]</a></td>";
	}elseif($xz==3){
		echo"
	$a[nama]</td>";
	}else{
		
		echo"
	<a href=# onclick=\"FlipOtherComboprov(this,'prov',$a[id])\">$a[nama]</a></td>";
	}
	
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
	if($xb==undefined){
		$s1 = mysql_query("select count(*) as jml from tbl_informasi where jenis = '$x[id]' ") or die(mysql_error());
		
	}else{
		$s1 = mysql_query("select count(*) as jml from tbl_informasi where jenis = '$x[id]' and desa like'$_GET[opt2]%'") or die(mysql_error());
		
	}
	$d1=mysql_fetch_array($s1);
	echo"<td>$d1[jml]</td>";
	}
	echo"</tr></tbody>";
	echo"</table></div>";

?>
<script src="lib/js/jquery-1.9.1.min.js"></script>
<script src="fixed-table/js/fixed_table_rc.js"></script>
<script type="text/javascript">
var j = jQuery.noConflict();
j(document).ready(function(){
	 j('#fixed-table').fxdHdrCol({
		fixedCols:  2,
		width:     "100%",
		height:    400,
		colModal: [<?php
			for($i = 0;$i<($jumCol+2);$i++){
				$w = rand(70,150);
				if($i == 0){
					echo "{ width: 40, align: 'center' },";
				}
				else if($i == 1){
					echo "{ width: 120, align: 'left' },";
				}
				else{
					if($i != (($jumCol+2)-1)){
						echo "{ width: $w, align: 'center' },";
					}
					else{
						echo "{ width: $w, align: 'center' }";
					}
				}
			}
			?>]
	});
});
</script>