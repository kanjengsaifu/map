 <?php
include"koneksi.php";
error_reporting(0);
$id=$_GET['id'];
 $jnis=$_GET['jnis'];
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
	$kab=strtolower($b[id]);
	$kab1=strtolower($b[nama]);
	$kec=strtolower($rr[id]);
	$kec1=strtolower($rr[nama]);
	
       // $KecPurwakarta= file_get_contents("../geojson/$d[kabupaten]/$d[kecamatan].geojson");
		
	?>
	<?
			$qqq=mysql_query("select * from infostatus where desa like'$id%' and status in($jnis) ");
		
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
	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing,geometry"></script>
	<script type="text/javascript" src="../js/GeoJSON.js"></script>
	<script type="text/javascript" src="../js/map.js"></script>
		    <script type="text/javascript" src="../js/maplabel.js"></script>
	    <script type="text/javascript" src="../js/v3_ll_grat.js"></script>
		 <script src="../lib/js/jquery-1.9.1.min.js"></script>
	
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
				
		
		var Polytata = {
			"type": "MultiPolygon",
			"coordinates": [
				
			<? 
			$wow=mysql_num_rows($qqq);
			while($rq=mysql_fetch_array($qqq)){
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
}
			?>
			   
			 
			 
         ]
		};
				var infowindow = new google.maps.InfoWindow();
		
		function init(){
			map = new google.maps.Map(document.getElementById('map'),{
				zoom: 17,
				center: new google.maps.LatLng(<? echo"$d[koordinat]"; ?>),
				mapTypeId: google.maps.MapTypeId.Road 
			});
			
				
		


			
			drawPolytata();
   
		
		}
	
function set_icon(jenisnya){
    switch(jenisnya){
	
	<?
	
$query2=mysql_query("select * from subkategori");
while($r2=mysql_fetch_array($query2)){ ?>
 case "<? echo"$r2[id]"; ?>":
            gambar_tanda = 'gbrkat/<? echo"$r2[gambar]"; ?>';
            break;
<? } ?>
	
	
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
