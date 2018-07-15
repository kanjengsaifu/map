<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$s = mysql_query("select * from rutilahu where desa = '$id' order by id desc");
?>
<h2 class='title'>Rumah Tidak Layak Huni</h2>
<?php
while($d = mysql_fetch_array($s)){
?>
    <div class="media">
        <div class="media-left">
            <div class="media-object imagecrop_media"  style='background-image:url(http://peta.klikdesa.com/rutilahu/<?php echo $d['foto']; ?>)'></div>
        </div>
        <div class="media-body">
          <table>
            <tr>
                <td>Pemilik</td>
                <td>: <?php echo $d['namapemilik']; ?></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td>: <?php echo $d['usia']; ?></td>
            </tr>
            <tr>
                <td>Jumlah Anggota Keluarga</td>
                <td>: <?php echo $d['jumlahanggotakeluarga']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?php echo $d['alamat']; ?></td>
            </tr>
          </table>
        </div>
      </div>
<?php
}
?>