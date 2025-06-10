//jQuery is required to run this code
$( document ).ready(function() {


 // scaleVideoContainer();
	
//
	
	
   //loadCSS("css/styles.css");

   initBannerVideoSize('.video-container .poster img');
   initBannerVideoSize('.video-container .filter');
   initBannerVideoSize('.video-container video');

		//alert("GBGTW");
	
    $(window).on('resize', function() {
       // scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
		
		 $("#top_menu_mobile").css('display', 'none');
		$("#top_menu_tablet").css('display', 'none');
	
	var container3 = $("#call_courier");
	if (container3.attr('pos') == 'max')
		{	
			container3.animate({"left": "-=930px"}, "slow");
			container3.attr('pos', 'min');
		}
 //$('#call_courier_window').jScrollPane();
	});
	
	
	//$('#call_back_button').click='callBackDo();';
	
			
	$('#rewiew_slider_arrow_right').mouseenter( function () { $('#rewiew_slider_arrow_right').css('background', ' url(../images/slider-customers/right-arrow-dark.png) center center no-repeat'); } )
	$('#rewiew_slider_arrow_right').mouseleave( function () { $('#rewiew_slider_arrow_right').css('background', ' url(../images/slider-customers/right-arrow.png) center center no-repeat'); } )
	$('#rewiew_slider_arrow_right').click(function() { ReviewNext(); } );
	
	$('#rewiew_slider_arrow_left').mouseenter( function () { $('#rewiew_slider_arrow_left').css('background', ' url(../images/slider-customers/left-arrow-dark.png) center center no-repeat'); } )
	$('#rewiew_slider_arrow_left').mouseleave( function () { $('#rewiew_slider_arrow_left').css('background', ' url(../images/slider-customers/left-arrow.png) center center no-repeat'); } )
	$('#rewiew_slider_arrow_left').click(function() { ReviewPrev(); } );
	
	
	jQuery(function($){   $("#call_back_phone_input").mask("+7 (999) 999-9999");
					       $("#call_courier_phone").mask("+7 (999) 999-9999"); 
					    $("#call_courier_sender_phone").mask("+7 (999) 999-9999"); 
					    $("#call_courier_rec_phone").mask("+7 (999) 999-9999"); 
					  });
	
	
	setInterval(function()
	   {
		  n=parseFloat($('#sliderPos').val())+1;
		  if (n==6) {n=1;}
          ChangeSliderAuto(n);
		  $('#sliderPos').val(n);
		  
       }, 10000);
	   
	   
	  intCustID = setInterval(function() {  custSliderLeft();   }, 15000);

});





$(document).mouseup(function (e) {
    var container = $("#top_menu_mobile");
    if (container.has(e.target).length === 0){
        container.hide();
    }
	
	    var container2 = $("#top_menu_tablet");
    if (container2.has(e.target).length === 0){
        container2.hide();
    }
	
	
});




function callBackClick()
{
	$('#call-back-window').css('display', 'block');  $('#modales-back').css('display', 'block');
}


function callBackClose()
{
    $('.modal-window').css('display', 'none');  $('#modales-back').css('display', 'none');  
}

function hMenuClickTablet()
{
	
 if( $('.top-fixed-menu-tablet-content').css('display')=='none')
 {  $('.top-fixed-menu-tablet-content').css('display', 'block'); } else
  {  $('.top-fixed-menu-tablet-content').css('display', 'none'); }

 
}


function hMenuClickMobile()
{
	
 if( $('.top-fixed-menu-mobile-content').css('display')=='none')
 {  $('.top-fixed-menu-mobile-content').css('display', 'block'); } else
  {  $('.top-fixed-menu-mobile-content').css('display', 'none'); }

 
}

