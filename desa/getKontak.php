<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$kontak = getAllData($id,"desa","profilkades");
?>
<h2 class='title'>Kontak</h2>
<table class='table'>
    <tr>
        <td>Telepon</td>
        <td>: <?php echo $kontak['telpdesa']; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td>: <?php echo $kontak['email']; ?></td>
    </tr>
    <tr>
        <td>Facebook</td>
        <td>: <?php echo $kontak['facebook']; ?></td>
    </tr>
    <tr>
        <td>Twitter</td>
        <td>: <?php echo $kontak['twitter']; ?></td>
    </tr>
    <tr>
        <td>Instagram</td>
        <td>: <?php echo $kontak['instagram']; ?></td>
    </tr>
    <tr>
        <td>Whatapps</td>
        <td>: <?php echo $kontak['whatapps']; ?></td>
    </tr>
    <tr>
        <td>Website</td>
        <td>: <?php echo $kontak['website']; ?></td>
    </tr>
</table>