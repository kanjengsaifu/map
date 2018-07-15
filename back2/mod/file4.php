<?php
include"../mod/koneksi.php";
   $a=$_GET['opt4'];
   $b=$_GET['opt5'];
 
	  $cc=substr($b,0,1);
	  if($cc=='t'){
		  echo"wakwaw";
	  }elseif($cc=='s'){
		  echo"wikwiw";
		  
	  }else{

    echo"<iframe src=\"mod/peta.php?id=$a&jnis=$b\" width=\"100%\" height=\"550px\" frameborder=\"0\">"; 
	  }
	   
   
    
    
 
?>
<style>
h2 button{
    background:#fff;
    border:1px solid #ccc;
    padding:5px;
    font-weight:normal;
    font-style:normal;
    font-size:0.7em;
}
</style>