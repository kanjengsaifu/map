<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$s = mysql_query("select * from produkunggulan where desa = '$id' order by id desc");
?>
<h2 class='title'>Produk Unggulan Desa</h2>
<div align=center style='background-color:orange;'><b>Promokan Produk Unggulan desa anda<br> Kirim foto ke WA klikdesa (0822-1533-1648)
<br> Atau ke email klikdesa@gmail.com</b></div>
<?php
while($d = mysql_fetch_array($s)){
?>
    <div class="media">
        <div class="media-left">
            <div class="media-object imagecrop_media"  style='background-image:url(http://peta.klikdesa.com/produk/<?php echo $d['foto']; ?>)'></div>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $d['nama_produk']; ?></h4>
          <table>
            <tr>
                <td>Pemasaran</td>
                <td>: <?php echo $d['pemasaran']; ?></td>
            </tr>
            <tr>
                <td>Kapasitas</td>
                <td>: <?php echo $d['kapasitasproduksi']; ?></td>
            </tr>
            <tr>
                <td>Potensi</td>
                <td>: <?php echo $d['potensipengembangan']; ?></td>
            </tr>
            <tr>
                <td valign='top'>Keunggulan</td>
                <td>: <?php echo $d['keunggulan']; ?></td>
            </tr>
          </table>
        </div>
      </div>
<?php
}
?>