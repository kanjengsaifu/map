
<?php
include"../mod/koneksi.php";
   $a=$_GET['opt1'];
  $q=mysql_query("Select * from kabupaten where id_prov='$a'");
 echo '<select name="kab" id="kab" onChange="getKecamatan()">';
 echo'<option value="">-- Plih Kabupaten --</option>';
	   	   while($kat=mysql_fetch_row($q)){
	      echo "<option value='$kat[0]'>$kat[2]</option>";
	   }
   echo '</select>';

?>
