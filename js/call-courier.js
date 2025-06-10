function callCourierCheck()
{
	errorName = 0; errorPhone = 0;
	
	errorName = CheckNameCC();
	errorPhone = CheckPhoneCC();
	
	if (errorName==0 && errorPhone == 0)
	{ 
		$('.call-courier-alert').css("visibility", "hidden");
		callCourierSend();
	} else
	{ 
		$('.call-courier-alert').css("visibility", "visible");
	}	
	
	
}

function docsClick()
{
	//alert($('#delivery_docs').prop('checked'));
   if ($('#delivery_docs').prop('checked')==false) { $('#delivery_package').prop('checked', false); } else { $('#delivery_package').prop('checked', true); } 
}


function parcClick()
{
	//alert($('#delivery_docs').prop('checked'));
   if ($('#delivery_package').prop('checked')==false) { $('#delivery_docs').prop('checked', false); } else { $('#delivery_docs').prop('checked', true); } 
}


function callCourierSend()
{
	
	
	if ($('#delivery_docs').prop('checked')==true)
		{  $gruz = "docs"; } else {  $gruz = "package"; }

	$.ajax({
		  type: "POST",
		  url: "functions/call_courier.php",
		  data: "name="+$('#call_courier_person').val()+"&phone="+$('#call_courier_phone').val()+"&email="+$('#call_courier_email').val()+"&addr_sender="+$('#address1').val()+"&cont_sender="+$('#call_courier_sender').val()+"&phone_sender="+$('#call_courier_sender_phone').val()+"&addr_rec="+$('#address3').val()+"&cont_rec="+$('#call_courier_rec').val()+"&phone_rec="+$('#call_courier_rec_phone').val()+'&gruz='+$gruz+'&weight='+$('#order_weight').val()+'&description='+$('#order_description').val()+'&payer='+$('#payer').val(),
		  dataType: "json",
		  beforeSend : function () { $('#call_courier_button').html('ИДЕТ ОТПРАВКА ЗАПРОСА...'); $('#call_courier_window').prop('disabled', true); },
		  success: function(data)  
		  {  
			$('#call_courier_window').html('<h3>Спасибо за Ваш заказ. Наш оператор свяжется с Вами в ближайшие несколько минут.</h3><br><div id="call_courier_button" class="usual-button-center" onClick="callCourierClick();">ПРОДОЛЖИТЬ ПРОСМОТР САЙТА</div><br />');
			  
		  },
		  error: function(jqxhr, status, errorMsg) { alert('PickUp filling error! '+status+'---'+errorMsg);   }
		});	

} 


function insertDataSender()
{ 
	$('#call_courier_sender').val( $('#call_courier_person').val() );
	$('#call_courier_sender_phone').val( $('#call_courier_phone').val() );
	$('#input_hint_dr').html(" ");
}

function insertDataRec()
{ 
	$('#call_courier_rec').val( $('#call_courier_person').val() );
	$('#call_courier_rec_phone').val( $('#call_courier_phone').val() );
	$('#input_hint_ds').html(" ");
}


function CheckNameCC()
{
   if ($('#call_courier_person').val()=="")
	   {  
		   $('#call_courier_person').css('border', '1px dotted #F00');
		   $('#call_courier_person').css('background-color', '#FBB4B5');
		   return 1;  } else 
		   
	{ $('#call_courier_person').css('border', '1px solid #dddddd'); 
	  $('#call_courier_person').css('background-color', '#FFFFFF');
	 return 0; 
	}
}


function CheckPhoneCC()
{
   if ($('#call_courier_phone').val()=="")
	   {  
		   $('#call_courier_phone').css('border', '1px dotted #F00');
		   $('#call_courier_phone').css('background-color', '#FBB4B5');
		   return 1;  } else 
		   
	{ $('#call_courier_phone').css('border', '1px solid #dddddd'); 
	  $('#call_courier_phone').css('background-color', '#FFFFFF');
	 return 0; 
	}
}


function callCourierClick()
{
	if ($("#call_courier").attr('pos') == 'min')
	{	
		$("#call_courier").animate({"left": "+=930px"}, "slow");
		$("#call_courier").attr('pos', 'max');
	} else 
	{
		$("#call_courier").animate({"left": "-=930px"}, "slow");
		$("#call_courier").attr('pos', 'min');
	}
}
