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
	header("Content-type: application/vnd.ms-word");
	header("Expires: 0");
	header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment;Filename=rekap.doc");

$tt=mysql_query("select * from kabupaten where id='$_SESSION[idkab]'");
$ty=mysql_fetch_array($tt);
echo"
	<table width=100%><tr><td><img src='http://localhost/simades/img/logo/$ty[logo]' width='80' height='80'></td>
	<td align=center><h3>PEMERINTAH KABUPATEN ".strtoupper($_SESSION[nmkab])."<br>
	KECAMATAN ".strtoupper($_SESSION[nmkec])."<br>
	KANTOR DESA ".strtoupper($_SESSION[nmdesa])."<br>
	$_SESSION[alamatdesa]</h3></td></tr></table><hr>";

if($d==1){
	$q=mysql_query("Select * from surat_kelahiran where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
echo"
<div align=center><h3>SURAT KELAHIRAN</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertandatangan dibawah ini, menerangkan bahwa pada:</div>
<table>
<tr><td>Hari</td><td>:$r[hari]</td></tr>
<tr><td>Pukul</td><td>:$r[pukul]</td></tr>
<tr><td>Di</td><td>:$r[tmp_salin]</td></tr>
<tr><td>Jenis Kelahiran</td><td>:$r[jns_kelahiran]</td></tr>
<tr><td>Anake</td><td>:$r[anake]</td></tr>
<tr><td>Telah Lahir Seorang Anak</td><td>:".cek('jk',$r[jk])."</td></tr>
<tr><td>Bernama</td><td>:$r[nama_lahir]</td></tr>";
$qq=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='2'");
$rr=mysql_fetch_array($qq);
echo"
<tr><td>Dari Seorang Ibu Bernama</td><td>:$rr[nama]</td></tr>
<tr><td>Umur</td><td>:$rr[tmp_lhr],$rr[tgl_lhr]</td></tr>
<tr><td>Agama</td><td>:".cek('agama',$rr[agama])."</td></tr>";
$qqq=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$rrr=mysql_fetch_array($qqq);
echo"
<tr><td>Istri Dari</td><td>:$rrr[nama]</td></tr>
<tr><td>Umur</td><td>:$rrr[tmp_lhr],$rrr[tgl_lhr]</td></tr>
<tr><td>Agama</td><td>:".cek('agama',$rrr[agama])."</td></tr>
<tr><td>Pekerjaan</td><td>:".cek('pekerjaan',$rr[pekerjaan])."</td></tr>";
$q1=mysql_query("Select * from kk where id='$r[id_kk]'");
$r1=mysql_fetch_array($q1);
echo"
<tr><td>Alamat</td><td>:$r1[alamat],RW $r1[rw] / RT $r1[rt]</td></tr>
</table>
<p>Surat keterangan ini di buat atas dasar yang sebenarnya.</p>";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],$r[tgl_srt_kelr]</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==2){
		$q=mysql_query("Select * from surat_pindah where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	echo"
<div align=center><h3>SURAT KETERANGAN PINDAH</h3></div>
<div align=center><h3>No.$r[no_srt]</h3><br><br></div>

<table>
<tr><td>1.Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>2. Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>3. Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>4. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>5. Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>6. Status Perkawinan</td><td>:".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>7. Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>8. Pendidikan</td><td>:".cek('pendidikan',$r2[pendidikan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>9. Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td>10. No KTP/NIK</td><td>:$r2[nik]</td></tr>
<tr><td>11. Pindah Ke</td><td>:$r[pindahke]</td></tr>
<tr><td>12. Alasan Pindah</td><td>:$r[alasan]</td></tr>
<tr><td>13. Klasifikasi Pindah</td><td>:$r[klasifikasi]</td></tr>
<tr><td>14. No Induk Kartu Keluarga</td><td>:$r3[no_kk]</td></tr>
<tr><td>15. Nama Kepala Keluarga</td><td>:$r4[nama]</td></tr>
<tr><td>16. Pengikut</td><td>:</td></tr>
<tr><td colspan=2>";
echo"
<table border=1 width=100%>
<tr><td>No</td><td>NIK</td><td>Nama</td></tr>
";

$zz=count(explode(",",$r[pengikut]));
$nk=1;
for ($x = 0; $x < $zz; $x++) {
	$xx=explode(",",$r[pengikut]);
	$kl=mysql_query("Select * from penduduk where id='$xx[$x]'");
	$pl=mysql_fetch_array($kl);
	echo"<tr><td>$nk</td><td>$pl[nik]</td><td>$pl[nama]</td></tr>";
	$nk++;
}
echo"
</table></td></tr>

</table>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==3){
$q=mysql_query("Select * from surat_kematian where no_srt='$nosur'");
	$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	echo"<div align=center><h3>SURAT KETERANGAN KEMATIAN</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertandatangan dibawah ini, menerangkan bahwa :</div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>Status Perkawinan</td><td>:".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td colspan=2>Telah Meninggal Pada:</td></tr>
<tr><td>Hari</td><td>:$r[hari]</td></tr>
<tr><td>Tanggal</td><td>:$r[tgl_kematian]</td></tr>
<tr><td>Tempat Kematian</td><td>:$r[tmp_kematian]</td></tr>
<tr><td>Di Sebabkan Karena</td><td>:$r[sebab]</td></tr>
</table>
<p>Surat keterangan ini di buat atas dasar yang sebenarnya.</p>";
}elseif($d==4){
$q=mysql_query("Select * from surat_domisili where no_srt='$nosur'");
$r=mysql_fetch_array($q);
$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	echo"<div align=center><h3>SURAT KETERANGAN</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertandatangan dibawah ini, menerangkan bahwa :</div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
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
<tr><td>Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td>No KTP/NIK</td><td>:$r2[nik]</td></tr>

</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------------DOMISILI-------------</b></p>
<p>Yang akan dipergunakan untuk:</p>
<p>$r[tujuan]</p>
<p>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p>Yang bersangkutan diatas adalah benar salah seorang warga Masyarakat Desa Kami yang telah tinggal secara menetap di alamat seperti tersebut diatas sesuai dengan keterangan yang di berikan oleh ketua RT dan RW nya.</p>
<p>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";

}elseif($d==5){
$q=mysql_query("Select * from surat_keramaian where no_srt='$nosur'");
$r=mysql_fetch_array($q);
$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	echo"<div align=center><h3>SURAT KETERANGAN PENGANTAR IZIN RAME - RAME</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Pemerintah Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab] dalam rangka memenuhi permohonan izin rame-rame dari: </div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td>No KTP/NIK</td><td>:$r2[nik]</td></tr>
<tr><td>Acara</td><td>:$r[tujuan]</td></tr>
</table>
<p>Dengan ini menerangkan bahwa pada prinsipnya tidak keberatan atas permohonan yang bersangkutan dengan ketentuan sebagai berikut :</p>
<table>
<tr><td>1.	Pada waktu diadakan rame-rame harus disertai dengan ketentraman dan ketertiban dalam lingkungan baik hubungan dengan tetangga, menghargai waktu-waktu ibadah dalam menciptakan kerukunan umat beragama maupun kebersihan lingkungan setelah selesai rame-rame</td></tr>
<tr><td>2.	Pada waktu dilaksanakannya rame-rame tidak dibenarkan/dilarang melakukan hal-hal yang bertentangan dengan ketentuan yang berlaku dan adat istiadat bangsa. </td></tr>
</table>";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==6){
$q=mysql_query("Select * from surat_ahliwaris where no_srt='$nosur'");
$r=mysql_fetch_array($q);
$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN AHLI WARIS</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, Kepala Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
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
<tr><td>Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td>No KTP/NIK</td><td>:$r2[nik]</td></tr>
</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------------Ahli Waris-------------</b></p>
<p>Yang akan dipergunakan untuk :</p>
<p>$r[tujuan]</p>
<p>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p>Yang bersangkutan tersebut di atas memang benar salah seorang warga masyarakat desa kami yang tinggal secara menetap di alamat seperti tersebut di atas dan AHLI WARIS </p>
<p>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==7){
$q=mysql_query("Select * from surat_usaha where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, Kepala Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
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
<tr><td>Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td>No KTP/NIK</td><td>:$r2[nik]</td></tr>
</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------------USAHA-------------</b></p>
<p>Yang akan dipergunakan untuk :</p>
<p></p>
<p>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa yang bersangkutan tersebut di atas memang benar salah seorang warga masyarakat Desa kami yang tinggal secara menetap di alamat seperti tersebut di atas dan sampai saat ini mempunyai usaha sebagai berikut :</p>
<table>
<tr><td>Bidang/ Jenis Usaha</td><td>:$r[bidang]</td></tr>
</table>
<p>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==9){
$q=mysql_query("Select * from surat_sktm where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN </h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, Kepala Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>Status Perkawinan</td><td>:".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>

";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);

echo"
<tr><td>Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td>No KTP/NIK</td><td>:$r2[nik]</td></tr>
</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------------TIDAK MAMPU-------------</b></p>
<p>Yang akan dipergunakan untuk :</p>
<p>$r[tujuan]</p>
<p>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p>Yang bersangkutan tersebut di atas memang benar salah seorang warga masyarakat Desa kami yang tinggal secara menetap di alamat tersebut diatas, dan tergolong masyarakat tidak mampu, dan sampai saat ini belum mempunyai kartu keterangan tidak mampu,  sesuai dengan keterangan yang diberikan oleh ketua RT Dan RW nya.</p>

<p>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==10){
$q=mysql_query("Select * from surat_sktmsekolah where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);
	$q3=mysql_query("select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
	$r3=mysql_fetch_array($q3);
	$q4=mysql_query("select * from kk where id='$r[id_kk]'");
$r4=mysql_fetch_array($q4);
	echo"<div align=center><h3>SURAT KETERANGAN </h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, Kepala Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>No. KTP</td><td>:$r2[nik]</td></tr>
<tr><td>Kelas/Jurusan</td><td>:$r[kelas]</td></tr>
<tr><td>Nama Sekolah</td><td>:$r[sekolah]</td></tr>
<tr><td>Alamat Sekolah</td><td>:$r[alamat]</td></tr>
<tr><td>Nama Orang Tua</td><td>:</td></tr>
<tr><td>Ayah</td><td>:$r2[ayah]</td></tr>
<tr><td>IBU</td><td>:$r2[ibu]</td></tr>
<tr><td>Pekerjaan Orang Tua</td><td>:".cek('pekerjaan',$r3[pekerjaan])."</td></tr>
<tr><td>Alamat</td><td>:$r4[alamat]</td></tr>

</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------------TIDAK MAMPU-------------</b></p>
<p>Yang akan dipergunakan untuk :</p>
<p>$r[tujuan]</p>
<p>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p>Yang bersangkutan tersebut di atas memang benar salah seorang warga masyarakat desa kami yang tinggal secara menetap di alamat seperti tersebut di atas dan pada saat ini kedua orang tuanya tidak mempunyai mata pencaharian tetap dan tergolong masyarakat miskin,   sesuai dengan surat keterangan yang diberikan oleh ketua RT dan RW nya.</p>

<p>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==11){
$q=mysql_query("Select * from surat_ktp where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN </h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, Kepala Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
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
<tr><td>Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td>No KTP/NIK</td><td>:$r2[nik]</td></tr>
</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------KTP SEMENTARA KTP YANG ASLINYA DALAM PROSES--------</b></p>
<p>Yang akan dipergunakan untuk :</p>
<p>$r[tujuan]</p>
<p>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p>Yang bersangkutan tersebut di atas memang benar salah seorang warga masyarakat desa kami yang tinggal secara menetap di alamat seperti tersebut di atas,  KTP asli yang bersangkutan diatas Belum selesai  dan saat ini sedang dalam Proses pembuatan di Kecamatan</p>

<p>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==12){
$q=mysql_query("Select * from surat_lainnya where no_srt='$nosur'");
$r=mysql_fetch_array($q);
	$q2=mysql_query("select * from penduduk where nik='$r[nik]'");
	$r2=mysql_fetch_array($q2);

	echo"<div align=center><h3>SURAT KETERANGAN </h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div>
<div>Yang bertanda tangan di bawah ini, Kepala Desa $_SESSION[nmdesa] Kecamatan $_SESSION[nmkec] Kabupaten $_SESSION[nmkab], dengan ini menerangkan bahwa: </div>
<table>
<tr><td>Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>Status Perkawinan</td><td>:".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>Alamat</td><td>:$r3[alamat]</td></tr>
<tr><td>No KTP/NIK</td><td>:$r2[nik]</td></tr>
</table>
<p>Adalah salah seorang warga masyarakat kami yang telah memohon surat keterangan :</p>
<p align=center><b>--------$r[namasurat]--------</b></p>
<p>Yang akan dipergunakan untuk :</p>
<p>$r[tujuan]</p>
<p>Surat keterangan ini kami berikan kepadanya berdasarkan atas sepengetahuan dan pertimbangan bahwa :</p>
<p>Yang bersangkutan tersebut di atas memang benar salah seorang warga masyarakat desa kami yang tinggal secara menetap di alamat seperti tersebut di atas, $r[keterangan]</p>

<p>Demikian surat keterangan ini kami buat dengan sebenarnya, dimohon kepada yang berkepentingan kiranya dapat memberikan bantuan serta menjadi maklum.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}elseif($d==8){
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
<tr><td>1.Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>2. Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>3. Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>4. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>5. Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>6. Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
";
$q3=mysql_query("select * from kk where id='$r[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
$qs=mysql_query("Select * from penduduk where id_kk='$r[id_kk]' and hub_klg='2'");
$r5=mysql_fetch_array($qs);
echo"
<tr><td>7. Tempat Tinggal</td><td>:$r3[alamat]</td></tr>
<tr><td>8. BIN/BINTI</td><td>:$r2[ayah]</td></tr>
<tr><td>9. Status Perkawinan</td><td>:".cek('status_kawin',$r2[status_kawin])."</td></tr>";
if($r2[status_kawin]==2){
if($r2[jk]==1){
$jt="JEJAKA";
}else{
$jt2="PERAWAN";	
}
}
echo"
<tr><td width=40%> a. Jika pria, Terangkan Jejaka,duda atau beristri dan berapa istrinya</td><td>:$jt</td></tr>";
echo"
<tr><td width=40%> b. Jika wanita, terangkan perawan atau janda</td><td>:$jt2</td></tr>
<tr><td>10. Nama Istri/Suami terdahulu</td><td>:-</td></tr></table>
<p>Demikianlah surat keterangan ini dibuat dengan mengingat sumpah jabatan 
Dan untuk digunakan seperlunya.
</p>";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table></div>
";
echo"<div class=page>
<div align=center><h3>SURAT KETERANGAN ASAL USUL</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div></div>";
echo"<p>I. Yang bertanda tangan dibawah ini Menerangkan dengan sesungguhnya Bahwa :
</p>
<table>
<tr><td>1.Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>3. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>:$r3[alamat]</td></tr>
</table>
<p>II. adalah benar anak kandung dari pernikahan seorang pria :</p>
<table>
<tr><td>1.Nama Lengkap</td><td>:$r4[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>:$r4[tmp_lhr],$r4[tgl_lhr]</td></tr>
<tr><td>3. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r4[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>:".cek('agama',$r4[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>:".cek('pekerjaan',$r4[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>:$r3[alamat]</td></tr>
</table>
<p> Dengan seorang wanita :</p>
<table>
<tr><td>1.Nama Lengkap</td><td>:$r5[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>:$r5[tmp_lhr],$r5[tgl_lhr]</td></tr>
<tr><td>3. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r5[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>:".cek('agama',$r5[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>:".cek('pekerjaan',$r5[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>:$r3[alamat]</td></tr>
</table>
<p>Demikianlah Surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan seperlunya.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>
<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
</div>";
echo"<div class=page>
<div align=center><h3>SURAT KETERANGAN TENTANG ORANG TUA</h3></div>
<div align=center><h3>No.$r[no_srt]</h3></div></div>";
echo"<p>I. Yang bertanda tangan dibawah ini Menerangkan dengan sesungguhnya Bahwa :
</p>
<table>
<tr><td>1.Nama Lengkap</td><td>:$r4[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>:$r4[tmp_lhr],$r4[tgl_lhr]</td></tr>
<tr><td>3. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r4[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>:".cek('agama',$r4[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>:".cek('pekerjaan',$r4[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>:$r3[alamat]</td></tr>
</table>
<table>
<tr><td>1.Nama Lengkap</td><td>:$r5[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>:$r5[tmp_lhr],$r5[tgl_lhr]</td></tr>
<tr><td>3. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r5[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>:".cek('agama',$r5[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>:".cek('pekerjaan',$r5[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>:$r3[alamat]</td></tr>
</table>
<p>II. adalah benar Ayah dan Ibu Kandung Dari seorang </p>
<table>
<tr><td>1.Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>3. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>:$r3[alamat]</td></tr>
</table>
<p>Demikianlah Surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan seperlunya.</p>
";
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],".indotgl($r[tgl_srt])."</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>
<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
</div>";
echo"<div class=page>
<div align=center><h3>SURAT PERSETUJUAN MEMPELAI</h3></div>";

echo"<p>Yang bertanda tangan dibawah ini :
</p>
<p>I.Calon Suami</p>
<table>
<tr><td>1.Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>3. Kewarganegaraan</td><td>:".cek('wrg_ngr',$r2[wrg_ngr])."</td></tr>
<tr><td>4. Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>5. Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>6. Tempat Tinggal</td><td>:$r3[alamat]</td></tr>
</table>
<p>I.Calon Istri</p>
<table>
<tr><td>1.Nama Lengkap</td><td>:$r[namaistri]</td></tr>
<tr><td>2. Tempat, Tgl Lahir</td><td>:$r[tmpistri],$r2[tglistri]</td></tr>
<tr><td>3. Kewarganegaraan</td><td>:$r[wrgistri]</td></tr>
<tr><td>4. Agama</td><td>:$r[agamaistri]</td></tr>
<tr><td>5. Pekerjaan</td><td>:$r[pekerjaanistri]</td></tr>
<tr><td>6. Tempat Tinggal</td><td>:$r[alamatistri]</td></tr>
</table>
<p>Menyatakan dengan sesungguhnya bahwa atas dasar sukarela, dengan kesadaran sendiri tanpa paksaan dari siapapun juga, setuju untuk melangsungkan pernikahan.</p>
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
<tr><td>1. No KTP/NIK</td><td>:$r2[nik]</td></tr>
<tr><td>2.Nama Lengkap</td><td>:$r2[nama]</td></tr>
<tr><td>3. Jenis Kelamin</td><td>:".cek('jk',$r2[jk])."</td></tr>
<tr><td>4. Tempat, Tgl Lahir</td><td>:$r2[tmp_lhr],$r2[tgl_lhr]</td></tr>
<tr><td>5. Golongan Darah</td><td>:".cek('gol_drh',$r2[gol_drh])."</td></tr>
<tr><td>6. Agama</td><td>:".cek('agama',$r2[agama])."</td></tr>
<tr><td>7. Status Perkawinan</td><td>:".cek('status_kawin',$r2[status_kawin])."</td></tr>
<tr><td>8. Status Dalam Keluarga</td><td>:".cek('hub_klg',$r2[hub_klg])."</td></tr>
<tr><td>9. Pekerjaan</td><td>:".cek('pekerjaan',$r2[pekerjaan])."</td></tr>
<tr><td>10. Pendidikan</td><td>:".cek('pendidikan',$r2[pendidikan])."</td></tr>
<tr><td>11. Nama Ibu</td><td>:$r2[ibu]</td></tr>
<tr><td>12. Nama Ayah</td><td>:$r2[ayah]</td></tr>
";
$q3=mysql_query("select * from kk where id='$r2[id_kk]'");
$r3=mysql_fetch_array($q3);
$qd=mysql_query("Select * from penduduk where id_kk='$r2[id_kk]' and hub_klg='1'");
$r4=mysql_fetch_array($qd);
echo"
<tr><td>II. Data Keluarga</td><td></td></tr>
<tr><td>1. No Induk Kartu Keluarga</td><td>:$r3[no_kk]</td></tr>
<tr><td>2. Nama Kepala Keluarga</td><td>:$r4[nama]</td></tr>
<tr><td>3. Alamat</td><td>:$r3[alamat]</td></tr>
</table>
";
$dg=date("d-m-Y");
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],$dg</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
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
<td>$r2[tmp_lhr], $r2[tgl_lhr]</td>
<td>".cek('gol_drh',$r2[gol_drh])."</td>
<td>".cek('agama',$r2[agama])."</td>
<td>".cek('status_kawin',$r2[status_kawin])."</td>
<td>".cek('hub_klg',$r2[hub_klg])."</td>
<td>".cek('pendidikan',$r2[pendidikan])."</td>
</tr>";
$no++;
}
echo"
</table>
<table border=1>
<tr><td>NO</td><td>PEKERJAAN</td><td>NAMA IBU</td><td>NAMA AYAH</td></tr>";
$noz=1;
$q3=mysql_query("select * from penduduk where id_kk='$r[id]'");
WHILE($r3=mysql_fetch_array($q3)){
echo"
<tr><td>$noz</td>
<td>".cek('pekerjaan',$r3[pekerjaan])."</td>
<td>$r3[ibu]</td>
<td>$r3[ayah]</td>

</tr>";
$noz++;
}
echo"
</table>
";
$dg=date("d-m-Y");
echo"
<table align=right>
<tr><td>$_SESSION[nmdesa],$dg</td></tr>
<tr><td>Kepala Desa $_SESSION[nmdesa]</td></tr>
<tr><td><br><br><br><br></td></tr>

<tr><td>$_SESSION[kpldesa]</td></tr>
</table>
";
}

?>