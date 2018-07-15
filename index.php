<?php
include "mod/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klikdesa.com</title>

    <!-- Bootstrap -->
    <link href="lib/css/bootstrap.css" rel="stylesheet">
    <link href="lib/css/animate.css" rel="stylesheet">
    <link href="lib/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/css/perfect-scrollbar.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>	
<style>
 white-space: normal; 
      #map {
        height: 100%;
		z-index:99999;
      }
	  select{
		  width:150px;
		  
	  }
    </style>
    	<script>
    function FlipOtherCombo(objCombo, strOtherComboId,palu){
        if (objCombo.value ==="yes"){
            document.getElementById(strOtherComboId).value = palu;
        } else {
           document.getElementById(strOtherComboId).value = palu;
		   //document.getElementById(strOtherComboId).innerHTML = "<option value='" + palu + "' selected>" + palu + "</option>";
		   getKecamatan();
        }
    } 

	function FlipOtherCombokec(objCombo, strOtherComboId,palu){
        if (objCombo.value ==="yes"){
            document.getElementById(strOtherComboId).value = palu;
        } else {
	
           document.getElementById(strOtherComboId).value = palu;
		   //document.getElementById(strOtherComboId).innerHTML = "<option value='" + palu + "' selected>" + palu + "</option>";
		   getDesa();
        }
    }
	
	function FlipOtherCombodesa(objCombo, strOtherComboId,palu){
        if (objCombo.value ==="yes"){
            document.getElementById(strOtherComboId).value = palu;
        } else {
	
           document.getElementById(strOtherComboId).value = palu;
		   //document.getElementById(strOtherComboId).innerHTML = "<option value='" + palu + "' selected>" + palu + "</option>";
		   getData();
        }
    }
    function FlipOtherComboprov(objCombo, strOtherComboId,palu){
        if (objCombo.value ==="yes"){
            document.getElementById(strOtherComboId).value = palu;
        } else {
	
           document.getElementById(strOtherComboId).value = palu;
		   //document.getElementById(strOtherComboId).innerHTML = "<option value='" + palu + "' selected>" + palu + "</option>";
		   getCombo();
        }
    }
</script>
   <script>
  
   function getCookieData( name ) {
    var pairs = document.cookie.split("; "),
        count = pairs.length, parts; 
    while ( count-- ) {
        parts = pairs[count].split("=");
        if ( parts[0] === name )
            return parts[1];
    }
    return false;
}

