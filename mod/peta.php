 <?php

include "koneksi.php";

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
	$kbupten1=str_replace('%20',' ',$kbupten);
 $kcamatan=strtolower($d['kecamatan']);
  $kcamatan1=str_replace('%20','',$kcamatan);
  $path=file_url("http://peta.klikdesa.com/geojson/$kbupten/$kcamatan.geojson");
    $KecPurwakarta= file_get_contents("$path");
       //$KecPurwakarta= file_get_contents("geojson/$kbupten/$kcamatan1.geojson"); 
		
	?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>GeoJSON to Google Maps</title>
	<style type="text/css">
		#left{
			width: 800px;
			height: 500px;
			float:left;
		}
		#right{
			width: 400px;
			height: 400px;
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
			height:100%;
			width: 100%;
		}
		#infoBox {
			width:300px;
		}
		#jendelainfo{
			position: fixed; 
			top: 50%;
			left: 50%;
			margin-top: -50px;
  margin-left: -100px;
  background-color: #FFFFFF; 
    border-width: 1px; 
    border-style: solid; 
    border-color: #DDDDDD; 
    border-radius: 0px; 
}
			
		
		.labels {
     color: white;
     background-color: red;
     font-family: "Lucida Grande", "Arial", sans-serif;
     font-size: 10px;
     text-align: center;
     width: 10px;
     white-space: nowrap;
   }
	</style>
	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&libraries=drawing"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgkkesTPfs8KZXf2slirgn6RSloD1LfvI&callback=initMap"
  type="text/javascript"></script>
	<script type="text/javascript" src="../js/GeoJSON.js"></script>
	    <script type="text/javascript" src="../js/maplabel.js"></script>
	    <script type="text/javascript" src="../js/v3_ll_grat.js"></script>
		 <script src="../lib/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
	var peta;
	var grid;
	var ttd=[];
var pertama = 0;
var jenis = "banjir";
var judulx = new Array();
var desx = new Array();
var provx = new Array();
var bencanax = new Array();
var id_infox = new Array();
var kateg = new Array();
var korbanx = new Array();
var penyebabx = new Array();
var tglx = new Array();
var id= new Array();
var gambar= new Array();
var lm = new Array();
var soul= new Array();
var koorx = new Array();
var koory = new Array();

