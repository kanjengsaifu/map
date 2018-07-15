<?php
include"../mod/koneksi.php";
   $xa=$_GET['opt5'];
   $xb=$_GET['opt2'];
   $xz=$_GET['opt9'];
   $tipe = $_GET['tipe'];
   
   if($tipe == "prov"){
		$th = "Nama Kabupaten/Kota";
		$sql = mysql_query("select * from kabupaten where id_prov = '$xa' order by nama asc");
   }
   else if($tipe == "kab"){
		$th = "Nama Kecamatan";
		$sql = mysql_query("select * from kecamatan where id_kabupaten = '$xa' order by nama asc");
   }
   else if($tipe == "kec"){
		$th = "Nama Desa/Kelurahan";
		$sql = mysql_query("select * from desa where id_kecamatan = '$xa' order by nama asc");
   }
   else{
		$th = "Nama Provinsi";
		$sql = mysql_query("select * from provinsi order by nama asc");
   }
   $jumCol = 0;
?>
	<link rel="stylesheet" type="text/css" href="fixed-table/css/fixed_table_rc.css" />
<?php
	echo"<div align='right'><a href='mod/prinstatus.php?xa=$xa&xb=$xb&xz=$xz'><img src='img/excel.png'></a></div>";
        $no = 1;
       echo "<div class='table-container'>";
        echo "<table id='fixed-table' class='table table-striped table-bordered'>
                <thead>
                <tr>
                    <th>No.</th>
                    <th>$th</th>
					";
					$s = mysql_query("select * from tbstatuslahan order by id asc");
					$j = mysql_num_rows($s);
					$jumCol = $j;
					while($r = mysql_fetch_array($s)){
						 echo "<th colspan='2'>$r[namastatuslahan]</th>";
					}                    
                echo "</tr></thead><tbody>";
        while($d = mysql_fetch_array($sql)){
            echo "<tr>
                    <td>$no</td>
                    <td>$d[nama]</td>";
					$ss = mysql_query("select * from tbstatuslahan order by id asc");
					while($rr = mysql_fetch_array($ss)){
						$sd = mysql_query("select sum(luas) as jml from infostatus where status = '$rr[id]' and desa like '$d[id]%'order by id asc");
						$tt=mysql_fetch_array($sd);

						$qn=mysql_query("Select sum(luas) as jmal from infostatus where desa like '$d[id]%' ");     
						$rn=mysql_fetch_array($qn);
						
						$hsil=$tt[jml]/10000;
						$totk=$rn[jmal]/10000;
						$hasol=number_format($hsil,2,",",".");
						$persen=round(($hsil/$totk)*100,2);
						echo"<td>$hasol </td><td>$persen %</td>";
					}
                echo "</tr>";
            $no++;
        }
		echo"<tr><td colspan=2>Total</td>";
		$sss = mysql_query("select * from tbstatuslahan order by id asc");
		while($rrr = mysql_fetch_array($sss)){
			if($xa == undefined){
				$q=mysql_query("Select sum(luas) as jmil from infostatus where status ='$rrr[id]'");
			}
			else{
				$q=mysql_query("Select sum(luas) as jmil from infostatus where status ='$rrr[id]' and desa like '$xa%'");
			}
			$r=mysql_fetch_array($q);
			$tott=$r[jmil]/10000;
			$toti=number_format($tott,2,",",".");
			echo "<td colspan=2>$toti</td>";
		}
        echo "</tr></tbody></table>";
		echo "</div>";
?>
<script src="lib/js/jquery-1.9.1.min.js"></script>
<script src="fixed-table/js/fixed_table_rc.js"></script>
<script type="text/javascript">
var j = jQuery.noConflict();
j(document).ready(function(){
	 j('#fixed-table').fxdHdrCol({
		fixedCols:  2,
		width:     "100%",
		height:    400,
		colModal: [<?php
			for($i = 0;$i<($jumCol+2);$i++){
				$w = rand(70,150);
				if($i == 0){
					echo "{ width: 40, align: 'center' },";
				}
				else if($i == 1){
					echo "{ width: 120, align: 'left' },";
				}
				else{
					if($i != (($jumCol+2)-1)){
						echo "{ width: $w, align: 'center' },";
					}
					else{
						echo "{ width: $w, align: 'center' }";
					}
				}
			}
			?>]
	});
});
</script>