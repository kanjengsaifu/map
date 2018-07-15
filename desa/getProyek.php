<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$s = mysql_query("select * from proyek where iddesa = '$id' order by id desc");
?>
<h2 class='title'>Data Proyek Desa</h2>
<?php
while($d = mysql_fetch_array($s)){
?>
    <div class="media">
        <div class="media-left">
            <div id="carousel<?php echo $d['id']; ?>" class="carousel slide" data-ride="carousel">
			<?php
			$ss = mysql_query("select * from fotoproyek where idproyek = '$d[id]' order by id desc limit 1");
			$dd = mysql_fetch_array($ss);
			?>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
				<div class='imagecrop_proyek' style='background-image:url(http://peta.klikdesa.com/fotoproyek/<?php echo $dd['foto']; ?>);' title="<?php echo $dd['keterangan'];?>" ></div>
				<div class="carousel-caption">
				  <h4><?php echo $dd['nama']; ?></h4>
                </div>
			  </div>
			  <?php
				$ss2 = mysql_query("select * from fotoproyek where idproyek = '$d[id]' and id != '$dd[id]' order by id desc");
				while($dd2 = mysql_fetch_array($ss2)){
				?>
				<div class="item">
				  <div class='imagecrop_proyek' style='background-image:url(http://peta.klikdesa.com/fotoproyek/<?php echo $dd2['foto']; ?>);' title="<?php echo $dd2['keterangan'];?>" ></div>
					<div class="carousel-caption">
					  <h4><?php echo $dd2['nama']; ?></h4>
					</div>
				</div>
			  <?php
				}
			  ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel<?php echo $d['id']; ?>" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel<?php echo $d['id']; ?>" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $d['nama']; ?></h4>
          <table>
            <tr>
                <td>Tahun</td>
                <td>: <?php echo $d['tahun']; ?></td>
            </tr>
            <tr>
                <td>Bidang</td>
                <td>: <?php echo getData($d['bidang'],"id","bidang","nama"); ?></td>
            </tr>
            <tr>
                <td>Sumber Dana</td>
                <td>: <?php echo $d['sumberdana']; ?></td>
            </tr>
            <tr>
                <td>RAB</td>
                <td>: <?php echo $d['rab']; ?></td>
            </tr>
            <tr>
                <td>Pelaksana</td>
                <td>: <?php echo $d['pelaksana']; ?></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>: <?php echo $d['lokasi']; ?></td>
            </tr>
            <tr>
                <td>Volume</td>
                <td>: <?php echo $d['volume']; ?> M3/M2/M</td>
            </tr>
            <tr>
                <td>Dimensi</td>
                <td>: <?php echo $d['dimensi']; ?> Meter</td>
            </tr>
            <tr>
                <td>Spesifikasi</td>
                <td>: <?php echo $d['spesifikasi']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kegiatan</td>
                <td>: <?php echo getData($d['jenis_kegiatan'],"id","jeniskegiatan","nama"); ?></td>
            </tr>
          </table>
        </div>
      </div>
<?php
}
?>