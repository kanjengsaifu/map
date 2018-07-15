<?php
include"../mod/koneksi.php";
   $a=$_GET['opt4'];
    echo "<div style='margin-top:20px;'>";
    $s = mysql_query("select * from profile where desa = '$a'");
    $d = mysql_fetch_array($s);
	if(!empty($d)){
   echo "<table>
            <tr><td>Nama Desa</td><td>: $d[nama]</td></tr>
            <tr><td valign=top>Alamat</td><td>: $d[alamat]</td></tr>
            <tr><td>Luas</td><td>: $d[luas]</td></tr>
            <tr><td>Jumlah Penduduk</td><td>: $d[nama]</td></tr>
            <tr><td valign=top>Keterangan</td><td>: $d[keterangan]</td></tr>
        </table>";
	}else{
		echo"<h3 align=center>Profile desa belum dimasukan</h3>";
		
	}
        
    
 
?>
<style>
h2 button{
    background:#fff;
    border:1px solid #ccc;
    padding:5px;
    font-weight:normal;
    font-style:normal;
    font-size:0.7em;
}
</style>