function ReviewNext()
{
	thisR = $('#reviews_block').attr('thisRev');
	lastR = $('#reviews_block').attr('allRevs');
	if (thisR == lastR) {nextR=1;} else  {nextR=parseFloat(thisR)+1;}
	
	$.ajax({
		type: "POST",
		url: "functions/showReview.php",
		data: "nextR="+nextR,
        dataType: "json",
		error: function() { alert('Error in module'); },
		success: function(data)
    	  {  
		   		     $('#reviews_review').fadeOut('fast', function() { $('#reviews_review').html(data[1]); $('#reviews_review').fadeIn('fast');   } );
			// $('#review_slider_photo').css('background', 'none');
			$('#review_slider_photo').fadeOut('fast', function() { $('#review_slider_photo').css('background-image', data[2]); $('#review_slider_photo').fadeIn('fast');   } );
			$('#review_slider_name').fadeOut('fast', function() { $('#review_slider_name').html(data[3]); $('#review_slider_name').fadeIn('fast');   } );
    		$('#review_slider_position').fadeOut('fast', function() { $('#review_slider_position').html(data[4]); $('#review_slider_position').fadeIn('fast');   } );
			$('#review_slider_company').fadeOut('fast', function() { $('#review_slider_company').html(data[5]); $('#review_slider_company').fadeIn('fast');   } );
			 
		     $('#reviews_block').attr('thisRev', nextR);
		  
		  }
		});
}

function ReviewPrev()
{   
//alert('prev');
	thisR = $('#reviews_block').attr('thisRev');
	lastR = $('#reviews_block').attr('allRevs');
	if (thisR == '1') {prevR=lastR;} else  {prevR=parseFloat(thisR)-1;}
	
	$.ajax({
		type: "POST",
		url: "functions/showReview.php",
		data: "nextR="+prevR,
        dataType: "json",
		error: function() { alert('Error in module'); },
		success: function(data)
    	  {  
		     $('#reviews_review').fadeOut('fast', function() { $('#reviews_review').html(data[1]); $('#reviews_review').fadeIn('fast');   } );
			// $('#review_slider_photo').css('background', 'none');
			$('#review_slider_photo').fadeOut('fast', function() { $('#review_slider_photo').css('background-image', data[2]); $('#review_slider_photo').fadeIn('fast');   } );
			$('#review_slider_name').fadeOut('fast', function() { $('#review_slider_name').html(data[3]); $('#review_slider_name').fadeIn('fast');   } );
    		$('#review_slider_position').fadeOut('fast', function() { $('#review_slider_position').html(data[4]); $('#review_slider_position').fadeIn('fast');   } );
			$('#review_slider_company').fadeOut('fast', function() { $('#review_slider_company').html(data[5]); $('#review_slider_company').fadeIn('fast');   } );
			 
		     $('#reviews_block').attr('thisRev', prevR);
		  
		  }
		});

	
}


function custSliderRight()
{
 clearInterval(intCustID);
 logo = $('#csthislogo').val(); 
 pos =  parseFloat($('#csposition').val());
 posit= (parseFloat($('#csposition').val())-1)*210;
 
 posn =  parseFloat($('#csposition').val())-1; 
 
 $('#csposition').val( parseFloat($('#csposition').val())-1 );
 if ( $('#csthislogo').val()=='0') { $('#csthislogo').val( parseFloat($('#cscount').val()) ); }
 else { $('#csthislogo').val( parseFloat($('#csthislogo').val())-1 ); }
 logo =  parseFloat($('#csthislogo').val());
 if (logo == 0) { logo = parseFloat($('#cscount').val()); $('#csthislogo').val( parseFloat($('#cscount').val()) ); }

 

 
 
 
 if (posn < 0) 
 {
	logo =  parseFloat($('#csthislogo').val());
	if (logo == 0) {
    logo = $('#cscount').val();  
	$('#csthislogo').val( parseFloat($('#cscount').val()));
	}
	
 }

  $('#customer_logo0'+logo).css('left', posit);            
 // alert('#customer_logo0--'+logo+' left--'+posit);            
 
  
  $('#customer_slider_int').animate({
    left: '+=210',
  }, 1000, function() { });

}

