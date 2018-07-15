<?
include"koneksi.php";
echo"<h3 align=center>Sebaran Data Per Kategori</h3>";
  
	    echo"<table>";
		
  $q=mysql_query("Select * from kategori");

  echo"<tr><td><form action='' method=POST name=Myform id='myForm'>";
 echo "Kategori:</td><td> <select name='jenis' id='jenis' id='combobox' onChange=\"getDataz()\">";
 echo"<option value=''>--PIlih  Kategori--</option>";
	   	   while($kat=mysql_fetch_row($q)){
	      echo "<option value='$kat[0]'>$kat[1]</option>";
	   }
   echo "</select></form></td></tr></table><br>";

?>