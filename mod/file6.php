<?php
include"../mod/koneksi.php";
   $a=$_GET['opt4'];
   
   
   $s = mysql_query("select * from profilekades where desa = '$a'");
    $d = mysql_fetch_array($s);
	if(!empty($d)){
  echo "<table width='100%'>
            <tr><td colspan='2' align='center'><img src='http://peta.klikdesa.com/fotokades/medium_$d[foto]'/></td></tr>
            <tr><td>Nama Kades/Lurah</td><td>: $d[namakades]</td></tr>
            <tr><td>Tempat & Tanggal Lahir</td><td>: $d[tmplahir], $d[tgllahir]</td></tr>
            <tr><td>Pendidikan. </td><td>: $d[pendidikan]</td></tr>
            <tr><td>Jabatan Ke</td><td>: $d[jabatanke]</td></tr>
            <tr><td>Masa Jabatan</td><td>: $d[awaljabatan] sd $d[akhirjabatan]</td></tr>
            <tr><td>Moto</td><td>: $d[moto]</td></tr>
            <tr><td>Motivasi</td><td>: $d[motivasi]</td></tr>
            <tr><td>Visi</td><td>: $d[visi]</td></tr>
            <tr><td>Program</td><td>: $d[program]</td></tr>
            <tr><td>Prestasi</td><td>: $d[prestasi]</td></tr>
            <tr><td>Organisasi Lain</td><td>: $d[organisasilain]</td></tr>
            </table>";
   
        }else{
		echo"<h3 align=center>Profile  belum dimasukan</h3>";
		
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