<?
include"koneksi.php";
include"fungsi.php";
session_start();
$g=$_GET['g'];
	header("Content-type: application/vnd.ms-excell");
	header("Expires: 0");
	header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment;Filename=rekap.xls");
if($g=="ependuduk"){
			       echo "<h3>Rekap  Penduduk </h3>";
			
		echo"<table border=1>
		<tr align=center><td>No</td><td>NIK</td><td>Nama</td>
		<td>Tmp Lahir</td><td>Tgl Lahir</td><td>Jk</td><td>Gol Drh</td>
		<td>Agama</td><td>Status Kawin</td><td>Pendidikan</td><td>Pekerjaan</td>
		<td>Hub Klg</td><td>Kewarganegaraan</td><td>Ibu</td><td>Ayah</td>
		<td>Alamat</td>
		<td>Status</td>
				</tr>
		<tr align=center>
		<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td>
		<td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td>
		<td>15</td><td>16</td><td>17</td>
		</tr>";
		$no=1;
		if($_GET['rw']=='all'){
		$q9=mysql_query("select * from kk where id_desa='$_SESSION[iddesa]'");
		}else{
		$q9=mysql_query("select * from kk where rw='$_GET[rw]' and id_desa='$_SESSION[iddesa]'");
		}
		while($r9=mysql_fetch_array($q9)){
			
		
	
		
     $q=mysql_query("Select * from penduduk where id_kk='$r9[id]' and keberadaan !='3'")or die(mysql_error());
	while($r=mysql_fetch_array($q)){
	 	$kr=mysql_num_rows($q);
	echo"<tr>
	<td>$no</td><td>'$r[nik]</td><td>$r[nama]</td><td>$r[tmp_lhr]</td>
	<td>$r[tgl_lhr]</td><td>".cek('jk',$r[jk])."</td><td>".cek('gol_drh',$r[gol_drh])."</td>
	<td>".cek('agama',$r[agama])."</td><td>".cek('status_kawin',$r[status_kawin])."</td><td>".cek('pendidikan',$r[pendidikan])."</td>
	<td>".cek('pekerjaan',$r[pekerjaan])."</td><td>".cek('hub_klg',$r[hub_klg])."</td><td>".cek('wrg_ngr',$r[wrg_ngr])."</td>
	<td>$r[ibu]</td><td>$r[ayah]</td><td>";
		$hk=mysql_query("Select * from kk where id='$r[id_kk]'");
		$hr=mysql_fetch_array($hk);

	echo"$hr[alamat] RW.$hr[rw]/RT.$hr[rt]</td><td>";
	$bg=mysql_query("Select * from keberadaan where id='$r[keberadaan]'");
	$bnm=mysql_fetch_array($bg);

	echo"$bnm[nama]
	</td>
		</tr>";
	 
	$no++;}
		}
	echo"</table>";
    }
	else if($g == "sd"){
            echo "<h3>Rekap  Penduduk Usia SD </h3>";
			
		echo"<table border=1><tr><td>No</td><td>NIK</td><td>Nama</td><td>Tmp Lahir</td><td>Tgl Lahir</td><td>Ayah</td><td>Ibu</td><td>Alamat</td></tr>";
		$no=1;
		$tgl1=date("Y-m-d");
		$tt=explode("-",$tgl1);
		$tgl2=$tt[0]-7;
		$tgl3=$tt[0]-12;
		$hsl1=$tgl2."-".$tt[1]."-".$tt[2];
		$hsl2=$tgl3."-".$tt[1]."-".$tt[2];
		$hsl3=date("$hsl1");
		$hsl4=date("$hsl2");
		if($_GET['rw']=='all'){
		$q9=mysql_query("select * from kk where id_desa='$_SESSION[iddesa]'");
		}else{
		$q9=mysql_query("select * from kk where rw='$_GET[rw]' and id_desa='$_SESSION[iddesa]'");
		}
		while($r9=mysql_fetch_array($q9)){
     $q=mysql_query("Select * from penduduk where tgl_lhr<='$hsl3' and tgl_lhr >='$hsl4' and keberadaan='1' and id_kk='$r9[id]'")or die(mysql_error());
	while($r=mysql_fetch_array($q)){
	 	
	echo"<tr><td>$no</td><td>'$r[nik]</td><td>$r[nama]</td><td>$r[tmp_lhr]</td><td>$r[tgl_lhr]</td><td>$r[ayah]</td><td>$r[ibu]</td><td>$r9[alamat] RW.$r9[rw]/RT.$r9[rt]</td></tr>";
	 
	$no++;
		}}
	echo"</table>";
	}
	else if($g == "sltp"){
       echo "<h3>Rekap  Penduduk Usia SLTP </h3>";
				echo"<table border=1><tr><td>No</td><td>NIK</td><td>Nama</td><td>Tmp Lahir</td><td>Tgl Lahir</td><td>Ayah</td><td>Ibu</td><td>Alamat</td></tr>";
		$no=1;
		$tgl1=date("Y-m-d");
		$tt=explode("-",$tgl1);
		$tgl2=$tt[0]-15;
		$tgl3=$tt[0]-12;
		$hsl1=$tgl2."-".$tt[1]."-".$tt[2];
		$hsl2=$tgl3."-".$tt[1]."-".$tt[2];
		$hsl3=date("$hsl1");
		$hsl4=date("$hsl2");
	if($_GET['rw']=='all'){
		$q9=mysql_query("select * from kk where id_desa='$_SESSION[iddesa]'");
		}else{
		$q9=mysql_query("select * from kk where rw='$_GET[rw]' and id_desa='$_SESSION[iddesa]'");
		}
		while($r9=mysql_fetch_array($q9)){
     $q=mysql_query("Select * from penduduk where id_kk='$r9[id]' and tgl_lhr <='$hsl4' AND tgl_lhr >='$hsl3' and keberadaan='1'")or die(mysql_error());
	while($r=mysql_fetch_array($q)){
	 	
	echo"<tr><td>$no</td><td>$r[nik]</td><td>$r[nama]</td><td>$r[tmp_lhr]</td><td>$r[tgl_lhr]</td><td>$r[ayah]</td><td>$r[ibu]</td><td>$r9[alamat] RW.$r9[rw]/RT.$r9[rt]</td></tr>";
	 
	$no++;
		}}
	echo"</table>";
    }
	else if($g == "slta"){
        echo "<h3>Rekap  Penduduk Usia SLTA </h3>";
				echo"<table border=1><tr><td>No</td><td>NIK</td><td>Nama</td><td>Tmp Lahir</td><td>Tgl Lahir</td><td>Ayah</td><td>Ibu</td></tr>";
		$no=1;
		$tgl1=date("Y-m-d");
		$tt=explode("-",$tgl1);
		$tgl2=$tt[0]-15;
		$tgl3=$tt[0]-18;
		$hsl1=$tgl2."-".$tt[1]."-".$tt[2];
		$hsl2=$tgl3."-".$tt[1]."-".$tt[2];
		$hsl3=date("$hsl1");
		$hsl4=date("$hsl2");
	if($_GET['rw']=='all'){
		$q9=mysql_query("select * from kk where id_desa='$_SESSION[iddesa]'");
		}else{
		$q9=mysql_query("select * from kk where rw='$_GET[rw]' and id_desa='$_SESSION[iddesa]'");
		}
		while($r9=mysql_fetch_array($q9)){
     $q=mysql_query("Select * from penduduk where id_kk='$r9[id]' and tgl_lhr <='$hsl3' AND tgl_lhr >='$hsl4' and keberadaan='1'")or die(mysql_error());
	while($r=mysql_fetch_array($q)){
	 	
	echo"<tr><td>$no</td><td>'$r[nik]</td><td>$r[nama]</td><td>$r[tmp_lhr]</td><td>$r[tgl_lhr]</td><td>$r[ayah]</td><td>$r[ibu]</td></tr>";
	 
	$no++;
		}}
	echo"</table>";
    }
	
	else if($g == "hak"){
         echo "<h3>Rekap  Penduduk Berdasarkan Hak Pilih </h3>";
		echo"<table border=1><tr><td>No</td><td>NIK</td><td>Nama</td><td>Tmp Lahir</td><td>Tgl Lahir</td><td>Ayah</td><td>Ibu</td><td>Alamat</td></tr>";
		$no=1;
		$tgl1=date("Y-m-d");
		$tt=explode("-",$tgl1);
		$tgl3=$tt[0]-17;
		
		$hsl2=$tgl3."-".$tt[1]."-".$tt[2];
		$hsl5=date("$hsl2");
		if($_GET['rw']=='all'){
		$q9=mysql_query("select * from kk where id_desa='$_SESSION[iddesa]'");
		}else{
		$q9=mysql_query("select * from kk where rw='$_GET[rw]' and id_desa='$_SESSION[iddesa]'");
		}
		while($r9=mysql_fetch_array($q9)){
     $q=mysql_query("Select * from penduduk where id_kk='$r9[id]' and tgl_lhr <= '$hsl5' and keberadaan='1'")or die(mysql_error());
	while($r=mysql_fetch_array($q)){
	 	
	echo"<tr><td>$no</td><td>'$r[nik]</td><td>$r[nama]</td><td>$r[tmp_lhr]</td><td>$r[tgl_lhr]</td><td>$r[ayah]</td><td>$r[ibu]</td><td>$r9[alamat] RW.$r9[rw]/RT.$r9[rt]</td></tr>";
	 
	$no++;
		}}
	echo"</table>";
    }
	else if($g == "srt"){
		echo "<h3>Rekap  Surat Keluar </h3>";
				
		echo"<table border=1>
		<tr align=center><td>No</td><td>Jenis Surat</td><td>Nomor Surat</td><td>Nama</td>
		<td>alamat</td><td>Tanggal Surat</td>
				</tr>
		";
		$no=1;
		$tgl1=$_GET['tgl1'];
		$tgl2=$_GET['tgl2'];
		if($tgl1=='' and $tgl2=''){
     $q=mysql_query("Select * from temp_srt")or die(mysql_error());
		}else{
     $q=mysql_query("Select * from temp_srt where tglsrt >= '$tgl1' and tglsrt <= '$tgl2'")or die(mysql_error());
		}
	while($r=mysql_fetch_array($q)){
	 	
	echo"<tr>
	<td>$no</td><td>";
	$qq=mysql_query("Select * from jns_sk where id='$r[id_jns]'");
	$rr=mysql_fetch_array($qq);
	
	echo"$rr[nama]</td><td>$r[nosrt]</td><td>";
	if($r[id_jns]==1){
	echo"$r[nama]";
	}else{
		$qt=mysql_query("Select * from penduduk where nik='$r[nama]'");
		$rq=mysql_fetch_array($qt);
		$hk=mysql_query("Select * from kk where id='$rq[id_kk]'");
		$hr=mysql_fetch_array($hk);
		echo"$rq[nama]";
	}
	echo"</td><td>$hr[alamat] RW.$hr[rw]/RT.$hr[rt]</td>
	<td>$r[tglsrt]</td>
	
	
	
	</tr>";
	 
	$no++;
	}
	echo"</table>";
	}

?>