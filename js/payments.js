function clickPayment() {
	
	errorSumm = 0;
	errorText = 0;
	errorFrom = 0;

	errorSumm = checkPaySumm();
	errorText = checkPayText();
	errorFrom = checkPayFrom();
	
	if (	errorSumm == 0 && errorText == 0 && errorFrom == 0   )
		{ 
    var widget = new cp.CloudPayments();
			var summ = Math.round(parseFloat($('#payment_summ').val()) * 100) / 100;
			var paytext = 'Назначение платежа: '+$('#payment_text').val();
			var payfrom = $('#payment_from').val();
    widget.charge({ // options
            publicId: 'pk_8cf1b9dfc93e657f9eedccbbc4759',  //id из личного кабинета
            description: paytext, //назначение
            amount: summ, //сумма
            currency: 'RUB', //валюта
            invoiceId: '000', //номер заказа  (необязательно)
            accountId: 'user@example.com', //идентификатор плательщика (необязательно)
            data: {
                myProp: payfrom //произвольный набор параметров
            }
        },
        function (options) { // success
            paymentSuccess();
        },
        function (reason, options) { // fail
            //действие при неуспешной оплате
        });
		}
};  

function  paymentSuccess()
{
	cont='<h2>Платеж успешно завершен</h2>Благодарим Вас за оплату наших услуг. Подтверждение об оплате отправлено нашему менеджеру. При необходимости он свяжется с Вами. Спасибо.';
	$('#payment_content').html(cont);
}



function doPayment()
{
	
	
	if (	errorSumm == 0 && errorText == 0 && errorFrom == 0   )
		{ pay; }
}




function checkPaySumm()
{
	error=0;
	km = $('#payment_summ').val();
	km=km.replace(new RegExp(",",'g'),".")
	
	checkw = (km/km) ? true : false;
		   if(checkw == true) 
		   {
				km=Math.round(parseFloat(km) * 100) / 100;
			   $('#payment_summ').val(km); $('#payment_summ').css('border', '1px solid #c1deef');
		   } else { $('#payment_summ').val(''); error=1;  $('#payment_summ').css('border', '1px solid #F00');}
	
	return(error);
}


function checkPayText()
{
	error=0;
	km = $('#payment_text').val();
		   if(km == '' || km == ' ') 
			   {  error=1;  $('#payment_text').css('border', '1px solid #F00');}
	else 
		   {
			
			   $('#payment_text').css('border', '1px solid #c1deef');
		   }  
	
	return(error);
}

function checkPayFrom()
{
	error=0;
	km = $('#payment_from').val();
		   if(km == '' || km == ' ') 
			   {  error=1;  $('#payment_from').css('border', '1px solid #F00');}
	else 
		   {
			
			   $('#payment_from').css('border', '1px solid #c1deef');
		   }  
	
	return(error);
}


