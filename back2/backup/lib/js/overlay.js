      
	   $("#listItem").click(function(){
            $(".black_overlay").fadeIn();
            $('.box2').css('height','300px');
            $("#detail_content2").appendTo('body');
            $("#detail_content2").css("height","400px");
            $("#detail_content2").css({
              "display":"block",
              "position":"fixed",
              "top": "5%",
              "width":"80%",
              "margin-left":"10%",
              "margin-right":"10%",
              "z-index":"9999"
            });
            $(this).parent().find(".tutup").show();
            $(this).hide();
        });
        $(".tutup").click(function(){
          console.log('tutup clicked');
          $(".black_overlay").fadeOut();
          $(".box_content,.mac-scroller").css('height','200px');
          $("#detail_content2").removeAttr('style');
          $("#detail_content2").appendTo('.b2');
          $("#listItem").show();
          $(".tutup").hide();	   
        });
        
     $("#sebaranbtn").click(function(){
		  $(".black_overlay").show();
		  var windowWidth = document.documentElement.clientWidth;
		  var windowHeight = document.documentElement.clientHeight;
		  var popupHeight = $("#sebaran").height();
		  var popupWidth = $("#sebaran").width();
  
		  $("#sebaran").css(
		  {
			  "position": "fixed",
			  "top": windowHeight/2-popupHeight/2,
			  "left": windowWidth/2-popupWidth/2
		  });
		  $("#sebaran").slideDown(200);
	 });
     
     $("#grafikbtn").click(function(){
		  $(".black_overlay").show();
		  var windowWidth = document.documentElement.clientWidth;
		  var windowHeight = document.documentElement.clientHeight;
		  var popupHeight = $("#grafik").height();
		  var popupWidth = $("#grafik").width();
  
		  $("#grafik").css(
		  {
			  "position": "fixed",
			  "top": windowHeight/2-popupHeight/2,
			  "left": windowWidth/2-popupWidth/2
		  });
		  $("#grafik").slideDown(200);
	 });
		
        
     $(".close").click(function(){
          $(".black_overlay").hide();
          $("#sebaran,#grafik").hide();
     });