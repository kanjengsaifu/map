<?php
include"../mod/koneksi.php";
   $a=$_GET['opt4'];
   
   
   $s = mysql_query("select * from profile where desa = '$a'");
    $d = mysql_fetch_array($s);
	if(!empty($d)){
  echo "<table width='100%'>
            <tr><td colspan='2' align='center'><img src='http://peta.klikdesa.com/fotoprofile/small_$d[foto]'/></td></tr>
            <tr><td>Nama Kades/Lurah</td><td>: $d[namakepdes]</td></tr>
            <tr><td>Tempat & Tanggal Lahir</td><td>: $d[tempatlahir], $d[tgllahir]</td></tr>
            <tr><td>Telp. </td><td>: $d[telp]</td></tr>
            <tr><td>Email</td><td>: $d[email]</td></tr>
            </table>";
   
        }else{
		echo"<h3 align=center>Profile Kades/Lurah belum dimasukan</h3>";
		
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