function onloads(){
       
       var xCook = "<?php echo $_GET[id];?>";
 if(xCook==''){
     
 }else{
       getDataXX(xCook);
   }
}
   var dataKec;
   var dataKab;
   var sss;
   var tipe = "";
   function getCombo(){
	  tipe = "prov";
            $.get("mod/file.php?opt1="+$("#prov").val(), function(data){   
		         $("#kab").html(data);
				  dataKec=$("#prov").val();
				 sss=99;
				  document.getElementById('inti').style.display = 'none';
				  document.getElementById('rcontent').style.display = 'none';
				  document.getElementById('footnav').style.display = 'block';
				
				
				$.get("mod/datasebaran.php?opt1="+$("#kategbaru").val()+"&opt2="+dataKec+"&opt9=99", function(data){   
		         $("#datatablekec").html(data);
		      });
			    $.get("mod/grafik2.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9=99", function(data){   
		         $("#grafikkec").html(data);
		      });
			   $.get("mod/rekaptataguna.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9=99&tipe="+tipe, function(data){   
		         $("#tatagunkec").html(data);
		      });
			  $.get("mod/rekapstatus.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9=99&tipe="+tipe, function(data){   
		         $("#statuslahkec").html(data);
		      });
		      });
         }
		 function getDataz(){
            $.get("mod/datasebaran.php?opt1="+$("#jenis").val()+"&opt2="+dataKab, function(data){   
		         $(".sebaran").html(data);
		      });
         }
		 function getDatad(){
            $.get("mod/datasebaran.php?opt1="+$("#kategbaru").val()+"&opt2="+dataKec+"&opt9="+sss, function(data){   
		         $("#datatablekec").html(data);
		      });
			    $.get("mod/grafik2.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9="+sss, function(data){   
		         $("#grafikkec").html(data);
		      });
			  $.get("mod/rekaptataguna.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9="+sss, function(data){   
		         $("#tatagunkec").html(data);
		      });
			   $.get("mod/rekapstatus.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9="+sss, function(data){   
		         $("#statuslahkec").html(data);
		      });
         }
         function getGrafik(){
            $.get("mod/grafik2.php?id="+$("#tipe").val()+"&opt5="+dataKab, function(data){   
		         $(".grafik").html(data);
		      });
         }
		 function getGrafikxx(){
            $.get("mod/grafik2.php?id="+$("#tipe").val()+"&opt5="+dataKec, function(data){   
		         $("#grafikkec").html(data);
		      });
         }
		 function getKecamatan(){
			tipe = "kab";
            $.get("mod/file2.php?opt2="+$("#kab").val(), function(data){   
		         $("#kec").html(data);
				 dataKec=$("#kab").val();
				 sss=1;
				  document.getElementById('inti').style.display = 'none';
				  document.getElementById('rcontent').style.display = 'none';
				  document.getElementById('footnav').style.display = 'block';
				
				
				$.get("mod/datasebaran.php?opt1="+$("#kategbaru").val()+"&opt2="+dataKec+"&opt9=1", function(data){   
		         $("#datatablekec").html(data);
		      });
			    $.get("mod/grafik2.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9=1", function(data){   
		         $("#grafikkec").html(data);
		      });
			  $.get("mod/rekaptataguna.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9=1&tipe="+tipe, function(data){   
		         $("#tatagunkec").html(data);
		      });
			  
			   $.get("mod/rekapstatus.php?id="+$("#kategbaru").val()+"&opt5="+dataKec+"&opt9=1&tipe="+tipe, function(data){   
		         $("#statuslahkec").html(data);
		      });
		      });
			   
         }
		 function getDesa(){
			tipe = "kec";
			  $.get("mod/file4.php?opt4="+$("#kec").val(), function(data){
                 $("#status-tata").show();
		         $("#data").html(data);
				 dataKec=$("#kec").val();
				 sss=2;
				  document.getElementById('inti').style.display = 'none';
				  document.getElementById('rcontent').style.display = 'none';
				  document.getElementById('petanyah').style.display = 'block';
		      });
            $.get("mod/file3.php?opt3="+$("#kec").val(), function(data){   
		         $("#desa").html(data);
		      });
			  $.get("mod/file7.php?opt3="+$("#kec").val(), function(data){   
		         $("#listdesah").html(data);
		      });
              $("#item").slideUp();
              $("#footnav,.side").slideDown();
			  $.get("mod/filekat.php?desaid="+$("#kec").val(), function(data){   
		         $("#vmenu").html(data);
		      });
			  $("#lblProfile").empty();
                $("#lblProfile").append(" Profile Kecamatan");
				$("#lblKades").empty();
                $("#lblKades").append(" Profile Camat");
         }
		 function getData(){
		  tipe = "desa";
            $.get("mod/file4.php?opt4="+$("#desa").val(), function(data){   
		         $("#data").html(data);
				 dataKec=$("#desa").val();
				 sss=3;
				  document.getElementById('inti').style.display = 'none';
				  document.getElementById('rcontent').style.display = 'none';
				   document.getElementById('petanyah').style.display = 'block';
				   document.getElementById('profil').style.display = 'block';
		      });
			  $.get("mod/file5.php?opt4="+$("#desa").val(), function(data){   
		         $("#datadesah").html(data);
		      }); 
			  $.get("mod/file6.php?opt4="+$("#desa").val(), function(data){   
		         $("#datakades").html(data);
		      });
			  $.get("mod/filekat.php?desaid="+$("#desa").val(), function(data){   
		         $("#vmenu").html(data);
		      });
			  $("#lblProfile").empty();
                $("#lblProfile").append(" Profile Desa/Kelurahan");
				$("#lblKades").empty();
                $("#lblKades").append(" Profile Kades/ Lurah");
         }
		  function getDataXX(xx){
		      var texx="<?php echo $_GET[id];?>";
		   	 var prov=texx.substr(0,2);
		      	var kab=texx.substr(0,4);
				var kec=texx.substr(0,7);
	
            $.get("mod/file3.php?opt3="+kec, function(data){   
		         $("#desa").html(data);
		         	document.getElementById("desa").value=texx;
		         
		      });
		        $.get("mod/filekat.php?desaid="+texx, function(data){   
		         $("#vmenu").html(data);
		      });
		  tipe = "desa";
            $.get("mod/file4.php?opt4="+texx, function(data){   
		         $("#data").html(data);
				 dataKec=texx;
				 sss=3;
				  document.getElementById('inti').style.display = 'block';
				  document.getElementById('rcontent').style.display = 'block';
				   document.getElementById('petanyah').style.display = 'block';
				   document.getElementById('profil').style.display = 'block';
				   $(".side").slideDown();
				     $(".item").slideUp();
		      });
		     
		      document.getElementById("prov").value=prov;
		    
		       $.get("mod/file.php?opt1="+prov, function(data){   
		         $("#kab").html(data);
		         	var kab=texx.substr(0,4);
		          document.getElementById("kab").value=kab;
				 
				 sss=99;
				});
			
			
				 $.get("mod/file2.php?opt2="+kab, function(data){   
		         $("#kec").html(data);
		         	var kecc=texx.substr(0,7);
		          document.getElementById("kec").value=kecc;
				
				 sss=1;
				  });
			
				   dataKec=texx;
		
		     
		    
			  $("#lblProfile").empty();
                $("#lblProfile").append(" Profile Desa/Kelurahan");
				$("#lblKades").empty();
                $("#lblKades").append(" Profile Kades/ Lurah");
 }
        
   </script>
 </head>
