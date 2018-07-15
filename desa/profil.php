<?php
include "../mod/koneksi.php";
include "../mod/fungsi.php";
$id = abs($_GET['id']);
$nama = getData($id,"id","desa","nama");
$kec = getData($id,"id","desa","id_kecamatan");
$namakec = getData($kec,"id","kecamatan","nama");
$kab = getData($kec,"id","kecamatan","id_kabupaten");
$namakab = getData($kab,"id","kabupaten","nama");
$kades = getAllData($id,"desa","profilekades");

$status = getStatusDesa($id);
if($status == "Kelurahan"){
  $prof = "Lurah";
}
else{
  $prof = "Kepala Desa";
}
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
	<meta property="og:url"           content="http://klikdesa.com/desa/profil.php?id=<?php echo $id; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Profil <?php echo $status; ?> <?php echo $nama; ?>, Kecamatan <?php echo $namakec; ?>, <?php echo $namakab; ?> - Klikdesa.com" />
	<meta property="og:description"   content="Profil <?php echo $status; ?> <?php echo $nama; ?>, Kecamatan <?php echo $namakec; ?>, <?php echo $namakab; ?> - Klikdesa.com" />
	<meta property="og:image"         content="http://peta.klikdesa.com/fotokades/<?php echo $kades[foto]; ?>" />
    <title>Profil <?php echo $status; ?> <?php echo $nama; ?>, Kecamatan <?php echo $namakec; ?>, <?php echo $namakab; ?> - Klikdesa.com</title>

    <!-- Bootstrap -->
    <link href="../lib/css/bootstrap.css" rel="stylesheet">
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
                        <li class='active'><a href="http://petadesa.klikdesa.com?id=<?php echo"$id"; ?>"  >Peta</a></li>
                        <li class='active'><a href="http://peta.klikdesa.com">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='container'>
	  <div class='wrapper'>
        <div class='midcontent'>
            <h1 class='txprofil'><?php echo $status; ?> <?php echo $nama; ?></h1>
			Kecamatan <a href='../kec/profil.php?id=<?php echo $kec; ?>'><?php echo $namakec; ?></a>, <?php echo $namakab; ?><br/>
			<?php
			if($kades[foto]==''){
			    echo"<div class='imagecrop_profil' style='color:black;'><br><b>Kirim Nama dan foto<br> Kades/Lurah <br>ke WA Klikdesa <br>(0822-1533-1648)<br> Kami bantu upload</b></div>";
			}else{
			?>
            <div class='imagecrop_profil' style='background-image:url(http://peta.klikdesa.com/fotokades/<?php echo "medium_$kades[foto]"; ?>);'></div>
           <?php
			}
           ?>
            <br/>
			<?php echo $prof; ?>
            <h2 class='txnama'><?php echo $kades['namakades']; ?></h2>
            Masa jabatan (<?php echo $kades['awaljabatan']." s/d ".$kades['akhirjabatan']; ?>)
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<?php
			$s = mysql_query("select * from kegiatan where desa = '$id' order by id desc limit 1");
			$d = mysql_fetch_array($s);
			if($d != ""){
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
				<div class='imagecrop_slider' style='background-image:url(http://peta.klikdesa.com/kegiatan/<?php echo "medium_$dd[foto]"; ?>);' title="<?php echo $dd['namakegiatan'];?>" ></div>
                <div class="carousel-caption">
				  <h3><?php echo $dd['namakegiatan']; ?></h3>
                </div>
              </div>
			  <?php
			  }
			}
			else{
			?>
			<div class="carousel-inner" role="listbox">
			  <div class="item active">
				<img src='../img/iklan2.jpg' class='img-responsive' />
              </div>
              <div class="item">
				<img src='../img/iklan.jpg' class='img-responsive'/>
              </div>
              <div class="item">
				<img src='../img/iklan3.jpg' class='img-responsive'/>
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
		    <p style="color:red;">(Bagi Desa yang mau mengisi data silahkan hubungi wa klikdesa 0822-1533-1648)</p>
			<div class='overcontent' id='cont'>
			  <h2 class='title'>Kabar dari <?php echo $status; ?></h2>
			  <div align=center style='background-color:orange;'><b>Kirim Kabar Desa Anda disertai foto ke WA klikdesa (0822-1533-1648)
<br> Atau ke email klikdesa@gmail.com</b></div>
			  <?php
			  $sss = mysql_query("select * from kegiatan where desa = '$id' order by id desc");
			  while($ddd = mysql_fetch_array($sss)){
			  ?>
			  <div class="media">
				<div class="media-left">
					<div class="media-object imagecrop_media"  style='background-image:url(http://peta.klikdesa.com/kegiatan/<?php echo "medium_$ddd[foto]"; ?>)'></div>
				</div>
				<div class="media-body">
				  <h4 class="media-heading"><?php echo $ddd['namakegiatan']; ?></h4>
				  <?php 
				  $kete=substr($ddd['keterangan'],0,200);
				  echo $kete; 
				  echo'...';
				  
				  ?><a href='#' data-toggle="modal" data-target="#myModal" onclick="getdetail(<?php echo$id;?>,<?php echo$ddd[id];?>)"> More</a>
				</div>
			  </div>
			  <?php
			  }
			  ?>
			</div>
			<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div id="dataDetail"></div>
   
    </div>

  </div>
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
			  <div class="fb-comments" data-href="http://klikdesa.com/desa/profil.php?id=<?php echo $id; ?>" data-width="100%" data-numposts="5"></div>
		  </div>
		  <div class='col-md-4'>
			<div class='sidecontent'>
			<h2 class='title'>Informasi <?php echo $status; ?></h2>
			<ul class="list-group">
			  <li class="list-group-item"><a href='javascript:void(0);' id='org'>Struktur Organisasi</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='rt'>Struktur RT dan RW</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='demo'>Demografi</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='topo'>Topologi</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='sosek'>Sosial Ekonomi</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='uang'>Keuangan</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='keg'>Kabar dari Desa</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='produk'>Produk Unggulan</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='rutilahu'>Rumah Tidak Layak Huni</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='proyek'>Data Proyek</a></li>
			  <li class="list-group-item"><a href='javascript:void(0);' id='kontak'>Kontak</a></li>
			</ul>
			<h2 class='title'>Bagikan Profil</h2>
			  <!-- Your share button code -->
			  <div class="fb-like" data-href="http://klikdesa.com/desa/profil.php?id=<?php echo $id; ?>" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
			<br/>
			<br/>
			<br/>
			<h2 class='title'>Profil Lainnya</h2>
			<div class='overside'>
			<ul class="list-group">
			<?php
			$a = mysql_query("select * from desa where id != '$id' and id_kecamatan = '$kec' order by id desc");
			while($b = mysql_fetch_array($a)){
			  $c = mysql_query("select * from profilekades where desa = '$b[id]' and namakades != '' and foto != ''");
			  $d = mysql_num_rows($c);
			  if($d == 0){
				echo "<li class='list-group-item'><a href='profil.php?id=$b[id]'>".getStatusDesa($b['id'])." $b[nama] (Belum Lengkap)</a></li>";
			  }
			  else{
				echo "<li class='list-group-item'><a href='profil.php?id=$b[id]'>".getStatusDesa($b['id'])." $b[nama]</a></li>";
			  }
			}
			?>
			</ul></div>
			</div>
		  </div>
		  </div>
		</div>
    </div>
	<script src="../lib/js/jquery-1.9.1.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
	<script type='text/javascript'>
	function f(z){
  
    testwindow = window.open("http://petadesa.klikdesa.com", "_self");
        document.cookie = "desaZ="+z+("; path=/");
		
}
function getdetail(x,y){
     $.ajax({
			url:'getdetail.php',
			type:'GET',
			data:{ide:y },
			success:function(data){
			  $("#dataDetail").html(data);
			 
			}
		  });
    
}
	  $(document).ready(function(){
	      
	      
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
		$("#rt").click(function(e){
		  $.ajax({
			url:'getRw.php',
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
		$("#demo").click(function(e){
		  $.ajax({
			url:'getDemo.php',
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
		$("#topo").click(function(e){
		  $.ajax({
			url:'getTopologi.php',
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
		$("#sosek").click(function(e){
		  $.ajax({
			url:'getSosek.php',
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
		$("#uang").click(function(e){
		  $.ajax({
			url:'getKeuangan.php',
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
		$("#rutilahu").click(function(e){
		  $.ajax({
			url:'getRutilahu.php',
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
		$("#kontak").click(function(e){
		  $.ajax({
			url:'getKontak.php',
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