<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$nama = getData($id,"id","kabupaten","nama");
$prov = getData($id,"id","kabupaten","id_prov");
$namaprov = getData($prov,"id","provinsi","nama");
$bupati = getAllData($id,"kab","profilebupati");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	<meta property="og:url"           content="http://klikdesa.com/kab/profil.php?id=<?php echo $id; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Profil <?php echo $nama; ?>, <?php echo $namaprov; ?> - Klikdesa.com" />
	<meta property="og:description"   content="Profil <?php echo $nama; ?>, <?php echo $namaprov; ?> - Klikdesa.com" />
	<meta property="og:image"         content="http://peta.klikdesa.com/fotobupati/<?php echo $bupati['foto']; ?>" />
    <title>Profil <?php echo $nama; ?>, <?php echo $namaprov; ?> - Klikdesa.com</title>

    <!-- Bootstrap -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../lightslider/src/css/lightslider.css" />  
	<link href="../style.css" rel="stylesheet">
    <link href="../lib/css/animate.css" rel="stylesheet">
    <link href="../lib/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/css/perfect-scrollbar.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
  </head>
  <body>
	<div class="navbar navbar-default navbar-static-top">
        <div class='bgheader'>
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand"><a href='http://klikdesa.com'><img src='../img/logo.png' height="50px" /></a></div>
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".menutop">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse menutop">
                    <ul class="nav navbar-nav navbar-right">
                       <li class='active'><a href="http://hoteldiindonesia.net">Wisata </a></li>
                        <li class='active'><a href="http://peta.klikdesa.com">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='container'>
	  <div class='wrapper'>
        <div class='midcontent'>
            <h1 class='txprofil'><?php echo $nama; ?></h1>
			<?php echo $namaprov; ?><br/>
            <div class='imagecrop_profil' style='background-image:url(http://peta.klikdesa.com/fotobupati/<?php echo $bupati['foto']; ?>);'></div>
            <br/>
            Bupati
            <h2 class='txnama'><?php echo $bupati['nama']; ?></h2>
            Masa Bakti (<?php echo $bupati['masabaktiawal']." s/d ".$bupati['masabaktiakhir']; ?>)
        </div>
			<?php
			echo "<ul id='lightSlider' class='cs-hidden profil'>";
			$s = mysql_query("select * from kecamatan where id_kabupaten = '$id' order by id desc");
			while($d = mysql_fetch_array($s)){
			  $ss = mysql_query("select * from profilecamat where kec = '$d[id]'");
			  $dd = mysql_fetch_array($ss);
			  
			  echo "<li>
						<div class='fprofil'>
						<h3 class='title'><a href='../kec/profil.php?id=$d[id]'>Kecamatan $d[nama]</a></h3>
						  <div class='imagecrop_thumb' style='background-image:url(http://peta.klikdesa.com/fotocamat/$dd[foto]);'></div>
							<br/>Camat
							<h4>$dd[nama]</h4>
							TMT ($dd[tmt])
						  </div>
					  </li>";
			}
			echo "</ul>";
			?>
		<br/>
		  <h2 class='title'><center>Galeri Kegiatan <?php echo $nama; ?></center></h2>
		  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<?php
			$s = mysql_query("select * from kegiatan where desa = '$id' order by id desc limit 1");
			$d = mysql_fetch_array($s);
			?>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
				<div class='imagecrop_slider' style='background-image:url(http://peta.klikdesa.com/kegiatan/<?php echo $d['foto']; ?>);' title="<?php echo $d['namakegiatan'];?>" ></div>
                <div class="carousel-caption">
				  <h3><?php echo $d['namakegiatan']; ?></h3>
                </div>
              </div>
			  <?php
			  $ss = mysql_query("select * from kegiatan where desa = '$id' and id != '$d[id]' order by id desc");
			  while($dd = mysql_fetch_array($ss)){
			  ?>
              <div class="item">
				<div class='imagecrop_slider' style='background-image:url(http://peta.klikdesa.com/kegiatan/<?php echo $dd['foto']; ?>);' title="<?php echo $dd['namakegiatan'];?>" ></div>
                <div class="carousel-caption">
				  <h3><?php echo $dd['namakegiatan']; ?></h3>
                </div>
              </div>
			  <?php
			  }
			  ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
		<div class='row'>
		  <div class='col-md-8'>
			<div class='overcontent' id='cont'>
			  <h2 class='title'>Foto Kegiatan Kabupaten</h2>
			  <?php
			  $sss = mysql_query("select * from kegiatan where desa = '$id' order by id desc");
			  while($ddd = mysql_fetch_array($sss)){
			  ?>
			  <div class="media">
				<div class="media-left">
					<div class="media-object imagecrop_media"  style='background-image:url(http://peta.klikdesa.com/kegiatan/<?php echo $ddd['foto']; ?>)'></div>
				</div>
				<div class="media-body">
				  <h4 class="media-heading"><?php echo $ddd['namakegiatan']; ?></h4>
				  <?php echo $ddd['keterangan']; ?>
				</div>
			  </div>
			  <?php
			  }
			  ?>
			</div>
			<br/>
			  <h2 class='title'>Tambahkan Komentar</h2>
			  <!-- Comment box -->
			  <div id="fb-root"></div>
			  <script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=163216883742806";
				fjs.parentNode.insertBefore(js, fjs);
			  }(document, 'script', 'facebook-jssdk'));</script>
			  <div class="fb-comments" data-href="http://klikdesa.com/kab/profil.php?id=<?php echo $id; ?>" data-width="100%" data-numposts="5"></div>
		  </div>
		  <div class='col-md-4'>
			<div class='sidecontent'>
			<h2 class='title'>Informasi Kabupaten</h2>
			<ul class="list-group">
			  <li class="list-group-item"><a href='javascript:void(0);' id='sly'>Selayang Pandang</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='org'>Struktur Organisasi</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='keg'>Foto Kegiatan</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='produk'>Produk Unggulan</a></li>
			</ul>
			<h2 class='title'>Bagikan Profil</h2>
			  <!-- Your share button code -->
			  <div class="fb-like" data-href="http://klikdesa.com/kab/profil.php?id=<?php echo $id; ?>" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
			<br/>
			<br/>
			<br/>
			<h2 class='title'>Profil Kabupaten Lainnya</h2>
			<div class='overside'>
			<ul class="list-group">
			<?php
			$a = mysql_query("select * from kabupaten where id != '$id' and id_prov = '$prov' order by id desc");
			while($b = mysql_fetch_array($a)){
			  $c = mysql_query("select * from profilekab where kab = '$b[id]' and nama != '' and foto != ''");
			  $d = mysql_num_rows($c);
			  if($d == 0){
				echo "<li class='list-group-item'><a href='profil.php?id=$b[id]'>$b[nama] (Belum Lengkap)</a></li>";
			  }
			  else{
				echo "<li class='list-group-item'><a href='profil.php?id=$b[id]'>$b[nama]</a></li>";
			  }
			}
			?>
			</ul>
			</div>
			</div>
		  </div>
		  </div>
		</div>
    </div>
	<script src="../lib/js/jquery-1.9.1.min.js"></script>
	<script src="../lightslider/src/js/lightslider.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
	<script type='text/javascript'>
	  $(document).ready(function(){
		$("#lightSlider").lightSlider({
		  item:3,
		  pager:false,
		  slideMove:3,
		  responsive : [
            {
                breakpoint:800,
                settings: {
                    item:3,
                    slideMove:3,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1
                  }
            }
        ]
		});
		
		$html = $("#cont").html();
		$("#org").click(function(e){
		  $.ajax({
			url:'getOrganisasi.php',
			type:'GET',
			data:{id:<?php echo $id; ?>},
			success:function(data){
			  $("#cont").html(data);
			  $('html, body').animate({
					scrollTop: $("#cont").offset().top
				}, 1000);
			}
		  });
		});
		$("#sly").click(function(e){
		  $.ajax({
			url:'getSelayang.php',
			type:'GET',
			data:{id:<?php echo $id; ?>},
			success:function(data){
			  $("#cont").html(data);
			  $('html, body').animate({
					scrollTop: $("#cont").offset().top
				}, 1000);
			}
		  });
		});
		$("#produk").click(function(e){
		  $.ajax({
			url:'getProduk.php',
			type:'GET',
			data:{id:<?php echo $id; ?>},
			success:function(data){
			  $("#cont").html(data);
			  $('html, body').animate({
					scrollTop: $("#cont").offset().top
				}, 1000);
			}
		  });
		});
		$("#proyek").click(function(e){
		  $.ajax({
			url:'getProyek.php',
			type:'GET',
			data:{id:<?php echo $id; ?>},
			success:function(data){
			  $("#cont").html(data);
			  $('html, body').animate({
					scrollTop: $("#cont").offset().top
				}, 1000);
			}
		  });
		});
		$("#keg").click(function(e){
		  $("#cont").html($html);
		  $('html, body').animate({
				scrollTop: $("#cont").offset().top
			}, 1000);
		});
	  });
	</script>
  </body>
</html>