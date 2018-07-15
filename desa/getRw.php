<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$s = mysql_query("select * from rw where desa = '$id' order by namarw asc");
?>
<h2 class='title'>Struktur RT dan RW</h2>
<ul>
<?php
while($d = mysql_fetch_array($s)){
    echo "<li>$d[namarw], Ketua : $d[ketuarw]";
    $ss = mysql_query("select * from rt where idrw = '$d[id]' order by namart asc");
    $rr = mysql_num_rows($ss);
    if($rr != 0){
        echo "<ul>";
    }
    while($dd = mysql_fetch_array($ss)){
        echo "<li>$dd[namart], Ketua : $dd[ketuart]</li>";
    }
    if($rr != 0){
        echo "</ul>";
    }
    echo "</li>";
}
?>
</ul>