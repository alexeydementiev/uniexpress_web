<script>(function(e,t,n){if(e.getElementById(n))return;var i=e.getElementsByTagName(t)[0];var r=e.createElement(t);r.id=n;r.src="//post2go.ru/js/widget.js";i.parentNode.insertBefore(r,i)})(document,"script","post2go-widget-js");</script>

<!-- 
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/fluid-mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 1px) and (max-width: 610px)">
<link href="css/fluid-tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 610px) and (max-width: 1023px)">
<link href="css/fluid-desktop.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 1024px)">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" />
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
-->


<!-- jQuery -->
<!-- 
<script defer src="//code.jquery.com/jquery-1.10.2.js"></script>
<script defer src="js/scripts.js"></script>
<script defer src="js/call-courier.js"></script>

<script async src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script async src="js/respond.min.js"></script>


<script async src="js/jquery.maskedinput.js" type="text/javascript"></script> 

-->

<link href="../css/fixedone.css" rel="stylesheet" type="text/css">
<script defer src="../js/call-courier-fone.js"></script>

<h2>Уважаемые клиенты сервисного центра FIXED.ONE!</h2>
<img src="http://fixed.one/wp-content/uploads/2016/04/fixed-one_logo_CMYK2.png">


<p>
	 <div id="call_courier" pos='min'>
	    <div id="call_courier_tab" onClick="callCourierClick();"><div id='call_courier_text'></div></div>
	    <div id='call_courier_window'>
		 <h3>В данном разделе сайта вы можете вызвать курьера для доставки вашей неисправной техники в сервисный центр FIXED ONE для диагностики и ремонта</h3>
		 
		 <h3><strong>Заказчик</strong></h3><hr>
		 		
		 <div class='calc-form-td'>
   		<div class='contract-form-label'><label for="call_courier_person" id='call_courier_label'>Как к Вам обращаться:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='call_courier_person' class="calc-input-long" value='' placeholder='Введите Ваше имя' onchange="CheckNameCC();">

        </div>
		</div>   
		   
		<div class='calc-form-td'>
   		<div class='contract-form-label'><label for="call_courier_phone" id='call_courier_label'>Ваш номер телефона:</label></div>
        <div class='contract-form-form'>
        <input type="text" id='call_courier_phone' class="calc-input-long" value='' placeholder='Введите Ваш телефонный номер' onchange="CheckPhoneCC();">
        </div>
		</div> 
		
		<div class='calc-form-td'>
   		<div class='contract-form-label'><label for="call_courier_email" id='call_courier_email_label'>Ваш email:</label></div>
        <div class='contract-form-form'>
        <input type="text" id='call_courier_email' class="calc-input-long" value='' placeholder='Введите адрес электронной почты'>
        </div>
		</div>
		

		 		
		 <div class='calc-form-td'>
   		<div class='contract-form-label'><label for="address1" id='address1_label'>Адрес где забрать технику:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='address1' class="calc-input-long" value='' placeholder='Адрес получения (забора)' onchange="checkContractAddress1();">

        </div>
		</div> 	
		
		
		
				<h3><strong>Что везем</strong></h3><hr>
				
				
				<div class='calc-form-td'>
		 		
		 <div class='calc-form-td'>
   		<div class='contract-form-label'><label for="order_description" id='order_description_label'>Список техники для отправки в  СЦ:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='order_description' class="calc-input-long" value='' placeholder='Например: Apple MacBook Pro 15"' onchange="checkDescription();">

        </div>
		</div> 	
		
	    <div class='calc-form-td'>
   		<div class='contract-form-label'><label for="order_weight" id='order_weight_label'>Вес заказа:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='order_weight' class="calc-input-middle" value='' placeholder='Примерный вес заказа в кг' onchange="checkContractPerson3();">
		</div>
		</div>   
   
   <h3><strong>ОСОБЫЕ ПОЖЕЛАНИЯ</strong></h3><hr>
	   
	   <div class='calc-form-td'>
		<div class='contract-form-checkbox'>
        <input type="checkbox" id='delivery_docs' />
        <label for="delivery_docs" id='delivery_docs_label' onClick="docsClick();"><span></span>ДОСТАВКА БЕСКОНТАКТНЫМ СПОСОБОМ</label>
			</div> </div>

	
			
			
    
    
    
	   
		   
		   <div class='calc-form-td'><br> <br></div>
		  <div id='priv_data2'>Нажимая кнопку "Вызвать курьера", я принимаю  <A HREF="https://uniexpress.ru/privatedata.html" TARGET="_blank">Правила обработки персональных данных</A>, и даю согласие на обработку моих персональных данных.</div>  
		<div class='calc-form-result-button'>
		<div class='call-courier-alert'>Внимание! Не все обязательные поля заполнены (отмечены красным)!</div>
<div id='call_courier_button' class='usual-button-center' title='Расчет стоимости курьерской доставки' onClick="callCourierCheck();">ВЫЗВАТЬ КУРЬЕРА</div><br /><br /><br />
</div>
	
			<div class='calc-form-td'><br> <br> <br> <br> <br> <br></div>
		
		 
		 
		</div>
 
</div>

</p>

<p>&nbsp;</p>
