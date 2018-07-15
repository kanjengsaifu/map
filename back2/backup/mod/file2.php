<?php
include"../mod/koneksi.php";
   $a=$_GET['opt2'];
  $q=mysql_query("Select * from kecamatan where id_kabupaten='$a' order by nama asc");
  
 echo '<select name="kec" id="kec" onChange="getDesa()">';
  echo'<option value="">-- Plih Kecamatan --</option>';
	   	   while($kat=mysql_fetch_row($q)){
	      echo "<option value='$kat[0]'>$kat[2]</option>";
	   }
   echo '</select>';

?>
