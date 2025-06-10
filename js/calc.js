function calculate()
{
	error=0;
    service = $('#service').val();	
	city=$('#city').val();
	loc=$('#address_type').val();
	Km10more=$('#Km10more').val();
	weight=$('#weight').val();
	error_wei = controlWeight();
	
	if(error_wei!=0) { error = 1; }
	
	
	if(error == 0) 
	{
		
	 $.ajax({
		  type: "POST",
		  url: "functions/calculator.php",
		  data: "service="+service+"&city="+city+"&loc="+loc+"&weight="+weight+"&kmzaMKAD="+Km10more,
          dataType: "json",
		  success: function(data)  
		  {  
		    $('#count_result_min').css('display', 'block');
			$('#count_result_details').css('display', 'block');
			$('#count_result_detinfo').css('display', 'none');
			$('#calculated_tariff').html(data);
		  },
		  error: function(jqxhr, status, errorMsg) { alert('Calculation error! '+status+'---'+errorMsg);   }
		});	
	} else 
	{
		$('#count_result_min').css('display', 'block'); 
		$('#count_result_min').html("Не все поля заполненны корректно!");
		
		
	}
	
}

function detailsShow()
{
	$('#count_result_detinfo').css('display', 'inline-block');
	$('#calculated_tariff_det').html($('#calculated_tariff').html());
	$('#calculated_KO').html(($('#cashcost').val()*0.01).toFixed(2));
		$('#calculated_ins').html(($('#valcost').val()*0.005).toFixed(2));
		$('#calculated_amount').html(parseFloat($('#calculated_tariff').html())+parseFloat($('#calculated_KO').html())+parseFloat($('#calculated_ins').html()));
	
	
	
}


function cityChange()
{ changeService(); }

function changeValueCost()
{ changeService(); }

function changeCashCost()
{ changeService(); }

function changePayType()
{
	if($('#pay_type').val()=='NOMONEY')
	{  $('#cashcost').prop('disabled', 'disabled'); $('#cashcost').val(0);	  }
	else
	{  $('#cashcost').removeProp('disabled');  }
	changeService();
}

function changeService()
{
	 $('#count_result_min').css('display', 'none');
	 $('#count_result_detinfo').css('display', 'none');
	 $('#count_result_details').css('display', 'none');
	 
	if($('#service').val()=='sam')
	{
		$('#address_type_label').html('Пункт самовывоза:');
		fillPickUpPoints();
	}
	if($('#service').val()=='delivery')
	{
		$('#address_type_label').html('Адрес получателя:');
		fillDeliveryTypes();
	}
	if($('#service').val()=='russia+')
	{
		$('#address_type_label').html('Адрес получателя:');
		fillDeliveryTypes();
	}
}


function fillDeliveryTypes()
{
	if ($('#city').val()=="MSK")
		{ cont = "<select id='address_type' class='location-select' onChange='locationChange();'><option value='inCity' selected>		Москва (в пределах МКАД)</option><option value='5km'>Москва и МО (5 км за МКАД)</option><option value='10km'>Москва и МО (10 км за МКАД)</option><option value='more10km'>Москва и МО (>10 км за МКАД)</option></select>";   }
	if ($('#city').val()=="SPB")
		{ cont = "<select id='address_type' class='location-select' onChange='locationChange();'><option value='inCity' selected>С.-Петербург (в пределах КАД)</option><option value='5km'>С.-Петербург и ЛО (5 км за КАД)</option><option value='10km'>С.-Петербург и ЛО (10 км за КАД)</option><option value='more10km'>С.-Петербург и ЛО (>10 км за КАД)</option></select>";   }		
	  $('#address_type_select').html(cont); 
	   
}

function fillPickUpPoints()
{
		$.ajax({
		  type: "POST",
		  url: "functions/fill_pickups.php",
		  data: "city="+$('#city').val(),
          dataType: "json",
		  success: function(data)  
		  {  		  
			$('#address_type_select').html(data);
		  },
		  error: function(jqxhr, status, errorMsg) { alert('PickUp filling error! '+status+'---'+errorMsg);   }
		});	

}


