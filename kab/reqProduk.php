<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);

$s = mysql_query("select * from desa where id_kecamatan = '$id'");
while($d = mysql_fetch_array($s)){
    $ss = mysql_query("select * from produkunggulan where desa = '$d[id]' order by id desc");
    while($dd = mysql_fetch_array($ss)){
?>
    <div class="media">
        <div class="media-left">
            <div class="media-object imagecrop_media"  style='background-image:url(http://peta.klikdesa.com/produk/<?php echo $dd['foto']; ?>)'></div>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $dd['nama_produk']; ?></h4>
          <table>
            <tr>
                <td>Desa/Kelurahan</td>
                <td>: <?php echo getStatusDesa($d['id']); ?> <?php echo $d['nama']; ?></td>
            </tr>
            <tr>
                <td>Pemasaran</td>
                <td>: <?php echo $dd['pemasaran']; ?></td>
            </tr>
            <tr>
                <td>Kapasitas Produksi</td>
                <td>: <?php echo $dd['kapasitasproduksi']; ?></td>
            </tr>
            <tr>
                <td>Potensi Pengembangan</td>
                <td>: <?php echo $dd['potensipengembangan']; ?></td>
            </tr>
            <tr>
                <td>Keunggulan</td>
                <td>: <?php echo $dd['keunggulan']; ?></td>
            </tr>
          </table>
        </div>
      </div>
    <?php
    }
}
?>