function custSliderLeft()
{
 
clearInterval(intCustID); 
$('#customer_slider_int').animate({
    left: '-=210',
  }, 1000, function() { 

      posd = $('#csposition').val();
      posth = parseFloat($('#csthislogo').val());
	  
	  posn = parseFloat(posd)+1;
	  posit = (parseFloat($('#cscount').val())-1)*210+posn*210;
	  $('#customer_logo0'+posth).css('left', posit);
	  if(posth == parseFloat($('#cscount').val()))
	  {  $('#csthislogo').val(1); } else {$('#csthislogo').val(parseFloat(posth)+1);}
	    
      $('#csposition').val(posn);
	  
    });
}

function callBackDo()
{
   if ($('#call_back_button').html() == 'Вернуться на сайт Shipperty')
   {
	  $('#call-back-window').css('display', 'none');  $('#modales-back').css('display', 'none');
   }
   else
   {
   error=0;
    if($('#call_back_phone_input').val() == "") {  $('#call_back_phone_input').css('border', '1px dotted #F00'); error=1;}
	else {$('#call_back_phone_input').css('border', '1px solid #dddddd'); }
    if($('#call_back_name_input').val() == "") {  $('#call_back_name_input').css('border', '1px dotted #F00'); error=1;}  else {$('#call_back_name_input').css('border', '1px solid #dddddd');  }

	if(error==0)
	{
	    $.ajax({
		type: "POST",
		url: "functions/callback.php",
		data: "phone="+$('#call_back_phone_input').val()+"&name="+$('#call_back_name_input').val(),
        dataType: "json",
		error: function(jqxhr, status, errorMsg) { alert('Error in module call back'+status+'---'+errorMsg);},
		success: function(data)
		  {

		      $('#call_back_phone_input').css('display', 'none');
			  $('#call_back_name_input').css('display', 'none');
		     $('#call_back_button').css('display', 'none')
			  $('#priv_data').css('display', 'none')
			 $('#call_back_header').html('Звонок заказан');
			 $('#call_back_comment').html('Уважаемый, '+$('#call_back_name_input').val()+'<br> Благодарим Вас за обращение в службу доставки Shipperty. Ждите звонка от нашего сотрудника в течение ближайшего времени.');


		  }
		});
	}

   }
	
	
}


function changeNamecallBack()
{
  if($('#call_back_name_input').val() != "")  { $('#call_back_name_input').css('border', '1px solid #dddddd'); }
}

function changePhonecallBack()
{
  if($('#call_back_phone_input').val() != "")  { $('#call_back_phone_input').css('border', '1px solid #dddddd'); }
}



function scaleVideoContainer() {

    var height = $(window).height() + 5;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
    windowHeight = $(window).height() + 5,
    videoWidth,
    videoHeight;

    console.log(windowHeight);

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width');

        $(this).width(windowWidth);

  /*     if(windowWidth < 1000){
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

            $(this).width(videoWidth).height(videoHeight);
        }   */
	

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}



function ChangeSliderAuto(SlideNum) 
{

	
	if (SlideNum==1) 
	{ prevSlide=5;	}
	else
	{ 	prevSlide=SlideNum-1; }
	
    $('#top-slider-text'+prevSlide).fadeOut("fast");
	$('#slider_switch_'+prevSlide).css('background', 'url(images/top-slider-switch-empty.png)');
	$('#top-slider-header'+prevSlide).fadeOut("fast");
   
   	$('#top-slider-text'+SlideNum).fadeIn("normal");
	$('#top-slider-header'+SlideNum).fadeIn("normal");
	$('#slider_switch_'+SlideNum).css('background', 'url(images/top-slider-switch-full.png)');
}

function ChangeSlider(SlideNum) 
{
	var i=1;
	while (i <= 5) 
	{  $('#top-slider-text'+i).css('display', 'none');
	   $('#slider_switch_'+i).css('background', 'url(images/top-slider-switch-empty.png)');
	   $('#top-slider-header'+i).css('display', 'none');
       i++;
     }
	
	

	$('#top-slider-text'+SlideNum).css('display', 'block');
	$('#top-slider-header'+SlideNum).css('display', 'block');
	$('#slider_switch_'+SlideNum).css('background', 'url(images/top-slider-switch-full.png)');
	$('#sliderPos').val(SlideNum);
}