var i;
var url;
var gambar_tanda;
	var parcelStyle = {
strokeColor: "#FF7800",
strokeOpacity: 1,
strokeWeight: 2,
fillColor: "#46461F",
fillOpacity: 0.1
};
		var map;
		currentFeature_or_Features = null;
	
		var KecPurwakarta = <?php  $KecPurwakarta=str_replace(array("\r", "\n"), '', $KecPurwakarta); echo($KecPurwakarta); ?>;
		
		
		
		var infowindow = new google.maps.InfoWindow();
		
		function init(){
			map = new google.maps.Map(document.getElementById('map'),{
				zoom: 15,
				center: new google.maps.LatLng(<?= "$d[koordinat]"; ?>),
				mapTypeId: google.maps.MapTypeId.Road 
			});
	


ambildatabase('awal');
			showFeature(KecPurwakarta,parcelStyle);
			
		  
		}
		
	


		
				function clearOverlays() {
  setAllMap(null);
}
function setAllMap(map) {
  for (var i = 0; i < ttd.length; i++) {
    ttd[i].setMap(map);
  }
}
		function clearMap(){
			if (!currentFeature_or_Features)
				return;
			if (currentFeature_or_Features.length){
				for (var i = 0; i < currentFeature_or_Features.length; i++){
					if(currentFeature_or_Features[i].length){
						for(var j = 0; j < currentFeature_or_Features[i].length; j++){
							currentFeature_or_Features[i][j].setMap(null);
						}
					}
					else{
						currentFeature_or_Features[i].setMap(null);
					}
				}
			}else{
				currentFeature_or_Features.setMap(null);
			}
			if (infowindow.getMap()){
				infowindow.close();
			}
		}
		function showFeature(geojson, style){
			clearMap();
			currentFeature_or_Features = new GeoJSON(geojson, style || null);
			if (currentFeature_or_Features.type && currentFeature_or_Features.type == "Error"){
				document.getElementById("put_geojson_string_here").value = currentFeature_or_Features.message;
				return;
			}
			if (currentFeature_or_Features.length){
				for (var i = 0; i < currentFeature_or_Features.length; i++){
					if(currentFeature_or_Features[i].length){
						for(var j = 0; j < currentFeature_or_Features[i].length; j++){
							currentFeature_or_Features[i][j].setMap(map);
							
						}
					}
					else{
						currentFeature_or_Features[i].setMap(map);
					}
					
				}
			}else{
				currentFeature_or_Features.setMap(map)
				
			}
			
			document.getElementById("put_geojson_string_here").value = JSON.stringify(geojson);
		}
		function showPetanya(geojson, style){
			clearMap();
			currentFeature_or_Features = new GeoJSON(geojson, style || null);
			if (currentFeature_or_Features.type && currentFeature_or_Features.type == "Error"){
				document.getElementById("put_geojson_string_here").value = currentFeature_or_Features.message;
				return;
			}
			if (currentFeature_or_Features.length){
				for (var i = 0; i < currentFeature_or_Features.length; i++){
					if(currentFeature_or_Features[i].length){
						for(var j = 0; j < currentFeature_or_Features[i].length; j++){
							currentFeature_or_Features[i][j].setMap(map);
							
						}
					}
					else{
						currentFeature_or_Features[i].setMap(map);
					}
					
				}
			}else{
				currentFeature_or_Features.setMap(map)
				
			}
			
			document.getElementById("put_geojson_string_here").value = JSON.stringify(geojson);
		}
		function rawGeoJSON(){
			clearMap();
			currentFeature_or_Features = new GeoJSON(JSON.parse(document.getElementById("put_geojson_string_here").value));
			if (currentFeature_or_Features.length){
				for (var i = 0; i < currentFeature_or_Features.length; i++){
					if(currentFeature_or_Features[i].length){
						for(var j = 0; j < currentFeature_or_Features[i].length; j++){
							currentFeature_or_Features[i][j].setMap(map);
							
						}
					}
					else{
						currentFeature_or_Features[i].setMap(map);
					}
					
				}
			}else{
				currentFeature_or_Features.setMap(map);
				
			}
		}
	

		function setInfoWindow (feature) {
			google.maps.event.addListener(feature, "click", function(event) {
				var content = "<div id='infoBox'><strong>GeoJSON Feature Properties</strong><br />";
				for (var j in this.geojsonProperties) {
					content += j + ": " + this.geojsonProperties[j] + "<br />";
				}
				content += "</div>";
				infowindow.setContent(content);
				infowindow.setPosition(event.latLng);
				infowindow.open(map);
			});
		}
		$(document).ready(function(){
    $("#tombol_simpan").click(function(){
        var x = $("#x").val();
        var y = $("#y").val();
        var judul = $("#judul").val();
        var des = $("#deskripsi").val();
		
		var id_info = $("#id_info").val();
		var id_prov = $("#id_prov").val();
		var id_bencana = $("#id_bencana").val();
		
		var korban = $("#korban").val();
		var penyebab = $("#penyebab").val();
		var tgl = $("#tgl").val();
		
        $("#loading").show();
        $.ajax({
            url: "modul/mod_peta/simpanlokasi.php",
            data: "x="+x+"&y="+y+"&jenis="+jenis+"&id_info="+id_info,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
				$("#id_info").val("");
				ambildatabase('akhir');
				document.location.href='?module=peta';
            }
        });
    });
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
	function close(){
		 $("#jendelainfo").fadeOut();
		
	}
	
});
function kasihtanda(lokasi){
    set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: map,
            icon: gambar_tanda,
			zIndex: 999
    });
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());

}


function set_icon(jenisnya){
    switch(jenisnya){
	
	<?php
	
$query2=mysql_query("select * from subkategori");
while($r2=mysql_fetch_array($query2)){ ?>
 case "<?= "$r2[id]"; ?>":
            gambar_tanda = '../gbrkat/<?= "$r2[gambar]"; ?>';
            break;
<?php } ?>
	
	
            }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildata.php?akhir=1&username=<?= "$_GET[id]"; ?>&jnis=<?= "$jnis"; ?>";
    }else{
        url = "ambildata.php?akhir=0&username=<?= "$_GET[id]"; ?>&jnis=<?= "$jnis"; ?>";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
               				id_infox[i] = msg.wilayah.petak[i].id_info;
								kateg[i] =msg.wilayah.petak[i].jenis;
                                lm[i] =msg.wilayah.petak[i].landmark;
								id[i] =msg.wilayah.petak[i].id;
								gambar[i] =msg.wilayah.petak[i].gambar;
								soul[i] =msg.wilayah.petak[i].status;
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
                       if(lm[i] == '10' || soul[i] == '1'){
                                var mapLabel = new MapLabel({
                                text: id_infox[i],
                                position: point,
                                map: map,
                                fontSize: 11,
                                    align: 'center'
                                });
                                mapLabel.set('position', point);

                       }
                       
                
				
			
            }
        }
    });
}

function setjenis(jns){
    jenis = jns;
}

function setinfo(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
		
		var contentString='<table id=ntable><tr><td colspan=2></td><tr><td><img src=../gbrmarker/medium_'+gambar[nomor]+'></td><td>'+id_infox[nomor]+'</td></tr></table>';
		var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 200
  });

    infowindow.open(map,petak);

		
			
		
    });
}

	</script>

</head>
<script src="../lib/js/bootstrap.min.js"></script>
<body onload="init();">


           
<div id="map" style="width: 100%; height: 100%;margin: 0px;padding: 0px"></div>
        
   


  
</body>
</html>
