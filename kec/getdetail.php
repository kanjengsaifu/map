<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['ide']);
$q=mysql_fetch_array(mysql_query("select * from kegiatan where id='$id'"));
?>
   <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $q[namakegiatan];?></h4>
      </div>
      <div class="modal-body">
          <div align=center>	<img src=http://peta.klikdesa.com/kegiatan/<?php echo "medium_$q[foto]"; ?> ></div>
         <div class="media">
			
				<div class="media-body" style="text-align: justify;">
				 
				  <?php echo $q['keterangan']; ?>
				</div
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>