function controlKm()
{
	 $('#count_result_min').css('display', 'none');
	 km = $('#Km10more').val();
	 km=km.replace(new RegExp(",",'g'),".")
	 
	 
	 $('#Km10more').val(km);
	 
	  
	
	 
		   checkw = (km/km) ? true : false;
		   if(checkw == true) 
		   {
			   	while(km.indexOf("0")==0) {km=km.substring(1);}
				km=Math.round(parseFloat(km) * 100) / 100;
				$('#Km10more').val(km);
				
		   } else { $('#Km10more').val('11'); }
		   
		  if ($('#Km10more').val()<11) {$('#Km10more').val('11'); }
	
}

function locationChange()
{
	 $('#count_result_min').css('display', 'none');
  if($('#address_type').val()=="more10km") 
  {  $('#km_more_10').css('visibility', 'visible'); } else
  {  $('#km_more_10').css('visibility', 'hidden'); }
}


function countVolume()
{
	$allfilled=1;
	
	length = $('#length').val().replace(new RegExp(",",'g'),".");
	$('#length').val(length);
	checkw = (length/length) ? true : false;
	if(checkw == true) 
	    { while(length.indexOf("0")==0) {length=length.substring(1);}
		  length=Math.round(parseFloat(length) * 100) / 100;
		  $('#length').val(length);
		}  else{ $('#length').val('0'); }
		
	width = $('#width').val().replace(new RegExp(",",'g'),".");
	$('#width').val(width);
	checkw = (width/width) ? true : false;
	if(checkw == true) 
	    { while(width.indexOf("0")==0) {width=width.substring(1);}
		  width=Math.round(parseFloat(width) * 100) / 100;
		  $('#width').val(width);
		}  else{ $('#width').val('0'); }	
		
	height = $('#height').val().replace(new RegExp(",",'g'),".");
	$('#height').val(height);
	checkw = (height/height) ? true : false;
	if(checkw == true) 
	    { while(height.indexOf("0")==0) {height=height.substring(1);}
		  height=Math.round(parseFloat(height) * 100) / 100;
		  $('#height').val(height);
		}  else{ $('#height').val('0'); }		
		
	
	
	if ($('#length').val() == "0" || $('#length').val() == "")  {$allfilled=0;}
	if ($('#width').val() == "0" || $('#width').val() == "")  {$allfilled=0;}
	if ($('#height').val() == "0" || $('#height').val() == "")  {$allfilled=0;}
	
	if ($allfilled==1)
	{
	   $volWeight =  ($('#length').val()*$('#width').val()*$('#height').val())/5000;
	   if ($volWeight > $('#weight').val()) 
	   {
		   $('#weight').val($volWeight); 
		   $('#label_weight').html("Объемный вес заказа:"); 
		    $('#count_result_min').css('display', 'none');
	   }
	}
	
}

function controlWeight()
{  
     $('#count_result_min').css('display', 'none');
	 $('#label_weight').html("Вес заказа:");
	 $('#length').val("0");
	 $('#width').val("0");
	 $('#height').val("0");
	 
	 
     error_wei = 0;
	 wei0 = $('#weight').val();
	 wei0=wei0.replace(new RegExp(",",'g'),".")
	 
	 
	 $('#weight').val(wei0);
	 
	  
	 wei = $('#weight').val();
	 
		   checkw = (wei/wei) ? true : false;
		   if(checkw == true) 
		   {
			   	while(wei.indexOf("0")==0) {wei=wei.substring(1);}
				wei=Math.round(parseFloat(wei) * 100) / 100;
				$('#weight').val(wei);
				
		   } else { $('#weight').val('0'); }
		   
		   
	if ($('#weight').val() == "0")
	{ error_wei=1;  $('#weight').css('border', '1px dotted #F00'); 
	} else
	{ $('#weight').css('border', '1px solid #c1deef');  }

	
	return(error_wei); 
}