<body>
  
  <div class='black_overlay'></div>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class='bgheader'>
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand"><img src='img/logo.png' height="50px" /></div>
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".menutop">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse menutop">
                    <ul class="nav navbar-nav navbar-right">
                       
                        <li class='active'><a href="http://peta.klikdesa.com">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='container' style='margin-top:80px'>
	
        <div class='row' >
            <div class='col-md-9' id='lcontent'>
                <div class='wilayah'>
                         <select name="prov" id="prov" onChange="getCombo()" >
						<option>Provinsi --</option>
						<?php $a=mysql_query("select * from provinsi");
                            while($b=mysql_fetch_array($a)){
                            echo"<option value=$b[id]>$b[nama]</option>";
                            
                            }	
                            ?>
						</select> <i class='fa fa-angle-right'></i>
                        <select name="kab" id="kab" onChange="getKecamatan()">
            			<option value="">Kabupaten --</option>	
						
					  </select> <i class='fa fa-angle-right'></i>
                        <select name="kec" id="kec" onChange="getDesa()">
            			<option value="">Kecamatan --</option>	
						
					  </select><i class='fa fa-angle-right'></i>
					  <select name="desa" id="desa" onChange="getData()">>
            			<option value="">Desa/Kel --</option>	
						
					  </select>
                
                            <!-- form cari 
                            <form method='post' action='?module=user'>
                              <div class='input-group'>
                                  <input type='text' name='q' required class='form-control' placeholder='Cari Nama Desa atau Kecamatan...' list='datadesa'>
                                  <span class='input-group-btn'>
                                    <button class='btn btn-default' name='cari' type='submit'>Cari</button>
                                  </span>
                              </div>
                            </form>
                          -->
                        
                </div>
                
                <div class='content' id="inti">
                   
                  
                        <div  id="peta">
                           <div id='status-tata' align=right><button id='kateg' class='btn btn-menu'>Database</button> <button id='tata' class='btn btn-menu'>Tataguna Lahan</button> <button id='status' class='btn btn-menu'>Status Lahan</button></div>
                           <div id=data> 
                               <?php include"mod/petas.php";?>
                           </div>
						</div>
                        
               
                
            </div>
            </div>
            <div class='col-md-3' id='rcontent'>
                <ul class='item' id='item'>
                  <li><a href='http://tanah.klikdesa.com' class='a'><i class='fa fa-map fa-lg'></i> Jual Beli Lahan</a></li>
                  <li><a href='http://ukm.klikdesa.com' class='b'><i class='fa fa-globe fa-lg'></i> Portal UKM Desa</a></li>
                  <li><a href='http://blog.klikdesa.com' class='c'><i class='fa fa-file-text fa-lg'></i> Blog Desa</a></li>
           
                </ul>
                <div class='side'>
                    <h2><span>Kategori</span></h2>
                    <!--  Kategori -->
                    <ul id='vmenu' class='sidenav' style='overflow: auto;height: 600px;'>
                    </ul> 
                </div>
                <div class='side2'>
                    <h2><span>Status Lahan</span></h2>
                    <!--  Kategori -->
                    <ul id='vmenux' class='sidenav'>
                      <?php
                        $s = mysql_query("select * from tbstatuslahan order by id asc");
                        while($d = mysql_fetch_array($s)){
                          echo "<li><input type='checkbox' id='status$d[id]' name='status$d[id]' value='$d[id]'/><label for='status$d[id]'>$d[namastatuslahan]</label>";
                          echo"</li>";
                        }
                      ?>
                      
                    </ul> 
                </div>
                <div class='side3'>
                    <h2><span>Tata Guna Lahan</span></h2>
                    <!--  Kategori -->
                    <ul id='vmenum' class='sidenav'>
                      <?php
                        $s = mysql_query("select * from tbtatagunalahan order by id asc");
                        while($d = mysql_fetch_array($s)){
                          echo "<li><input type='checkbox' id='tata$d[id]' name='tata$d[id]' value='$d[id]'/><label for='tata$d[id]'>$d[namatatagunalahan]</label><span class='ttg' style='clear:both;background-color:$d[warna];border-radius: 50%;width: 20px;height: 20px; padding:8px;border:2px solid #fff;'></span>";
                          echo"</li>";
                        }
                      ?>
                      
                    </ul> 
                </div>
            </div>
        </div>
        <div class='row' id='footnav'>
			
             <div class='col-md-9' id='lcontent'>
			    <div class='content'>
				<div class='kat'></div>
			   <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist" >
                     <li role="presentation" ><a href="#lcontent" aria-controls="input" id="petanyah"><span>Peta Desa</span></a></li>
					 
					 <li role="presentation" ><a href="#profil" aria-controls="input" id="profil"><span>Profil</span></a></li>
					 <li role="presentation" ><a href="http://datatabel.klikdesa.com/?id=<?php echo $_GET[id];?>" aria-controls="input" id="profil"><span>Data Tabel</span></a></li>
                    </ul>
                  
                </div>
			  </div>
			 </div>
			 <div class='col-md-3' >
			 
			   <ul class='item' id='item'>
                  <li><a href='http://tanah.klikdesa.com' class='a'><i class='fa fa-map fa-lg'></i> Jual Beli Lahan</a></li>
                  <li><a href='http://ukm.klikdesa.com' class='b'><i class='fa fa-globe fa-lg'></i> Portal UKM Desa</a></li>
                  <li><a href='http://blog.klikdesa.com' class='c'><i class='fa fa-file-text fa-lg'></i> Blog Desa</a></li>
                  <li><a href='http://warungwarga.com' class='d'><i class='fa fa-shopping-cart fa-lg'></i> Warung Warga</a></li>
                </ul>
			 </div>
        </div>
        <div class='footer'>
            <ul>
                <?php
				$s = mysql_query("select * from halaman order by judul asc");
				while($d = mysql_fetch_array($s)){
				  echo "<li><a href='javascript:void(0);' onclick='getHal($d[id],\"$d[judul]\");'>$d[judul]</a></li>";
				}
				?>
            </ul>
            &copy; 2016 Klikdesa.com - Masagi Solusi
        </div>
    </div>
    <style>
      .mac-scroller {
        position: relative;
        height: 200px;
      }
    </style>
    <script src="lib/js/jquery-1.9.1.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
	<script src="fixed-table/js/fixed_table_rc.js"></script>
    <script src="lib/js/jquery.cookie.min.js"></script>
    <script src="lib/js/jquery.navgoco.min.js"></script>
    <script src="lib/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="lib/js/overlay.js"></script>
    <script src="lib/js/highcharts.js"></script>
    <script src="lib/js/grid-light.js"></script>
    <script src="lib/js/exporting.js"></script>
    <script type="text/javascript">
	
    $(document).ready(function(){
        onloads();
         
	  $("#profil").click(function(){
		if (tipe == "desa") {
		  window.open('desa/profil.php?id='+$("#desa").val());
        }
		else if (tipe == "kec") {
		  window.open('kec/profil.php?id='+$("#kec").val());
        }
		else if (tipe == "kab") {
		  window.open('kab/profil.php?id='+$("#kab").val());
        }
		else if(tipe == "prov"){
		  window.open('prov/profil.php?id='+$("#prov").val());
		}
	  })
     document.getElementById('inti').style.display = 'none';
     document.getElementById('petanyah').style.display = 'none';
				  document.getElementById('rcontent').style.display = 'none';
				  document.getElementById('footnav').style.display = 'block';
				  
				getDatad();
				  $("#petanyah").click(function(){
           document.getElementById('inti').style.display = 'block';
            document.getElementById('status-tata').style.display = 'block';
           
     document.getElementById('petanyah').style.display = 'block';
				  document.getElementById('rcontent').style.display = 'block';
      });
				
      $("#vmenu span").click(function(){
        $("#vmenu span").parent().removeClass('open');
        $('.sub').slideUp();
          if (!$(this).parent().find('ul').is(':visible')) {
            $(this).parent().toggleClass('open');
            $(this).parent().find('ul').slideToggle();         
          }
      });  $("#vmenu label").click(function(){
        $("#vmenu label").parent().removeClass('open');
        $('.sub').slideUp();
          if (!$(this).parent().find('ul').is(':visible')) {
            $(this).parent().toggleClass('open');
            $(this).parent().find('ul').slideToggle();         
          }
      });
      var searchIDs = [];
      $("#vmenu li input[type=checkbox]").click(function(){
        if ($(this).is(':checked')) {
          $(this).parent().find(':checkbox').prop('checked',true);
		  
		  searchIDs.push($(this).val());
		   console.log(searchIDs);
		    $.get("mod/file4.php?opt4="+dataKec+"&opt5="+searchIDs, function(data){   
		         $("#data").html(data);
				 		      });
							  
        }
        else{
          $(this).parent().find(':checkbox').prop('checked',false);
          console.log($(this).val());
          console.log(searchIDs.indexOf($(this).val()));
		  searchIDs.splice(searchIDs.indexOf($(this).val()), 1);
		  $.get("mod/file4.php?opt4="+dataKec+"&opt5="+searchIDs, function(data){   
		         $("#data").html(data);
				 		      });
							
        }
      });
	  var searchTata = [];
	  $("#vmenum li input[type=checkbox]").click(function(){
        if ($(this).is(':checked')) {
          $(this).parent().find(':checkbox').prop('checked',true);
		  
		  searchTata.push($(this).val());
		   console.log(searchTata);
		    $.get("mod/filetata.php?opt4="+dataKec+"&opt5="+searchTata, function(data){   
		         $("#data").html(data);
				 		      });
							  
        }
        else{
          $(this).parent().find(':checkbox').prop('checked',false);
          console.log($(this).val());
          console.log(searchTata.indexOf($(this).val()));
		  searchTata.splice(searchTata.indexOf($(this).val()), 1);
		  $.get("mod/filetata.php?opt4="+dataKec+"&opt5="+searchTata, function(data){   
		         $("#data").html(data);
				 		      });
							
        }
      });
	   var searchStatus = [];
	  $("#vmenux li input[type=checkbox]").click(function(){
        if ($(this).is(':checked')) {
          $(this).parent().find(':checkbox').prop('checked',true);
		  
		  searchStatus.push($(this).val());
		   console.log(searchStatus);
		    $.get("mod/filestatus.php?opt4="+dataKec+"&opt5="+searchStatus, function(data){   
		         $("#data").html(data);
				 		      });
							  
        }
        else{
          $(this).parent().find(':checkbox').prop('checked',false);
          console.log($(this).val());
          console.log(searchStatus.indexOf($(this).val()));
		  searchStatus.splice(searchStatus.indexOf($(this).val()), 1);
		  $.get("mod/filestatus.php?opt4="+dataKec+"&opt5="+searchStatus, function(data){   
		         $("#data").html(data);
				 		      });
							
        }
      });
      
      $(".mac-scroller").perfectScrollbar();
      $(".mac-scroller").find(".ps-scrollbar-y-rail").css({"opacity":0.5});
      $("#kateg").click(function(){
        $(".side2,.side3").slideUp();
        $(".side").slideDown();
      });
      $("#status").click(function(){
        $(".side,.side3").slideUp();
        $(".side2").slideDown();
      });
      $("#tata").click(function(){
        $(".side,.side2").slideUp();
        $(".side3").slideDown();
      });
    });
	function getHal(id,judul){
        $.ajax({
		  url:'getHal.php',
		  type:'GET',
		  data:{id:id},
		  success:function(data){
			$("#halaman").modal('show');
			$(".modal-title").text(judul);
			$(".modal-body").html(data);
		  }
		});
      }
	</script>

  <!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="halaman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 style='border-bottom:none;' class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>
</body>
</html>