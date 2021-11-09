// Swticher Cookie Base
/**
 * Styleswitch stylesheet switcher built on jQuery
 * Under an Attribution, Share Alike License
 * By Kelvin Luck ( http://www.kelvinluck.com/ )
 * Thanks for permission! 
 **/



 $(".header").css("display", "none");

 $(".header_show").click(function(){
	$(".header").toggle();
	$(".header_show").toggleClass("head_stylee");
	
     if ($(".fa").hasClass("fa-caret-down")) {
         $(".fa-caret-down").toggleClass('fa-caret-down fa-caret-up');
     }
     else if ($(".fa").hasClass("fa-caret-up")) {
         $(".fa-caret-up").toggleClass('fa-caret-up fa-caret-down');
     }
  });

$(".check_icon").click(function(){
    if ($(".check_icon").hasClass("fa-caret-left")) {
        $(".fa-caret-left").toggleClass('fa-caret-left fa-caret-right');
    }
    else if ($(".check_icon").hasClass("fa-caret-right")) {
        $(".fa-caret-right").toggleClass('fa-caret-right fa-caret-left');
    }

});

 $(".click_setting").click(function(){
	$(".display_setting").hide(1000);
  });

  $(".click_show").click(function(){
	$(".display_setting").show(1000);
  });

(function($){
	$(document).ready(function() {
		$('.styleswitch').click(function(){
			switchStylestyle(this.getAttribute("data-switchcolor"));
			return false;
		});
		var c = readCookie('style');
				if (c){
			switchStylestyle(c);
		}
		else{
			var defaultColor = false;
			$('link[rel*=style][title]').each(function(i){
				this.disabled = true;
				defaultColor = this.getAttribute('data-default-color');
				if(defaultColor){
					this.disabled = false;
				}
			});
		}
	});
	function switchStylestyle(styleName){
		$('link[rel*=style][title]').each(function(i){
			this.disabled = true;
			if (this.getAttribute('title') == styleName) this.disabled = false;
		});
		createCookie('style', styleName, 365);
	}
})(jQuery);
function createCookie(name,value,days){
	if (days){
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name){
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++){
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
function eraseCookie(name){
	createCookie(name,"",-1);
}

// DEMO Swticher Base
jQuery('.demo_changer .demo-icon').click(function(){
	if(jQuery('.demo_changer').hasClass("active")){
		jQuery('.demo_changer').animate({"right":"-900px"},function(){
			jQuery('.demo_changer').toggleClass("active");
		});						
	}else{
		jQuery('.demo_changer').animate({"right":"0px"},function(){
			jQuery('.demo_changer').toggleClass("active");
		});			
	} 
	
	//p-scroll bar
	const ps5 = new PerfectScrollbar('.switcher-sidebar', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	
});



