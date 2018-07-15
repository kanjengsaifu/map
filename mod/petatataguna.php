 <?php
include "koneksi.php";
include "base_url.php";
error_reporting(0);
$id=$_GET['opt4'];

 $jnis=$_GET['opt5'];
$q=mysql_query("select * from desa where id LIKE('$id%')");
$r=mysql_fetch_array($q);
$qq=mysql_query("Select * from kecamatan where id='$r[id_kecamatan]'");
$rr=mysql_fetch_array($qq);
$a=mysql_query("Select * from kabupaten where id='$rr[id_kabupaten]'");
$b=mysql_fetch_array($a);
$c=mysql_query("select * from users where username='$id'");
$d=mysql_fetch_array($c);

?>
<?php   
function file_url($url){
  $parts = parse_url($url);
  $path_parts = array_map('rawurldecode', explode('/', $parts['path']));

  return
    $parts['scheme'] . '://' .
    $parts['host'] .
    implode('/', array_map('rawurlencode', $path_parts))
  ;
}
	$kab=strtolower($b['id']);
	$kab1=strtolower($b['nama']);
	$kec=strtolower($rr['id']);
	$kec1=strtolower($rr['nama']);
	$kbupten=htmlentities(strtolower($d['kabupaten']));
	$kbupten1=str_replace('%20',' ',$kbupaten);
 $kcamatan=strtolower($d['kecamatan']);
  $kcamatan1=str_replace('%20','',$kcamatan);
  $path=file_url("http://peta.klikdesa.com/geojson/$kbupten/$kcamatan.geojson");
	$KecPurwakarta= file_get_contents("$path"); 
			$query = 'select * from infotataguna where desa like '.$id.' and tataguna in('.$jnis.') ';
			$qqq=mysql_query($query);

	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>GeoJSON to Google Maps</title>
	<style type="text/css">
		#left{
			width: 900px;
			height: 500px;
			float:left;
		}
		#right{
			width: 200px;
			height: 500px;
			float:left;
			padding: 10px;
		}
		#right div{
			margin-bottom: 4px;
		}
		#right textarea{
			height: 150px;
			width: 300px;
		}
		#map{
			height:500px;
		}
		#infoBox {
			width:300px;
		}
		
	</style>
	<!-- <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgkkesTPfs8KZXf2slirgn6RSloD1LfvI&v=3&amp;sensor=false&libraries=drawing"
	async defer ></script> -->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgkkesTPfs8KZXf2slirgn6RSloD1LfvI&v=3&amp;sensor=false&libraries=drawing"></script>
	<script type="text/javascript" src="../js/GeoJSON.js"></script>
	<script type="text/javascript" src="<?= $base_url ?>js/map.js"></script>
		    <script type="text/javascript" src="<?= $base_url ?>js/maplabel.js"></script>
	    <script type="text/javascript" src="<?= $base_url ?>js/v3_ll_grat.js"></script>
		 <script src="<?= $base_url ?>lib/js/jquery-1.9.1.min.js"></script>
		
	<script type="text/javascript">
	var peta;
	var grid;
var pertama = 0;
var jenis = "banjir";
var judulx = new Array();
var desx = new Array();
var provx = new Array();
var bencanax = new Array();
var id_infox = new Array();

var korbanx = new Array();
var penyebabx = new Array();
var tglx = new Array();
var calculated_acres;
var koorx = new Array();
var koory = new Array();
var koory = new Array();
var i;
var url;
var gambar_tanda;
		var map;
		currentFeature_or_Features = null;
		var KecPurwakarta = <?php  $KecPurwakarta=str_replace(array("\r", "\n"), '', $KecPurwakarta); echo($KecPurwakarta); ?>;
			
		
		<?php 
			$wow=mysql_num_rows($qqq);
			$ko=1;
			while($rq=mysql_fetch_array($qqq)){
				echo"var Polytata$ko = {
			\"type\": \"MultiPolygon\",
			\"coordinates\": [";
				echo"[[";
$data=$rq['koor'];
 $coords = null;
preg_match_all('/\((.*?)\)/', $data, $matches);
         
        $coords= $matches[1];
		$count=count($coords);
 foreach ( $coords as $i=>$coord ):
 $kor=explode(',',$coord);
 $lat=$kor[0] ;
$lng=$kor[1];

	echo"[$lng,$lat]";
		$cntt=$count-1;
	if($i==$cntt){
		echo"";
	
	}else{
	echo",";
	
	}
  endforeach;
  echo"]]";
  $wow--;
  if($wow=='0'){
	  echo"";
  }else{
	  echo",";
  }
  echo"]};";
  $ko++;
}

			?>
				var infowindow = new google.maps.InfoWindow();
		
		function init(){
			map = new google.maps.Map(document.getElementById('map'),{
				zoom: 13,
				center: new google.maps.LatLng(<?php echo "$d[koordinat]"; ?>),
				mapTypeId: google.maps.MapTypeId.Road 
			});
			 var feature1;
var stylenya = {
strokeColor: "#FF7800",
strokeOpacity: 1,
strokeWeight: 2,
fillColor: "#46461F",
fillOpacity: 0.1
};	
		showFeature(feature1,KecPurwakarta,stylenya);
			
			
var feature3;
			
	<?php
			$jk=1;
			$qrt=mysql_query("select * from infotataguna where desa like'$id%'");
			while($rh=mysql_fetch_array($qrt)){
				$pol=mysql_query("Select * from tbtatagunalahan where id='$rh[tataguna]'");
				$por=mysql_fetch_array($pol);
				echo"
	 var style$jk = {strokeColor: '#00CC66',strokeOpacity: 0.8,strokeWeight: 1,fillColor: '$por[warna]',fillOpacity: 0.5};		
	 var myGoogleVector$jk = new GeoJSON(Polytata$jk,style$jk);
		//if (myGoogleVector.error){
	 	if (myGoogleVector$jk.type && myGoogleVector$jk.type == \"Error\"){	
        // Handle the error.
			alert('error: format peta salah');return;
		}else{
		 showFeature(feature3,Polytata$jk,style$jk);    
     }";
$jk++;	 
		}
   ?>
  
			
		}
	
function set_icon(jenisnya){
    switch(jenisnya){
	
	<?php
	
$query2=mysql_query("select * from subkategori");
while($r2=mysql_fetch_array($query2)){ ?>
 case "<?php echo "$r2[id]"; ?>":
            gambar_tanda = 'gbrkat/<? echo"$r2[gambar]"; ?>';
            break;
<?php } ?>
	
	
            }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "modul/mod_peta/ambildata.php?akhir=1";
    }else{
        url = "modul/mod_peta/ambildata.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
               				id_infox[i] = msg.wilayah.petak[i].id_info;
								
				koorx[i] = msg.wilayah.petak[i].x;
				koory[i] = msg.wilayah.petak[i].y;
				
                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: map,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);

            }
        }
    });
}

function setjenis(jns){
    jenis = jns;
}

function setinfo(petak, nomor){
       google.maps.event.addListener(petak, 'click', function() {
		var contentString='Keterangan<br>'+id_infox[nomor];
		var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 200
  });

    infowindow.open(map,petak);
   
       });
}
$(document).ready(function(){
	var WH = $(window).height();
                $("#map").css('height',WH-140);
		$(window).on('resize',function(){
                	var WH = $(this).height();
                	$("#map").css('height',WH-140);
            	});
});
	</script>
</head>

<body onload="init();">
 <div id="map" style="width:100%; height:500px"></div>

</body>
</html>
