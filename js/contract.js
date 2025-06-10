$( document ).ready(function() {
	jQuery(function($){   $("#contract_phone").mask("+7 (999) 999-9999");   });
});

function validate(form_id,email) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.forms[form_id].elements[email].value;
   if(reg.test(address) == false) {
      alert('Введите корректный e-mail');
      return false;
   }
}


function sendContractRequest()
{
	error = 0;	error2 = 0; 	error3 = 0;
	error = checkContractPerson();
	error2 = checkContractPhone();
	if (error2 == 1) {  error3 = checkContractEmail();  }
	
	if (error == 0 && error2==0 && error3==0)
	{
		$.ajax({
			type: "POST",
			url: "functions/send_contract_request_simple.php",
			data: "contract_person="+$('#contract_person').val()+"&contract_phone="+$('#contract_phone').val()+"&contract_email="+$('#contract_email').val(),
			dataType: "json",
			beforeSend: function()  {$('#contract_button').html('ИДЕТ ОТПРАВКА ЗАПРОСА...'); $('#contract_button').prop('disabled', true); },
			success: function(data)
			{
				$('#contract_content').html('<h2>Благодарим Вас за ваш запрос. Наш сотрудник свяжется с Вами в ближайшее время.</h2>')
			},
			error: function(jqxhr, status, errorMsg) { alert('PickUp filling error! '+status+'---'+errorMsg);   }
		});
	}
	
}

function rekvChange()
{

	if($('#rekv').prop('checked') == true) 
	{ 	$('#contract_step4').css('display', 'block'); } 
	else
	{ $('#contract_step4').css('display', 'none'); }
}

function nextStep()
{
	
	NS=parseFloat($('#thisStep').val())+1;
	
	if (NS==2) 
	{
		error = 0;	error2 = 0; 	error3 = 0;
		error = checkContractPerson();
		error2 = checkContractPhone();
		if (error2 == 1) {  error3 = checkContractEmail();  }
		if (error == 0 && error2==0 && error3==0)
	    {
		        $('#contract_person').prop('disabled', 'disabled');
				$('#contract_phone').prop('disabled', 'disabled');
				$('#contract_email').prop('disabled', 'disabled');
				$('#contract_step2').css('display', 'block');
				$('#thisStep').val(NS);
				$('#enough').css('display', 'none');	
				
		}
	}
	if (NS==3) 
	{
		
		        $('#delivery_msk').prop('disabled', 'disabled');
				$('#delivery_spb').prop('disabled', 'disabled');
				$('#delivery_sam').prop('disabled', 'disabled');
			    $('#delivery_russia').prop('disabled', 'disabled');
				$('#delivery_sklad').prop('disabled', 'disabled');
				$('#delivery_finance').prop('disabled', 'disabled');
				$('#contract_step3').css('display', 'block');
				$('#thisStep').val(NS);
				$('#contract_button').html('ОТПРАВИТЬ ЗАПРОС');
		
	}
	
    if (NS==4) 
	{
		
		
	//	alert( "УСН2:"+$('#usn').prop('checked') );   
		
		$.ajax({
		  type: "POST",
		  url: "functions/send_contract_request.php",
		  data: "contract_person="+$('#contract_person').val()+"&contract_phone="+$('#contract_phone').val()+"&contract_email="+$('#contract_email').val()+"&delivery_msk="+$('#delivery_msk').prop('checked')+"&delivery_spb="+$('#delivery_spb').prop('checked')+"&delivery_sam="+$('#delivery_sam').prop('checked')+"&delivery_russia="+$('#delivery_russia').prop('checked')+"&delivery_sklad="+$('#delivery_sklad').prop('checked')+"&delivery_finance="+$('#delivery_finance').prop('checked')+"&site="+$('#site').val()+"&orders_counts="+$('#orders_counts').val()+"&rekv="+$('#rekv').val()+"&contract_org="+$('#contract_org').val()+"&contract_inn="+$('#contract_inn').val()+"&contract_kpp="+$('#contract_kpp').val()+"&contract_address="+$('#contract_address').val()+"&contract_count="+$('#contract_count').val()+"&contract_bik="+$('#contract_bik').val()+"&contract_ks="+$('#contract_ks').val()+"&contract_bank="+$('#contract_bank').val()+"&contract_ruk="+$('#contract_ruk').val()+"&usn="+$('#usn').prop('checked')+"&osn="+$('#osn').prop('checked'),
		  dataType: "json",
		  beforeSend: function()  {$('#contract_button').html('ИДЕТ ОТПРАВКА ЗАПРОСА...'); $('#contract_button').prop('disabled', true); }, 
		  success: function(data)  
		  {  		  
			$('#contract_content').html('<h2>Благодарим Вас за ваш запрос. Наш сотрудник свяжется с Вами в ближайшее время.</h2>')
		  },
		  error: function(jqxhr, status, errorMsg) { alert('PickUp filling error! '+status+'---'+errorMsg);   }
		});	
		
	}
	
	
}

function checkContractPerson()
{
	if($('#contract_person').val() != "")  
	              { $('#contract_person').css('border', '1px solid #dddddd'); return 0; }
		else 
		     { $('#contract_person').css('border', '1px dotted #F00'); return 1; }				 
}

function checkContractPhone()
{
	if($('#contract_phone').val() != "")  
	              { $('#contract_phone').css('border', '1px solid #dddddd'); return 0; }
		else 
		     { $('#contract_phone').css('border', '1px dotted #F00'); return 1; }				 
}

function checkContractEmail()
{
	if($('#contract_email').val() != "")  
	              { $('#contract_email').css('border', '1px solid #dddddd'); return 0; }
		else 
		     { $('#contract_email').css('border', '1px dotted #F00'); return 1; }				 
}