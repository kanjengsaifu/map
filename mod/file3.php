<?php
include"../mod/koneksi.php";
   $a=$_GET['opt3'];
   
  $q=mysql_query("Select * from desa where id_kecamatan='$a'");
 echo '<select name="desa" id="desa">';
  echo'<option value="">-- Plih Desa --</option>';
	   	   while($kat=mysql_fetch_row($q)){
	      echo "<option value='$kat[0]'>$kat[2]</option>";
	   }
   echo '</select>';

?>
