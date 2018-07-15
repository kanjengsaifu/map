<style>
#kop{
padding:10px;
background:#fff;
border-top:0px;
text-align:center;
}

#logo{float:left;}

#header{
padding:10px;
background:#fff;
border:1px solid #333;
}
</style>
<?
include"koneksi.php";
include"fungsi.php";
session_start();
$d=$_GET['id'];$nosur=$_GET['nosur'];
$nokk=$_GET['nokk'];
$nik=$_GET['nik'];
$hgt=mysql_query("select * from jns_sk where id='$d'");
$rgh=mysql_fetch_array($hgt);
if($d==99){
$strgh="biodata";
}elseif($d==98){
$strgh="kartukeluarga";
}else{

$strgh = str_replace(' ', '_', $rgh['nama']);

}	header("Content-type: application/vnd.ms-word");
	header("Expires: 0");
	header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment;Filename=$strgh.doc");

$tt=mysql_query("select * from kabupaten where id='$_SESSION[idkab]'");
$ty=mysql_fetch_array($tt);
echo"
<div id=kop>
	<div id=logo><img src='http://simades.klikdesa.com/img/logo/$ty[logo]' width='80' height='80'></div>
	<h3><b>PEMERINTAH KABUPATEN ".strtoupper($_SESSION[nmkab])."<br>
	KECAMATAN ".strtoupper($_SESSION[nmkec])."<br>
	DESA ".strtoupper($_SESSION[nmdesa])."<br></b></h3>
	ALAMAT:$_SESSION[alamatdesa] Telp. $_SESSION[notelp] Kode Pos.61175<br>
	Email:$_SESSION[email] 
</div>";





if($d==1){
	?>
	<style>
	#kop{
		visibility: hidden;
	}
	
	</style>
	<?
	$q=mysql_query("Select * from surat_kelahiran where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
echo"<table border=1 align=center >
<tr><td>
<p align=center style='margin-top:-80px;'>UNTUK ARSIP DESA/KELURAHAN</p><br><br>
<div align=center><h3><u><b>SURAT KELAHIRAN</u></b></h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertandatangan dibawah ini, menerangkan bahwa pada:</div>
<table>
<tr><td>Hari</td><td>: $r[hari]</td></tr>
<tr><td>Tanggal</td><td>: $r[pukul]</td></tr>
<tr><td>Di</td><td>: $r[tmp_salin]</td></tr>
<tr><td>Telah Lahir Seorang Anak</td><td>: ".cek('jk',$r[jk])."</td></tr>

<tr><td>Bernama</td><td>: $r[nama_lahir]</td></tr>";
$qq=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='2'");
$rr=mysql_fetch_array($qq);
echo"
<tr><td>Dari Seorang Ibu Bernama</td><td>: $rr[nama]</td></tr>";
$qqq=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$rrr=mysql_fetch_array($qqq);

$q1=mysql_query("Select * from kk where id='$r[id_kk]'");
$r1=mysql_fetch_array($q1);
echo"
<tr><td>Alamat</td><td>: $r1[alamat],RW $r1[rw] / RT $r1[rt]</td></tr>";
echo"
<tr><td>Istri dari</td><td>: $rrr[nama]</td></tr>

</table>
<p>Surat keterangan ini di buat atas dasar yang sebenarnya.</p>
<p> Yang melaporkan:<b> $rrr[nama]</b><br.</p>
<p>Hubungan dengan bayi: <b>Ayah Kandung</b><br></p>
";
echo"
<table align=center>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt_kelr])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
</td><td>
<p align=center >UNTUK ARSIP KECAMATAN</p><br><br>
<div align=center><h3><u><b>SURAT KELAHIRAN</b></u></h3></div>
<div align=center><h3>NO.$r[no_srt]</h3></div>

<table>
<tr><td>1. Nama Lengkap</td><td>: $r[nama_lahir]</td></tr>
<tr><td>2. Jenis Kelamin</td><td>: ".cek('jk',$r[jk])."</td></tr>
<tr><td>3. Tanggal Kelahiran</td><td>: $r[pukul]</td></tr>
<tr><td>4. Kelahiran</td><td>: $r[jns_kelahiran]</td></tr>
<tr><td>Anake</td><td>: $r[anake]</td></tr>
<tr><td>5. Tempat Kelahiran</td><td>: $r[tmp_salin]</td></tr>
<tr><td>6. Penolong Kelahiran</td><td>: Dokter /Bidan</td></tr>
<tr><td colspan=2><hr></td></tr>

<tr><td colspan=2 align=center><u><b>I B U</b></u></td></tr>
";
$q1=mysql_query("Select * from kk where id='$r[id_kk]'");
$r1=mysql_fetch_array($q1);
$qq=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='2'");
$rr=mysql_fetch_array($qq);
echo"
<tr><td>7. Nama Lengkap</td><td>: $rr[nama]</td></tr>
<tr><td>8. Alamat</td><td>: $r1[alamat],RW $r1[rw] / RT $r1[rt]</td></tr>
<tr><td>9. Tanggal Lahir</td><td>: $rr[tmp_lhr],$rr[tgl_lhr]</td></tr>
<tr><td>10. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$rr[wrg_ngr])."</td></tr>";
$qqq=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$rrr=mysql_fetch_array($qqq);
echo"
<tr><td colspan=2 align=center><u><b>A Y A H </b></u></td></tr>
<tr><td>11. Nama Lengkap</td><td>: $rrr[nama]</td></tr>
<tr><td>12. Tanggal Lahir</td><td>: $rrr[tmp_lhr],$rrr[tgl_lhr]</td></tr>
<tr><td>13. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$rrr[wrg_ngr])."</td></tr>
<tr><td>14. NO. KK</td><td>: $r1[no_kk]</td></tr>";

