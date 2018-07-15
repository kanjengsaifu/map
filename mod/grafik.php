<?
include"koneksi.php";
echo"<h3 align=center>Grafik Sebaran Data Per Kategori</h3>";
  
	    echo"<table>";
		
  $q=mysql_query("Select * from kategori");

  echo"<tr><td><form action='' method=POST name=grafikform id='grafikform'>";
 echo "Kategori:</td><td> <select name='tipe' id='tipe' id='combobox' onChange=\"getGrafik()\">";
 echo"<option value=''>--PIlih  Kategori--</option>";
	   	   while($kat=mysql_fetch_row($q)){
	      echo "<option value='$kat[0]'>$kat[1]</option>";
	   }
   echo "</select></form></td></tr></table><br>";

?>