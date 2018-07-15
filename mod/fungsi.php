<?php
function getData($val,$row,$table,$col){
    $sql = mysql_query("select * from $table where $row = '$val'");
    $d = mysql_fetch_array($sql);
    return $d[$col];
}
function getAllData($val,$row,$table){
    $sql = mysql_query("select * from $table where $row = '$val'");
    $d = mysql_fetch_array($sql);
    return $d;
}
function validStr($str){
    return trim(mysql_real_escape_string(stripcslashes($str)));
}
function getStatusDesa($id){
	$sql = mysql_query("select * from profilekades where desa = '$id'");
	$d = mysql_fetch_array($sql);
	if($d['status'] == 'Kelurahan'){
		$status = "Kelurahan";
	}
	else{
		$status = "Desa";
	}
	return $status;
}
function rp($angka)
{
  $rp = number_format($angka,0,'.',',');
  return $rp;
}
function getStatus($s){
    if($s == 0){
        $status = "<span class='label label-default'>Tunggu<span>";
    }
    else if($s == 1){
        $status = "<span class='label label-primary'>Proses</span>";
    }
    else{
        $status = "<span class='label label-success'>Selesai</span>";
    }
    return $status;
}
function indoTgl($tgl){
	$tanggal = explode("-",$tgl);
	$tg = $tanggal[2];
	$bl = $tanggal[1];
	$th = $tanggal[0];
	
    switch($bl)
    {
        case '01' : $bulan="Januari";break;
        case '02' : $bulan="Februari";break;
        case '03' : $bulan="Maret";break;
        case '04' : $bulan="April";break;
        case '05' : $bulan="Mei";break;
        case '06' : $bulan="Juni";break;
        case '07' : $bulan="Juli";break;
        case '08' : $bulan="Agustus";break;
        case '09' : $bulan="September";break;
        case '10' : $bulan="Oktober";break;
        case '11' : $bulan="November";break;
        case '12' : $bulan="Desember";break;
    }
    return $tg." ".$bulan." ".$th;
}
function insert($table,$data){
    $jml = sizeof($data);
    $i = 1;
    $sql = "INSERT INTO $table(";
    foreach($data as $key=>$val){
        if($i == $jml){
            $sql.="$key";
        }
        else{
            $sql.="$key,";
        }
        $i++;
    }
    $sql.=") VALUES(";
    $j = 1;
    foreach($data as $key=>$val){
        if($j == $jml){
            $sql.="'".validStr($val)."'";
        }
        else{
            $sql.="'".validStr($val)."',";
        }
        $j++;
    }
    $sql.=")";
    $q = mysql_query($sql);
    if($q)return 1;
    else return 0;
}
function update($table,$data,$id,$col){
    $jml = sizeof($data);
    $i = 1;
    $sql = "UPDATE $table SET ";
    foreach($data as $key=>$val){
        if($i == $jml){
            $sql.="$key = '".validStr($val)."'";
        }
        else{
            $sql.="$key = '".validStr($val)."',";
        }
        $i++;
    }
    $sql.= " WHERE $col = '$id'";
    $q = mysql_query($sql);
    if($q)return 1;
    else return 0;
}
function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save file
	imagejpeg($image, $destination_url, $quality);
 
	//return destination file
	return $destination_url;
}
?>