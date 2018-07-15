
	<?php
	include"koneksi.php";
	echo"<table><tr>";
	 $jml_kolom=5;
   $cnt = 0;
$q=mysql_query("Select * from provinsi order by nama");
while($r=mysql_fetch_array($q)){
	 if ($cnt >= $jml_kolom) 
      {
          echo "</tr><tr>";
          $cnt = 0;
    }
 
    $cnt++;
	echo"<td style='padding-left:15px;'><a href=# onclick=\"FlipOtherComboprov(this,'prov',$r[id])\">$r[nama]</a></td>";
	
}
echo"</tr></table>";
	?>
	
