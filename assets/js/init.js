/** *************Init JS*********************
	
    TABLE OF CONTENTS
	---------------------------
	Text Rotator
	Notify Me
	IE9 Pleaceholder Support
	Contact Us Validation and Ajax Call
	Bubble Effect
	Preloader
	Only Play Video on Desktop Devices
 ** ***************************************/
"use strict";
function miApp() {

	
	/** Text Rotator JS **/
	$(".rotate").textrotator({
	speed: 4500
	});
	
	/** Subscribe JS **/
	$("#notifyMe").notifyMe(); // Activate notifyMe plugin on a '#notifyMe' element 
	
	/** Placeholder JS call **/
	$('input[type=text], textarea').placeholder();	
 
	/** Contact Us JS **/
	$("#submit_btn").click(function() { 
        
		var filter = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var user_name       = $('input[name=name]').val();  //get input field values*/
        var user_email      = $('input[name=email1]').val();
        var user_message    = $('textarea[name=message]').val();
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        
		if(user_name==""){ 
            $('input[name=name]').css('border-color','red'); 
			$('input[name=name]').css('border-width','1px'); 
			$('input[name=name]').css('border-style','solid'); 
            proceed = false;
        }
		
        if(user_email== ""){ 
            $('input[name=email1]').css('border-color','red'); 
			$('input[name=email1]').css('border-width','1px'); 
			$('input[name=email1]').css('border-style','solid'); 
            proceed = false;
		}
		else if(!filter.test(user_email)) {
		   $('input[name=email1]').css('border-color','red'); 
		    $('input[name=email1]').css('border-width','1px');  
			 $('input[name=email1]').css('border-style','solid'); 
          /* $('#email_error').html("X Please Enter valid email address");*/
		   $('#email_error').show();
             proceed = false;
        }
	
        if(user_message=="") {  
            $('textarea[name=message]').css('border','red'); 
			 $('textarea[name=message]').css('border-width','1px');  
			  $('textarea[name=message]').css('border-style','solid');
            proceed = false;
        }
		
        if(proceed) //everything looks good! proceed...
        {
            //data to be sent to server
          var post_data = {'userName':user_name, 'userEmail':user_email,  'userMessage':user_message};
            
            //Ajax post data to server
            $.post('contact_me.php', post_data, function(response){  

                //load json data from server and output message     
				if(response.type == 'error')
				{
					var output = '<div class="error">'+response.text+'</div>';
				}else{
				    var output = '<div class="success">'+response.text+'</div>';
					
					//reset values in all input fields
					$('#contact_form input').val(''); 
					$('#contact_form textarea').val(''); 
					$('#email_error').hide();
				}
				
				$("#result").hide().html(output).fadeIn(500);
				
            }, 'json');
			
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form input, #contact_form textarea").keyup(function() { 
	
        $("#contact_form input, #contact_form textarea").css('border-color',''); 
		$('#email_error').hide();
        $("#result").slideUp();

	});
	

};

/***********************************/
/* Fullpage js */
/***********************************/
function fullpage() {
		var deviceWidth = $(window).width(); //calculate initial device width
		$.fn.fullpage({
			anchors: ['home', 'features', 'contact'],
			navigationTooltips: ['Home', 'Features', 'Contact'],
			fontawesome:['fa-home','fa-heart','fa-envelope'],
			navigation: true,
			scrollingSpeed: 1700,
			loopBottom:false,
			easing: 'easeOutBack',
			resize : false,
			afterResize: function(){
			deviceWidth = $(window).width(); //if the screen is resized, recalculate screen width
			pluginSettings( deviceWidth ); //pass it to the settings to determine if we want to toggle scrolling or no
			}
		});
pluginSettings( deviceWidth );
/* ----------- Plugin Settings ------------- */
function pluginSettings( width ) {
	var width = width;
	/* check that screen width is wide enough
	* may want to check for user-agent or if device is touch capable instead
	* if ipad resolution or smaller, turn off the plugin
	*/
	if(width <= 800) {
	$.fn.fullpage.setAutoScrolling(false);
	$.fn.fullpage.setAllowScrolling(false);
	$('#superContainer').addClass('top0');
	}
	if(width > 800) {
	$.fn.fullpage.setAutoScrolling(true);
	$.fn.fullpage.setAllowScrolling(true);
	$('#superContainer').removeClass('top0');
	}
}
}

function panel(){

	$('.show-panel').click(function () {
    $('.panel').slideToggle(500);
});

}
/***********************************/
/*Ready function*/
/**********************************/
$(document).ready(function() {
	
	panel();
	miApp();
	fullpage();
	
});
/***********************************/
/*Background Video Js */
/**********************************/
var myVideo = document.getElementById("video"); 
		function play() { 
			if (myVideo.paused) 
				myVideo.play(); 
			} 
/***********************************/
/*Preloader */
/**********************************/

jQuery(window).load(function() {
        // will first fade out the loading animation
	jQuery(".status").fadeOut();
        // will fade out the whole DIV that covers the website.
	jQuery(".preloader").delay(100).fadeOut("slow");
	   // will play html% video.
	play();

});

/***********************************/
/*refresh page on browser resize */
/***********************************/
/*$(window).bind('resize', function(e)
{
  if (window.RT) clearTimeout(window.RT);
  window.RT = setTimeout(function()
  {
    this.location.reload(false); 
  }, 200);
});*/
/***************************************/
/*only play video on desktop devices  */
/**************************************/
	var isMobile = {
	Android: function() {
	return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function() {
	return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function() {
	return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	Opera: function() {
	return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function() {
	return navigator.userAgent.match(/IEMobile/i);
	},
	any: function() {
	return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	}
};

var trueMobile = isMobile.any()
if (trueMobile){
	$('#section0').css('background','#fdbd12'); 
	$('#section1').css('background','#e74c2e'); 
	$('#section2').css('background','#2fbfbf'); 
	$('.container-overlay').css('display','none');

	
	
}



