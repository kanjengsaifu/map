<?php
include"../mod/koneksi.php";
   $a=$_GET['opt3'];
  $q=mysql_query("Select * from desa where id_kecamatan='$a'");

  echo"<ul id=rdesa>";
	   	   while($kat=mysql_fetch_array($q)){
	      echo " <li><a href='#'>$kat[nama]</a></li>";
	   }
   echo "</ul>";

?>
