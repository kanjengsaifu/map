<?php
include"../mod/koneksi.php";
$xa=$_GET['xa'];
   $xb=$_GET['xb'];
   $xz=$_GET['xz'];

 header("Content-type: application/vnd.ms-excell");
	header("Expires: 0");
	header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment;Filename=datastatuslahan.xls");
        $no = 1;
        echo "<h2>Rekapitulasi Data Status Lahan</h2>";
		
        echo "<table id='stable' border='1' class='table table-hover table-bordered'>
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Status Lahan</th>
                     <th>Jumlah (Ha)</th>
                    
                </tr></thead>";
        $s = mysql_query("select * from tbstatuslahan order by id asc");
        while($d = mysql_fetch_array($s)){
            echo "<tr>
                    <td>$no</td>
                    <td>$d[namastatuslahan]</td>";
					        
			$sd = mysql_query("select sum(luas) as jml from infostatus where status= '$d[id]' and desa like '$xa%'order by id asc");
$tt=mysql_fetch_array($sd);
 $qn=mysql_query("Select sum(luas) as jmal from infostatus where desa like '$xa%' ");
		$rn=mysql_fetch_array($qn);
$hsil=$tt[jml]/10000;
$totk=$rn[jmal]/10000;
$hasol=number_format($hsil,2,",",".");
$persen=round(($hsil/$totk)*100,2);
					echo"<td>$hasol ($persen %)</td>
                    
                </tr>";
            $no++;
        } 
        $q=mysql_query("Select sum(luas) as jmil from infostatus where desa like '$xa%' ");
		$r=mysql_fetch_array($q);
		$tott=round($r[jmil]/10000,2);
echo"<tr><td colspan=2>Total</td><td>$tott</td></tr>";		
        echo "</table>";
 
    echo "</div>";

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