echo"

</table>
";
echo"
<table align=center>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt_kelr])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
</td><td>
<p align=center style='margin-top:-150px;'>UNTUK YANG BERSANGKUTAN</p><br><br>
<div align=center><h3><u><b>SURAT KELAHIRAN</b></u></h3></div>
<div align=center><h3>NO.$r[no_srt]</h3></div>

<div>Yang bertandatangan dibawah ini, menerangkan bahwa pada:</div>
<table>
<tr><td>Hari</td><td>: $r[hari]</td></tr>
<tr><td>Tanggal</td><td>: $r[pukul]</td></tr>
<tr><td>Di</td><td>: $r[tmp_salin]</td></tr>
<tr><td>Telah Lahir Seorang Anak</td><td>: ".cek('jk',$r[jk])."</td></tr>

<tr><td>Bernama</td><td>: $r[nama_lahir]</td></tr>";
$qq=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='2'");
$rr=mysql_fetch_array($qq);
echo"
<tr><td>Dari Seorang Ibu Bernama</td><td>: $rr[nama]</td></tr>";
$qqq=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$rrr=mysql_fetch_array($qqq);

$q1=mysql_query("Select * from kk where id='$r[id_kk]'");
$r1=mysql_fetch_array($q1);
echo"
<tr><td>Alamat</td><td>: $r1[alamat],RW $r1[rw] / RT $r1[rt]</td></tr>";
echo"
<tr><td>Istri dari</td><td>: $rrr[nama]</td></tr>

</table>
<p>Surat keterangan ini di buat atas dasar yang sebenarnya.</p>
";
echo"
<table align=center>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt_kelr])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
</td>


</tr>

</table>

