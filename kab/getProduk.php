<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
?>
<h2 class='title'>Produk Unggulan Kabupaten</h2>
Tentukan Kecamatan : <select id='kec'>
    <option value=''>Pilih</option>
    <?php
    $q = mysql_query("select * from kecamatan where id_kabupaten = '$id' order by nama");
    while($r = mysql_fetch_array($q)){
        echo "<option value='$r[id]'>$r[nama]</option>";
    }
    ?>
</select>
<br/><br/>
<div id='produk'></div>
<script>
    $(document).ready(function(){
       $("#kec").change(function(){
            $.ajax({
               url:'reqProduk.php',
               type:'GET',
               data:{id:$("#kec").val()},
               beforeSend:function(){
                    $("#produk").html('sedang memuat...');
               },
               success:function(data){
                    if (data == '') {
                        $("#produk").html("Tidak ditemukan produk unggulan pada kecamatan ini.")
                    }
                    else{
                        $("#produk").html(data);
                    }
               }
            });
       });
    });
</script>