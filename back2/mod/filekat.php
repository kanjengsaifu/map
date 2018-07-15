 <?php
 include"koneksi.php";
                        $s = mysql_query("select * from kategori order by id asc");
						
                        while($d = mysql_fetch_array($s)){
							$jumlah=0;
							 $s1 = mysql_query("select * from subkategori where kategori='$d[id]'");
                           while($d1 = mysql_fetch_array($s1)){
							   $q1=mysql_query("Select count(jenis)as jml from tbl_informasi where desa like '$_GET[desaid]%' and jenis='$d1[id]'");
	$r1=mysql_fetch_array($q1);
	$jumlah=$jumlah+$r1[jml];
							   
						   }
                          echo "<li><label for='kat$d[id]'>$d[kategori] ($jumlah)</label>";
						  
                          $s0 = mysql_query("select * from subkategori where kategori='$d[id]'");
                          $r0 = mysql_num_rows($s0);
						  
                          if($r0 != 0){
                            echo "<span></span><ul class='sub'>";
                            while($d0 = mysql_fetch_array($s0)){
								$q=mysql_query("Select count(jenis)as jml from tbl_informasi where desa like '$_GET[desaid]%' and jenis='$d0[id]'");
	$r=mysql_fetch_array($q);
                              echo "<li><input type='checkbox' name='sub$d0[id]' id='sub$d0[id]' value='$d0[id]'/> <label for='sub$d0[id]'>$d0[namasub] ($r[jml])</label></li>";
                            
							}
                            echo "</ul>";
                          }
                          echo"</li>";
                        }
                      ?>
					  
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