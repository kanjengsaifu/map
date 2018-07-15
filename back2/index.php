<?
include"mod/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
      #map {
        height: 100%;
		z-index:99999;
      }
	  select{
		  width:150px;
		  
	  }
    </style>
   <script>
   var dataKec;
   var dataKab;
   function getCombo(){
            $.get("mod/file.php?opt1="+$("#prov").val(), function(data){   
		         $("#kab").html(data);
				 $("#lblProfile").empty();
                $("#lblProfile").append(" Profile Provinsi");
				$("#lblKades").empty();
                $("#lblKades").append(" Profile Gubernur");
		      });
         }
		 function getDataz(){
            $.get("mod/datasebaran.php?opt1="+$("#jenis").val()+"&opt2="+dataKab, function(data){   
		         $(".sebaran").html(data);
		      });
         }
         function getGrafik(){
            $.get("mod/grafik2.php?id="+$("#tipe").val()+"&opt5="+dataKab, function(data){   
		         $(".grafik").html(data);
		      });
         }
		 function getKecamatan(){
            $.get("mod/file2.php?opt2="+$("#kab").val(), function(data){   
		         $("#kec").html(data);
				 dataKab=$("#kab").val();
				  $("#lblProfile").empty();
                $("#lblProfile").append(" Profile Kabupaten /Kota");
				$("#lblKades").empty();
                $("#lblKades").append(" Profile Walikota/ Bupati");
		      });
         }
		 function getDesa(){
			  $.get("mod/file4.php?opt4="+$("#kec").val(), function(data){
                 $("#status-tata").show();
		         $("#data").html(data);
				 dataKec=$("#kec").val();
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
            $.get("mod/file4.php?opt4="+$("#desa").val(), function(data){   
		         $("#data").html(data);
				 dataKec=$("#desa").val();
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
		

		
   </script>
 </head>
<body>
  <div id='sebaran'><div class='close' title='Tutup'><i class='fa fa-times fa-lg'></i></div><? include"mod/sebaran.php";?><div class='sebaran mac-scroller'></div></div>
  <div id='grafik'><div class='close' title='Tutup'><i class='fa fa-times fa-lg'></i></div><? include"mod/grafik.php";?><div class='grafik mac-scroller'></div></div>
  <div class='black_overlay'></div>
    <div class="navbar navbar-default">
        <div class='bgheader'>
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand"><img src='lib/img/logo.png'/></div>
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
    <div class='container'>
	
        <div class='row'>
            <div class='col-md-9' id='lcontent'>
                <div class='wilayah' data-spy="affix" data-offset-top="121">
                        <select name="prov" id="prov" onChange="getCombo()">
						<option>Provinsi</option>
						<? $a=mysql_query("select * from provinsi");
                            while($b=mysql_fetch_array($a)){
                            echo"<option value=$b[id]>$b[nama]</option>";
                            
                            }	
                            ?>
						</select> <i class='fa fa-angle-right'></i>
                        <select name="kab" id="kab" onChange="getKecamatan()">
            			<option value="">-- Plih Kabupaten --</option>	
						
					  </select> <i class='fa fa-angle-right'></i>
                        <select name="kec" id="kec" onChange="getDesa()">
            			<option value="">-- Plih Kecamatan --</option>	
						
					  </select><i class='fa fa-angle-right'></i>
					  <select name="desa" id="desa" onChange="getData()">>
            			<option value="">-- Plih Desa --</option>	
						
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
                
                <div class='content'>
                    <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#peta" aria-controls="input" role="tab" data-toggle="tab">Peta</a></li>
                      <li role="presentation"><a href="#desah" aria-controls="input" role="tab" data-toggle="tab"><span id='lblProfile'>Profile Provinsi</span></a></li>
                      <li role="presentation"><a href="#kades" aria-controls="lihat" role="tab" data-toggle="tab"><span id='lblKades'>Profile Gubernur</span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="peta">
                           <div id='status-tata' align=right><button id='kateg' class='btn btn-menu'>Kategori</button> <button id='tata' class='btn btn-menu'>Tataguna Lahan</button> <button id='status' class='btn btn-menu'>Status Lahan</button></div>
                           <div id=data> 
                              <iframe src="mod/petas.php" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                           </div>
						</div>
                        <div role="tabpanel" class="tab-pane" id="desah">
						<div id="datadesah"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="kades">
						<div id="datakades"></div><div id=data> 
                              <iframe src="mod/petas.php" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                           </div>
                        </div>
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
                    <ul id='vmenu' class='sidenav' style='overflow: scroll;height: 660px;'>
                     
					
                      
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
                          echo "<li><input type='checkbox' id='tata$d[id]' name='tata$d[id]' value='$d[id]'/><label for='tata$d[id]'>$d[namatatagunalahan]</label><button style='background:$d[warna];font-size: 16px;padding: 15px 32px;' width='5px' height='10px' align='right'>";
                          echo"</li>";
                        }
                      ?>
                      
                    </ul> 
                </div>
            </div>
        </div>
        <div class='row' id='footnav'>
            <div class='col-md-4 b1'>
                <div class='box' id='detail_content'><div class='tutup' title='Tutup'><i class='fa fa-times fa-lg'></i></div>
                    <h2><span>Detail Kategori/Sektor</span></h2>
                    <button class='btn btn-detail' id='grafikbtn'>Grafik</button>
                    <button class='btn btn-detail' id='sebaranbtn'>Sebaran</button>
                </div>
            </div>
            <div class='col-md-4 b2'>
                <div class='box' id='detail_content2'><div class='tutup' title='Tutup'><i class='fa fa-times fa-lg'></i></div>
                    <h2><span>Desa</span></h2>
                    <div class='box-content box2 mac-scroller'>
                      <!-- List Desa
                       contohnya ada dibawah
                       utk desa yg sedang dipilih tambahkan class='active' pada <li>
                      -->
                     <div id="listdesah"> 
                          Silahkan pilih kecamatan untuk melihat daftar desa.
					  </div>
                    </div>
                   <!--  <button  id='listItem' class='btn btn-menu-small'><i class='fa fa-eye'></i> Lihat Lebih Jelas</button>    -->            
                </div> 
            </div>
            <div class='col-md-4 b3'>
                <ul class='item'>
                  <li><a href='http://tanah.klikdesa.com' class='a'><i class='fa fa-map fa-lg'></i> Jual Beli Lahan</a></li>
                  <li><a href='http://ukm.klikdesa.com' class='b'><i class='fa fa-globe fa-lg'></i> Portal UKM Desa</a></li>
                  <li><a href='http://blog.klikdesa.com' class='c'><i class='fa fa-file-text fa-lg'></i> Blog Desa</a></li>
           
                </ul>
            </div>
        </div>
        <div class='footer'>
            <ul>
                <li><a href='#'>Home</a></li>
                <li><a href='#'>About</a></li>
                <li><a href='#'>Privacy</a></li>
                <li><a href='#'>Contact</a></li>
            </ul>
            &copy; 2015 Klikdesa.com - Masagi Solusi
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
    <script src="lib/js/jquery.cookie.min.js"></script>
    <script src="lib/js/jquery.navgoco.min.js"></script>
    <script src="lib/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="lib/js/overlay.js"></script>
    <script src="lib/js/highcharts.js"></script>
    <script src="lib/js/grid-light.js"></script>
    <script src="lib/js/exporting.js"></script>
    <script type="text/javascript">
	
    $(document).ready(function(){
    
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
      })
    });
	</script>

  
</body>
</html>