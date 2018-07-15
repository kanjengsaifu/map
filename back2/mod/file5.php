<?php
include"../mod/koneksi.php";
   $a=$_GET['opt4'];
    echo "<div style='margin-top:20px;'>";
    $s = mysql_query("select * from sosek where desa = '$a'");
    $d = mysql_fetch_array($s);
     $e = mysql_query("select * from demografi where desa = '$a'");
    $f = mysql_fetch_array($e);
	if(!empty($d)){
	     echo "<h2>Demografi Desa</h2>
            <table>
            <tr><td>Jumlah Penduduk</td><td>: $f[jmlpenduduk]</td></tr>
            <tr><td valign=top>Jumlah KK</td><td>: $f[jmlkk]</td></tr>
            <tr><td>Matapencaharian Utama</td><td>: $f[mata]</td></tr>
            <tr><td>Jumlah Hak Pilih</td><td>: $f[jmlhak]</td></tr>
            <tr><td>Kondisi Kependudukan Secara Umum</td><td>: $f[kondisi]</td></tr>
           
        </table>";
   echo "<h2>Keadaan Sosial Ekonomi Desa</h2>
            <table>
            <tr><td>Jumlah KK</td><td>: $d[jmlkk]</td></tr>
            <tr><td valign=top>Jumlah Yatim</td><td>: $d[jmlyatim]</td></tr>
            <tr><td>Lansia</td><td>: $d[lansia]</td></tr>
            <tr><td>Rutilahu</td><td>: $d[rutilahu]</td></tr>
            <tr><td>Terlantar</td><td>: $d[terlantar]</td></tr>
            <tr><td>KDRT</td><td>: $d[kdrt]</td></tr>
            <tr><td valign=top>Jumlah Raskin</td><td>: $d[raskin]</td></tr>
        </table>";
     $b =mysql_query("Select * from tipologi where desa ='$a'");
     $c =mysql_fetch_array($b);
       echo "<h2>Tipologi  Desa</h2>
            <table>
            <tr><td>Jenis Hamparan</td><td>: $c[jenishamparan]</td></tr>
            <tr><td valign=top>Terendah</td><td>: $c[terendah]</td></tr>
            <tr><td>Tertinggi</td><td>: $c[tertinggi]</td></tr>
            <tr><td>Topografi</td><td>: $c[topografi]</td></tr>
            <tr><td>Perkembangan Desa</td><td>: $c[perkembangandesa]</td></tr>
            <tr><td>Status</td><td>: $d[status]</td></tr>
            <tr><td valign=top>Aksesibilitas</td><td>: $c[aksesibilitas]</td></tr>
            <tr><td valign=top>Akses Belanja</td><td>: $c[aksesbelanja]</td></tr>
            <tr><td valign=top>Deskripsi</td><td>: $c[deskripsi]</td></tr>
        </table>";
	}else{
		echo"<h3 align=center>Profile belum dimasukan</h3>";
		
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