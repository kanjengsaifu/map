<?php
include"koneksi.php";
$akhir = $_GET['akhir'];
$id=$_GET['username'];
if($akhir==1){
    $query = "SELECT * FROM tbl_informasi where desa LIKE('$id%') and jenis IN ($_GET[jnis]) ORDER BY id_info DESC LIMIT 1";
}else{
    $query = "SELECT * FROM tbl_informasi where desa like('$id%') and jenis IN ($_GET[jnis])";
}
$data = mysql_query($query);

$json = '{"wilayah": {';
$json .= '"petak":[ ';
while($x = mysql_fetch_array($data)){
    $q = mysql_query("select * from subkategori where id='$x[jenis]'");
    $d = mysql_fetch_array($q);
    $s = mysql_query("select * from kategori where id='$d[kategori]'");
    $d2 = mysql_fetch_array($s);
    
    $json .= '{';
    $json .= '"id":"'.$x['id'].'",
        "id_info":"'.htmlspecialchars($x['id_info']).'",
        "x":"'.$x['lat'].'",
        "y":"'.$x['lng'].'",
		"landmark":"'.$d2['id'].'",
		"status":"'.$x['status'].'",
        "jenis":"'.$x['jenis'].'",
		"gambar":"'.$x['gambar'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}}';
echo $json;

?>