";
}elseif($d==2){
		$q=mysql_query("Select * from surat_pindah where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
$zz=count(explode(",",$r[pengikut]));
	echo"
<div align=center><h3>SURAT KETERANGAN PINDAH</h3></div>
<div align=center><h3><u>$r[klasifikasi]</u></h3></div>
<div align=center><h3>No.$r[no_srt]</h3><br><br></div>

<table>
<tr><td>1. NIK</td><td>: $r2[nik]</td></tr>
<tr><td>2. Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>3. Nomor Kartu Keluarga</td><td>: $r3[no_kk]</td></tr>
<tr><td>4. Nama Kepala Keluarga</td><td>: $r4[nama]</td></tr>
<tr><td>5. Alamat Sekarang</td><td>: $r3[alamat] RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>6. Alamat Tujuan Pindah</td><td>: $r[pindahke]</td></tr>
<tr><td>7. Jumlah Keluarga Yang Pindah</td><td>: $zz</td></tr>
</table>
";



echo"
<p align=justify>Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir.
Demikian surat pengantar Pindah ini dibuat agar digunakan sebagaimana mestinya</p>


";
echo"
<table border=1 width=100%>
<tr><td>No</td><td>NIK</td><td>Nama</td></tr>
";


$nk=1;
for ($x = 0; $x < $zz; $x++) {
	$xx=explode(",",$r[pengikut]);
	$kl=mysql_query("Select * from penduduk where id='$xx[$x]'");
	$pl=mysql_fetch_array($kl);
	echo"<tr><td>$nk</td><td>$pl[nik]</td><td>$pl[nama]</td></tr>";
	$nk++;
}
echo"
</table>";
echo"<br><br>
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
<p>Keterangan:</p>
<p>Surat Pengantar ini dibawah oleh pemohon dan diarsipkan di kecamatan</p>

";
}elseif($d==3){
	?>
	<style>
	#kop{
		visibility: hidden;
	}
	
	</style>
	<?
$q=mysql_query("Select * from surat_kematian where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
$ex=explode('-',$r2[tgl_lhr]);
$ex1=explode('-',$r[tgl_kematian]);
$harilahir=gregoriantojd($ex[1],$ex[2],$ex[0]);
$hariini=gregoriantojd($ex1[1],$ex1[2],$ex1[0]);
$tumur=$hariini-$harilahir;
$umur=$tumur/365;
echo"<table border=1>";
echo"<tr><td><p align=center style='margin-top:-0px;'>UNTUK ARSIP DESA/KELURAHAN</p><br><br>";

	echo"<div align=center><h3><u><b>SURAT KEMATIAN</u></b></h3></div>
<div align=center><h3>NO.$r[no_srt]</h3></div>
<div>Yang bertandatangan dibawah ini :</div>
<table>
<tr><td>Nama </td><td>: $r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>

<tr><td>Alamat</td><td>: $r3[alamat] RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>Umur</td><td>: ".floor($umur)." Tahun</td></tr>

";

echo"

<tr><td colspan=2>Telah Meninggal Pada:</td></tr>
<tr><td>Hari</td><td>: $r[hari]</td></tr>
<tr><td>Tanggal</td><td>: ".indotgl($r[tgl_kematian])."</td></tr>
<tr><td>Di</td><td>: $r[tmp_kematian]</td></tr>
<tr><td>Di Sebabkan Karena</td><td>: $r[sebab]</td></tr>
</table>
<p>Surat keterangan ini di buat atas dasar yang sebenarnya.</p>
<p>Nama Yang Melaporkan:</p>
<p>Hubungan dengan yang mati:</p>


";
echo"
<table align=center>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td align=center><b><u>$_SESSION[kpldesa]</b></u></td></tr>
<tr><td align=center><b><u>$_SESSION[nipkpldesa]</b></u></td></tr>
</table>

";
echo"</td><td>";
echo"<p align=center style='margin-top:-5px;'>UNTUK ARSIP KECAMATAN</p><br><br>";

	echo"<div align=center><h3><u><b>SURAT  KEMATIAN</u></b></h3></div>
<div align=center><h3>NO.$r[no_srt]</h3></div>

<table>
<tr><td>1. Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>2. Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>3. Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>4. Dilahirkan</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>5. Tanggal Kematian</td><td>: ".indotgl($r[tgl_kematian])."</td></tr>
<tr><td>6. Umur pada saat kematian</td><td>: ".floor($umur)." Tahun</td></tr>
<tr><td>7. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>8. Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>9. Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>10.Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>11.Tempat kematian</td><td>: $r[tmp_kematian]</td></tr>
<tr><td>12.Sebab kematian</td><td>: $r[sebab]</td></tr>
<tr><td>13.No. Kartu Keluarga</td><td>: $r3[no_kk]</td></tr>
<tr><td>   No. KTP</td><td>: $r[nik]</td></tr>
";

echo"
</table>";
echo"<br>
<table align=center>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td align=center><b><u>$_SESSION[kpldesa]</u></b></td></tr>
<tr><td align=center><b><u>$_SESSION[nipkpldesa]</u></b></td></tr>
</table>
";
echo"</td><td>";
echo"<p align=center style='margin-top:-20px;'>UNTUK YANG BERSANGKUTAN</p><br><br>";

	echo"<div align=center><h3><u><b>SURAT KEMATIAN</u></b></h3></div>
<div align=center><h3>NO.$r[no_srt]</h3></div>
<div>Yang bertandatangan dibawah ini :</div>
<table>
<tr><td>Nama </td><td>: $r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>Umur</td><td>: ".floor($umur)." Tahun</td></tr>

";

echo"

<tr><td colspan=2>Telah Meninggal Pada:</td></tr>
<tr><td>Hari</td><td>: $r[hari]</td></tr>
<tr><td>Tanggal</td><td>: ".indotgl($r[tgl_kematian])."</td></tr>
<tr><td>Di</td><td>: $r[tmp_kematian]</td></tr>
<tr><td>Di Sebabkan Karena</td><td>: $r[sebab]</td></tr>
</table>
<p>Surat keterangan ini di buat atas dasar yang sebenarnya.</p>
";
echo"<br><br>
<table align=center>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td align=center><b><u>$_SESSION[kpldesa]</u></b></td></tr>
<tr><td align=center><b><u>$_SESSION[nipkpldesa]</u></b></td></tr>
</table>
";
echo"</td></tr></table>";
}elseif($d==4){
$q=mysql_query("Select * from surat_domisili where no_srt='$nosur'");
$r=mysql_fetch_array($q);
$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	echo"<div align=center><h3><u>SURAT KETERANGAN DOMISILI</u></h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertandatangan dibawah ini:</div>
<table>
<tr><td>Nama Lengkap</td><td>:$_SESSION[kpldesa]</td></tr>
<tr><td>Jabatan</td><td>: Kepala Desa</td></tr>

";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
</table>
<p>Menerangkan dengan sebenar-benarnya bahwa:</p>
<p align=center><b>$r[tujuan]</b> Berdomisili:</p>
<p>Di $r3[alamat]  RW $r3[rw] / RT $r3[rt]</p>

<p align=justify>Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat di pergunakan sebagaimana mestinya.</p>";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";

}elseif($d==21){
$q=mysql_query("Select * from surat_domisiliorang where no_srt='$nosur'");
$r=mysql_fetch_array($q);
$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	echo"<div align=center><h3><u><b>SURAT KETERANGAN DOMISILI</u></b></h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertandatangan dibawah ini:</div>
<table>
<tr><td>Nama Lengkap</td><td>:$_SESSION[kpldesa]</td></tr>
<tr><td>Jabatan</td><td>: Kepala Desa</td></tr>
</table>
<div>Menerangkan bahwa :</div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>Status Perkawinan</td><td>:".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Pendidikan</td><td>:".cek('pendidikan',$r2[pendidikan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"

<tr><td>No KTP/NIK</td><td>:$r2[nik]</td></tr>
<tr><td>Keperluan</td><td>:$r[tujuan]</td></tr>
</table>
<p>Menerangkan dengan sebenar-benarnya bahwa:</p>
<p align=left><b>$r2[nama]</b> Berdomisili:</p>
<p>Di $r3[alamat]  RW $r3[rw] / RT $r3[rt]</p>

<p align=justify>Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat di pergunakan sebagaimana mestinya.</p>";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td><u><b>$_SESSION[kpldesa]</b></u></td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";

}

elseif($d==5){
$q=mysql_query("Select * from surat_keramaian where no_srt='$nosur'");
$r=mysql_fetch_array($q);
$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
	echo"<div align=center><h3>SURAT KETERANGAN IZIN HAJATAN</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama </td><td>: $r2[nama]</td></tr>
<tr><td>Tempat/ Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>NIK</td><td>: $r2[nik]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Warga Negara</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Maksud/Tujuan</td><td>: $r[tujuan]</td></tr>
<tr><td>Hari/Tanggal</td><td>: $r[hari] (".indotgl($r[tglacara]).")</td></tr>
<tr><td>Hiburan</td><td>: $r[hiburan]</td></tr>
<tr><td>Batas Waktu</td><td>: $r[batas]</td></tr>
<tr><td>Alamat</td><td>: $r[alamat]</td></tr>
<tr><td>Keterangan</td><td>:<table>

<tr><td>1. Dapat Menjaga Keamanan Lingkungan</td></tr>
<tr><td>2. Dilarang Mengadakan Perjudian</td></tr>
<tr><td>3. Menghentikan Pengeras suara waktu sholat</td></tr>
<tr><td>4. Menghindari Pemborosan</td></tr>


</table></td></tr>
";

echo"



</table>
<p>Demikian Surat Keterangan Izin Hajatan ini kami buat dengan sebenarnya untuk dapat dipergunakan seperlunya</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==6){
$q=mysql_query("Select * from surat_ahliwaris where no_srt='$nosur'");
$r=mysql_fetch_array($q);
$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN AHLI WARIS</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, ".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Pendidikan</td><td>: ".cek('pendidikan',$r2[pendidikan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>No KTP/NIK</td><td>: $r2[nik]</td></tr>
</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------------Ahli Waris-------------</b></p>
<p align=justify>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p align=justify>Yang bersangkutan tersebut di atas memang benar salah seorang warga Masyarakat ".dessa()."  kami yang tinggal secara menetap di alamat seperti tersebut di atas dan AHLI WARIS dari $r[sebab] </p>
<p align=justify>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==7){
$q=mysql_query("Select * from surat_usaha where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
	echo"<div align=center><h3>SURAT KETERANGAN USAHA</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>No NIK</td><td>: $r2[nik]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Warga Negara</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Jenis Usaha</td><td>: $r[bidang]</td></tr>
<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
";

echo"


</table>
<p align=justify>Nama tersebut diatas adalah benar warga ".dessa()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab]. Dan benar ianya mempunyai Usaha dibidang $r[bidang] yang berlokasi di $r3[alamat].</p>



<p align=justify>Demikian surat keterangan usaha ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==9){
$q=mysql_query("Select * from surat_sktm where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN </h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, ".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>

";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);

echo"
<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>No KTP/NIK</td><td>: $r2[nik]</td></tr>
</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------------TIDAK MAMPU-------------</b></p>
<p>Yang akan dipergunakan untuk :</p>
<p>$r[tujuan]</p>
<p align=justify>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p align=justify>Yang bersangkutan tersebut di atas memang benar salah seorang warga Masyarakat ".dessa()."  kami yang tinggal secara menetap di alamat tersebut diatas, dan tergolong masyarakat tidak mampu, dan sampai saat ini belum mempunyai kartu keterangan tidak mampu,  sesuai dengan keterangan yang diberikan oleh ketua RT Dan RW nya.</p>

<p align=justify>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==10){
$q=mysql_query("Select * from surat_sktmsekolah where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
	$r3=mysql_fetch_array($q3);
	$q5=mysql_query("select * from penduduk where id_kk='$r[id_kk]' and hub_klg='2'");
	$r5=mysql_fetch_array($q5);
	$q4=mysql_query("select * from kk where id='$r[id_kk]'");
$r4=mysql_fetch_array($q4);
	echo"<div align=center><h3>SURAT KETERANGAN TIDAK MAMPU</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div> ".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama </td><td>: <b>$r3[nama]</b></td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r3[tmp_lhr],".indotgl($r3[tgl_lhr])."</td></tr>
<tr><td>NIK</td><td>: $r3[nik]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r3[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r3[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r3[pekerjaan])."</td></tr>
<tr><td>Warga Negara</td><td>: ".cek('wrg_ngr',$r3[wrg_ngr])."</td></tr>
<tr><td>Alamat</td><td>: $r4[alamat]  RW $r4[rw] / RT $r4[rt]</td></tr>
<tr><td></td><td></td></tr>
<tr><td>Nama </td><td>:<b> $r5[nama]</b></td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r5[tmp_lhr],".indotgl($r5[tgl_lhr])."</td></tr>
<tr><td>NIK</td><td>: $r5[nik]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r5[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r5[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r5[pekerjaan])."</td></tr>
<tr><td>Warga Negara</td><td>: ".cek('wrg_ngr',$r5[wrg_ngr])."</td></tr>
<tr><td>Alamat</td><td>: $r4[alamat]  RW $r4[rw] / RT $r4[rt]</td></tr>
<tr><td></td><td></td></tr>
<tr><td>Data Di Atas Adalah Orang Tua Dari: </td><td></td></tr>
<tr><td>Nama </td><td>: <b>$r2[nama]</b></td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>NIK</td><td>: $r2[nik]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Warga Negara</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Alamat</td><td>: $r4[alamat]  RW $r4[rw] / RT $r4[rt]</td></tr>
</table>
<p align=justify>Nama tersebut diatas adalah benar warga kami ".dessa()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab] dan benar ianya tercata dari <b>KELUAGRA TIDAK MAMPU</b> sehingga layak untuk mendapatkan bantuan Beasiswa, Surat keterangan ini digunakan untuk $r[tujuan]</p>

<p align=justify>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan seperlunya.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==11){
$q=mysql_query("Select * from surat_ktp where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN </h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, ".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Pendidikan</td><td>: ".cek('pendidikan',$r2[pendidikan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>No KTP/NIK</td><td>: $r2[nik]</td></tr>
</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------KTP SEMENTARA KTP YANG ASLINYA DALAM PROSES--------</b></p>
<p>Yang akan dipergunakan untuk :</p>
<p>$r[tujuan]</p>
<p align=justify>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p align=justify>Yang bersangkutan tersebut di atas memang benar salah seorang warga Masyarakat ".dessa()."  kami yang tinggal secara menetap di alamat seperti tersebut di atas,  KTP asli yang bersangkutan diatas Belum selesai  dan saat ini sedang dalam Proses pembuatan di Kecamatan</p>

<p align=justify>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==12){
$q=mysql_query("Select * from surat_lainnya where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN KEHILANGAN</h3></div>
<div align=center><h3>Nomor : $r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini:</div>
<table>
<tr><td>Nama</td><td>:$_SESSION[kpldesa]</td></tr>
<tr><td>Jabatan</td><td>: Kepala Desa $_SESSION[nmdesa] </td></tr>
</table>
<p><br> Menerangkan dengan sebenar-benarnya bahwa:<br></p>
<table>
<tr><td>Nama </td><td>: $r2[nama]</td></tr>
<tr><td>Tempat / Tgl Lahir</td><td>: $r2[tmp_lhr] / ".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Pendidikan</td><td>: ".cek('pendidikan',$r2[pendidikan])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>Nomor KTP/NIK</td><td>: $r2[nik]</td></tr>
<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>Keterangan</td><td>:$r[keterangan]</td></tr>
</table>

<p align=justify>Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat di pergunakan sebagaimana mestinya.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td><b><u>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==14){
$q=mysql_query("Select * from surat_bedanama where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
	echo"<div align=center><h3><u>SURAT KETERANGAN BEDA NAMA</u></h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>No NIK</td><td>: $r2[nik]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Warga Negara</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>

<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
";

echo"
</table>
<p align=justify>Nama tersebut diatas adalah benar warga ".dessa()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab] dan benar mempunyai $r[tujuan] tertulis atas nama $r[atasnama] dan nama yang tercantum dalam Kartu Tanda Penduduk (KTP) NIK:$r[nik] bernama <b>$r2[nama]</b>. Nama di $r[tujuan] tersebut adalah orang yang sama dan nama yang sebenarnya adalah <b>$r2[nama]</b></p>



<p align=justify>Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==15){
$q=mysql_query("Select * from surat_nonpns where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
	echo"<div align=center><h3><u>SURAT KETERANGAN NON PNS</u></h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>No NIK</td><td>: $r2[nik]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Warga Negara</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>

<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
";

echo"
</table>
<p align=justify>Nama tersebut diatas adalah benar warga ".dessa()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab] dan benar ianya Adalah ".cek('pekerjaan',$r2[pekerjaan])." yang merupakan bukan Pegawai Negeri Sipil (Non PNS)</p>



<p align=justify>Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}elseif($d==17){
		$q=mysql_query("Select * from surat_jalan where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
$zz=count(explode(",",$r[pengikut]));
	echo"
<div align=center><h3>SURAT KETERANGAN JALAN</h3></div>
<div align=center><h3>No.$r[no_srt]</h3><br><br></div>

<table>
<tr><td>Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>NIK</td><td>: $r2[nik]</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Warga Negara</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>Tujuan/Maksud</td><td>: $r[tujuan]</td></tr>

";

echo"
<tr><td>Pengikut</td><td>: $zz Orang</td></tr>
</table>
<p align=justify>Nama tersebut diatas adalah benar Warga ".dessa()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab] , dan benar ianya akan <b><u>$r[keterangan]</u></b></p>";
echo"
<table border=1 width=100%>
<tr><td>No</td><td>NIK</td><td>Nama</td></tr>
";


$nk=1;
for ($x = 0; $x < $zz; $x++) {
	$xx=explode(",",$r[pengikut]);
	$kl=mysql_query("Select * from penduduk where id='$xx[$x]'");
	$pl=mysql_fetch_array($kl);
	echo"<tr><td>$nk</td><td>$pl[nik]</td><td>$pl[nama]</td></tr>";
	$nk++;
}
echo"
</table>


";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}else if($d == 13){
?>
<style>
.kiri {
	float:left;
	width:60%;
}
.kanan {
	float:right;
	width:25%;
}
.isi {
    clear:both;
}
p {
    text-align: justify;
} 
</style>
<?php
$q=mysql_query("Select * from surat_imb where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo "
    <div align='right'>
        $_SESSION[nmdesa], $r[tgl_srt]
    </div>
    <br/>
	<div class='kiri'>
        <table>
            <tr>
                <td>Nomor</td><td>: $r[no_srt]</td>
            </tr>
            <tr>
                <td>Lampiran</td><td>: 1 Berkas</td>
            </tr>
            <tr>
                <td>Prihal</td><td>: Permohonan Surat Rekomendasi </td>
            </tr><tr>
                <td></td><td><b><u>Izin Mendirikan Bangunan (IMB) </b></td>
            </tr>
        </table>
	</div>
    <div class='kanan'>
        Kepada Yth,<br/>
        Camat  $_SESSION[nmkec]<br/>
        di -
        <div align='center'>
            <u>$_SESSION[nmdesa]</u>
        </div>
    </div>
    <div class='isi'>
        <br/>
        Dengan Hormat,<br/>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa :
        </p><br/>
        <table align='center'>
            <tr>
                <td>Nama</td><td>:$r2[nama] </td>
            </tr>
			<tr>
                <td>Tempat/Tg. Lahir</td><td>:$r2[tmp_lhr],".indotgl($r2[tgl_lhr])." </td>
            </tr>
			<tr>
                <td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td>
            </tr>
			<tr>
                <td>Agama</td><td>: ".cek('agama',$r2[agama])."</td>
            </tr>
			<tr>
                <td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td>
            </tr>
			<tr>
                <td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td>
            </tr>
			<tr>
                <td>Warga Negara</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td>
            </tr>
			<tr>
                <td>Luas Bangunan</td><td>: $r[luas]</td>
            </tr>
			<tr>
                <td>Jenis Bagunan</td><td>: $r[jenis]</td>
            </tr>
			<tr>
                <td>Alamat</td><td valign='top'>: $r[alamat]</td>
            </tr>
        </table>
        <br/>
        <br/>
        <p align=justify>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama tersebut diatas adalah benar warga $r3[alamat] dan
            akan melaksanakan pembuatan Izin mendirikan Bangunan (IMB) seluas $r[luas] $r[jenis] ,yang berlokasi di $r[alamat]. Untuk itu kami mohon Surat Rekomendasi Izin Mendirikan Bangunan (IMB) sesuai dengan rencana tersebut diatas.
        </p>
        <p align=justify>
            &nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini kami sampaikan dengan sebenarnya dan diucapkan terimakasih atas kerjasamanya.
        </p>
       <div class='kanan' align='center'>
            ".kpdes()." $_SESSION[nmdesa]<br/>
            <br/>
            <br/>
            <u><b>$_SESSION[kpldesa]</b></u>
           $_SESSION[nipkpldesa]
        </div>
    </div>";
}
else if($d == 18){
?>
<style>
.kiri {
	float:left;
	width:60%;
}
.kanan {
	float:right;
	width:25%;
}
.isi {
    clear:both;
}
p {
    text-align: justify;
} 
</style>
<?php
$q=mysql_query("Select * from surat_skck where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo "
   <div align=center><u><b>SURAT KETERANGAN CATATAN KEPOLISIAN</u></b></div>
   <div align=center>NOMOR:$r[no_srt]</div>
    
	
    <div class='isi'>
    
        <p>
            &nbsp;&nbsp;Yang berntanda tangan di bawah ini, kami Kepala Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab] menerangkan dengan sebenarnya bahwa :
        </p><br/>
        <table align='center'>
            <tr>
                <td>1. Nama Lengkap</td><td>: $r2[nama] </td>
            </tr>
						<tr>
                <td>2. Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td>
            </tr>
			<tr>
                <td>3. Tempat Tanggal Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])." </td>
            </tr>
			<tr>
                <td>4. Kwarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td>
            </tr>
			<tr>
                <td>5. Agama</td><td>: ".cek('agama',$r2[agama])."</td>
            </tr><tr>
                <td>6. Pendidikan</td><td>: ".cek('pendidikan',$r2[pendidikan])."</td>
            </tr>
			<tr>
                <td>7. Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td>
            </tr>
						
			<tr>
                <td>8. Alamat</td><td valign='top'>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td>
            </tr>
			<tr>
                <td>9. Nomor KTP/KK</td><td valign='top'>: $r[nik]</td>
            </tr>
			<tr>
                <td>10. Ormas / Orpol</td><td valign='top'>: </td>
            </tr>
			<tr>
                <td>11. Keperluan</td><td valign='top'>: $r[tujuan]</td>
            </tr>
        </table>
        <br/>
        <br/>
        <p>
            &nbsp;&nbsp;&nbsp; Dalam pengamatan kami sampai saat ini orang tersebut di atas berkelakuan baik, tidak pernah tersangkut urusan polisi maupun lainnya.
        </p>
        <p>
            Demikian surat keterangan ini kami buat dengan sebenarnya mengingat sumpah jabatan.
        </p>
        <div class='kanan' align='center'>
		$_SESSION[nmdesa],".indotgl($r[tgl_srt])."<br/>
            ".kpdes()." $_SESSION[nmdesa]<br/>
            <br/>
            <br/>
            <u><b>$_SESSION[kpldesa]</b></u>
           $_SESSION[nipkpldesa]
        </div>
		
    </div>";
}elseif($d==20){
$q=mysql_query("Select * from surat_bepergian where no_srt='$nosur'");
$r=mysql_fetch_array($q);
$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
	echo"<div align=center><h3><u><b>SURAT BEPERGIAN UNTUK NIKAH</u></b></h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div><p align=justify> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini kami Kepala Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] menerangkan dengan sebenarnya bahwa:</p> </div>
<table>
<tr><td>Nama </td><td>: $r2[nama]</td></tr>
<tr><td>Tempat/ Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>Pendidikan</td><td>: ".cek('pendidikan',$r2[pendidikan])."</td></tr>
<tr><td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>Alamat</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>No KTP</td><td>: $r2[nik]</td></tr>
<tr><td>Status </td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td colspan=2>yang tersebut di atas akan melaksanakan nikah ke:</td></tr>
<tr><td>Desa /Kelurahan</td><td>: $r[desa]</td></tr>
<tr><td>Kecamatan</td><td>: $r[kec]</td></tr>
<tr><td>Kabupaten / Kotamadya</td><td>: $r[kab]</td></tr>
<tr><td>Provinsi</td><td>: $r[prov]</td></tr>
";

echo"



</table>
<p>Demikian untuk menjadi perhatian guna seperlunya</p>
";
echo"
<table align=right>
<tr><td rowspan=5><div style='border:1px solid; padding-top: 50px;padding-bottom:50px; padding-left:5px;padding-right:5px;'>Pas Foto 3x4</div></td><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td><u><b>$_SESSION[kpldesa]</u></b></td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}
else if($d == 19){
?>
<style>
.kiri {
	float:left;
	width:60%;
}
.kanan {
	float:right;
	width:25%;
}
.isi {
    clear:both;
}
p {
    text-align: justify;
} 
</style>
<?php
$q=mysql_query("Select * from surat_situ where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo "
    <div align='right'>
        $_SESSION[nmdesa], $r[tgl_srt]
    </div>
    <br/>
	<div class='kiri'>
        <table>
            <tr>
                <td>Nomor</td><td>: $r[no_srt]</td>
            </tr>
            <tr>
                <td>Lampiran</td><td>: 1 Berkas </td>
            </tr>
            <tr>
                <td>Prihal</td><td>: <b>PERMOHONAN SITU</b></td>
            </tr>
        </table>
	</div>
    <div class='kanan'>
        Kepada Yth,<br/>
        Camat  $_SESSION[nmkec]<br/>
        di -
        <div align='center'>
            <u>$_SESSION[nmdesa]</u>
        </div>
    </div>
    <div class='isi'>
        <br/>
        Dengan Hormat,<br/>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".kpdes()." $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa :
        </p><br/>
        <table align='center'>
            <tr>
                <td>Nama</td><td>:$r2[nama] </td>
            </tr>
			<tr>
                <td>Tempat/Tg. Lahir</td><td>:$r2[tmp_lhr],".indotgl($r2[tgl_lhr])." </td>
            </tr>
			<tr>
                <td>Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td>
            </tr>
			<tr>
                <td>Agama</td><td>: ".cek('agama',$r2[agama])."</td>
            </tr>
			<tr>
                <td>Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td>
            </tr>
			<tr>
                <td>Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td>
            </tr>
			<tr>
                <td>Warga Negara</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td>
            </tr>
			<tr>
                <td>Jenis Usaha</td><td>: $r[jnsusaha]</td>
            </tr>
			<tr>
                <td>Merek Usaha</td><td>: $r[mrkusaha]</td>
            </tr>
			<tr>
                <td>Luas Tempat Usaha</td><td>: $r[luasusaha]</td>
            </tr>
			<tr>
                <td>Alamat</td><td valign='top'>: $r[alamatusaha]</td>
            </tr>
        </table>
        <br/>
        <br/>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama tersebut diatas adalah benar warga $r3[alamat] . Yang mempunyai usaha dibidang $r[jnsusaha] dengan Merek Usaha $r[mrkusaha] yang berlokasi di $r[alamatusaha].
        Untuk itu kami memohon kepada Bapak Camat $_SESSION[nmkec] agar kiranya dapat memberikan surat Izin Tempat Usaha (SITU) kepada warga tersebut diatas.
		</p>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini kami sampaikan dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
        </p>
       <div class='kanan' align='center'>
            ".kpdes()." $_SESSION[nmdesa]<br/>
            <br/>
            <br/>
            <u><b>$_SESSION[kpldesa]</b></u>
           $_SESSION[nipkpldesa]
        </div>
    </div>";
}
elseif($d==8){
	echo"<style>
@page { size 8.5in 11in; margin: 2cm }
div.page { page-break-after: always }
</style>";
	$q=mysql_query("Select * from surat_nikah where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
echo"
<div class=page>
<div align=center><h3>SURAT KETERANGAN UNTUK NIKAH</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<p>Yang bertandatangan di bawah ini menerangkan dengan sesungguhnya Bahwa:</p>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>2. Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>3. Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>4. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>5. Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>6. Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
$qs=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='2'");
$r5=mysql_fetch_array($qs);
echo"
<tr><td>7. Tempat Tinggal</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
<tr><td>8. BIN/BINTI</td><td>: $r2[ayah]</td></tr>
<tr><td>9. Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>";
if($r2[status_kawin]==2){
if($r2[jk]==1){
$jt="JEJAKA";
}else{
$jt2="PERAWAN";	
}
}
echo"
<tr><td width=40%> a. Jika pria, Terangkan Jejaka,duda atau beristri dan berapa istrinya</td><td>: $jt</td></tr>";
echo"
<tr><td width=40%> b. Jika wanita, terangkan perawan atau janda</td><td>: $jt2</td></tr>
<tr><td>10. Nama Istri/Suami terdahulu</td><td>:-</td></tr></table>
<p>Demikianlah surat keterangan ini dibuat dengan mengingat sumpah jabatan 
Dan untuk digunakan seperlunya.
</p>";
echo"<div align=right>
<table>
<tr><td>$_SESSION[nmdesa],</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table></div></div>
";
echo"<div class=page>
<div align=center><h3>SURAT KETERANGAN ASAL USUL</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div></div>";
echo"<p>I. Yang bertanda tangan dibawah ini Menerangkan dengan sesungguhnya Bahwa :
</p>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>3. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
</table>
<p>II. adalah benar anak kandung dari pernikahan seorang pria :</p>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r4[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>: $r4[tmp_lhr],".indotgl($r4[tgl_lhr])."</td></tr>
<tr><td>3. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r4[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>: ".cek('agama',$r4[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>: ".cek('pekerjaan',$r4[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>: $r3[alamat]</td></tr>
</table>
<p> Dengan seorang wanita :</p>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r5[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>: $r5[tmp_lhr],".indotgl($r5[tgl_lhr])."</td></tr>
<tr><td>3. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r5[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>: ".cek('agama',$r5[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>: ".cek('pekerjaan',$r5[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>: $r3[alamat]</td></tr>
</table>
<p align=justify>Demikianlah Surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan seperlunya.</p>
";
echo"<div align=right>
<table>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>
<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table></div>
</div>";
echo"<div class=page>
<div align=center><h3>SURAT KETERANGAN TENTANG ORANG TUA</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div></div>";
echo"<p>I. Yang bertanda tangan dibawah ini Menerangkan dengan sesungguhnya Bahwa :
</p>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r4[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>: $r4[tmp_lhr],".indotgl($r4[tgl_lhr])."</td></tr>
<tr><td>3. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r4[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>: ".cek('agama',$r4[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>: ".cek('pekerjaan',$r4[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
</table>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r5[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>: $r5[tmp_lhr],".indotgl($r5[tgl_lhr])."</td></tr>
<tr><td>3. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r5[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>: ".cek('agama',$r5[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>: ".cek('pekerjaan',$r5[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
</table>
<p>II. adalah benar Ayah dan Ibu Kandung Dari seorang </p>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>3. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>: $r3[alamat]  RW $r3[rw] / RT $r3[rt]</td></tr>
</table>
<p align=justify>Demikianlah Surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan seperlunya.</p>
";
echo"<div align=right>
<table>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>
<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table></div>
</div>";
echo"<div class=page>
<div align=center><h3>SURAT PERSETUJUAN MEMPELAI</h3></div>";

echo"<p>Yang bertanda tangan dibawah ini :
</p>
<p>I.Calon Suami</p>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>3. Kewarganegaraan</td><td>: ".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>: $r3[alamat] RW $r3[rw] / RT $r3[rt]</td></tr>
</table>
<p>I.Calon Istri</p>
<table>
<tr><td>1.Nama Lengkap</td><td>: $r[namaistri]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>: $r[tmpistri],".indotgl($r2[tglistri])."</td></tr>
<tr><td>3. Kewarganegaraan</td><td>: $r[wrgistri]</td></tr>
<tr><td>4. Agama</td><td>: $r[agamaistri]</td></tr>
<tr><td>5. Pekerjaan</td><td>: $r[pekerjaanistri]</td></tr>
<tr><td>6. Tempat Tinggal</td><td>: $r[alamatistri]</td></tr>
</table>
<p align=justify>Menyatakan dengan sesungguhnya bahwa atas dasar sukarela, dengan kesadaran sendiri tanpa paksaan dari siapapun juga, setuju untuk melangsungkan pernikahan.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
</table>
<table align=center>
<tr><td>I. Calon Suami</td><td></td><td>II. Calon Istri</td></tr>
<tr><td><br><br></td><td><br><br></td><td><br><br></td></tr>
<tr><td>($r2[nama])</td><td></td><td>($r[namaistri])</td></tr>
</table>
</div>";

}
elseif($d==99){
		
	$q2=mysql_query("select * from penduduk where nik='$nik'");
	$r2=mysql_fetch_array($q2);
	echo"
<div align=center><h3>BIODATA PENDUDUK</h3></div>

<table>
<tr><td>I.Data Pribadi</td><td></td></tr>
<tr><td>1. No KTP/NIK</td><td>: $r2[nik]</td></tr>
<tr><td>2.Nama Lengkap</td><td>: $r2[nama]</td></tr>
<tr><td>3. Jenis Kelamin</td><td>: ".cek('jk',$r2[jk])."</td></tr>
<tr><td>4. Tempat, Tgl Lahir</td><td>: $r2[tmp_lhr],".indotgl($r2[tgl_lhr])."</td></tr>
<tr><td>5. Golongan Darah</td><td>: ".cek('gol_drh',$r2[gol_drh])."</td></tr>
<tr><td>6. Agama</td><td>: ".cek('agama',$r2[agama])."</td></tr>
<tr><td>7. Status Perkawinan</td><td>: ".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>8. Status Dalam Keluarga</td><td>: ".cek('hub_klg',$r2[hub_klg])."</td></tr>
<tr><td>9. Pekerjaan</td><td>: ".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>10. Pendidikan</td><td>: ".cek('pendidikan',$r2[pendidikan])."</td></tr>
<tr><td>11. Nama Ibu</td><td>: $r2[ibu]</td></tr>
<tr><td>12. Nama Ayah</td><td>: $r2[ayah]</td></tr>
";
$q3=mysql_query("select * from kk where id='$r2[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r2[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>II. Data Keluarga</td><td></td></tr>
<tr><td>1. No Induk Kartu Keluarga</td><td>: $r3[no_kk]</td></tr>
<tr><td>2. Nama Kepala Keluarga</td><td>: $r4[nama]</td></tr>
<tr><td>3. Alamat</td><td>:$r3[alamat]</td></tr>
</table>
";
$dg=date("Y-m-d");
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],$dg</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}
elseif($d==98){
		$q=mysql_query("Select * from kk where id='$nokk'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where id_kk='$r[id]'");
	$q6=mysql_query("select * from penduduk where id_kk='$r[id]' and hub_klg='1'");
	$r6=mysql_fetch_array($q6);
	echo"
<div align=center><h3>BIODATA KELUARGA</h3></div>
<table>
<tr><td>Nomor Kartu Keluarga</td><td>$r[no_kk]</td></tr>
<tr><td>Kepala Keluarga</td><td>$r6[nama]</td></tr>
<tr><td>Alamat</td><td></td>$r[alamat]</tr>
<tr><td>RT/RW</td><td></td>$r[rt]/$r[rw]</tr>
</table>
<table border=1>
<tr><td>NO</td><td>NIK</td><td>NAMA LENGKAP</td><td>JNS KELAMIN</td><td>TEMPAT & TGL LAHIR</td><td>DRH</td><td>AGAMA</td><td>STATKAWIN</td><td>HUBKELUARGA</td><td>PENDIDIKAN TERAKHIR</td></tr>
";
$no=1;
WHILE($r2=mysql_fetch_array($q2)){
echo"
<tr><td>$no</td>
<td>$r2[nik]</td>
<td>$r2[nama]</td>
<td>".cek('jk',$r2[jk])."</td>
<td>$r2[tmp_lhr], ".indotgl($r2[tgl_lhr])."</td>
<td>".cek('gol_drh',$r2[gol_drh])."</td>
<td>".cek('agama',$r2[agama])."</td>
<td>".cek('status_kawin',$r2[status_kawin])."</td>
<td>".cek('hub_klg',$r2[hub_klg])."</td>
<td>".cek('pendidikan',$r2[pendidikan])."</td>
</tr>";
}
echo"
</table>
<table border=1>
<tr><td>NO</td><td>PEKERJAAN</td><td>NAMA IBU</td><td>NAMA AYAH</td></tr>";
$q3=mysql_query("select * from penduduk where id_kk='$r[id]'");
WHILE($r3=mysql_fetch_array($q3)){
echo"
<tr><td>$no</td>
<td>".cek('pekerjaan',$r3[pekerjaan])."</td>
<td>$r3[ibu]</td>
<td>$r3[ayah]</td>

</tr>";
}
echo"
</table>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],$dg</td></tr>
<tr><td>".kpdes()." $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
<tr><td>$_SESSION[nipkpldesa]</td></tr>
</table>
";
}
?>