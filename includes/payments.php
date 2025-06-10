<script src="js/payments.js"></script>
<script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>

 <div id='payment_content'>
                   <h2>Оплатить услуги службы доставки Shipperty 2</h2>
<div class='calc-form-line'>
<div class='calc-form-td'>
   <div class='contract-form-label'><label for="payment_summ" id='payment_summ_label'>Сумма, руб.:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='payment_summ' class="calc-input-long" value='' placeholder='Введите сумму платежа' onchange="checkPaySumm();">

        </div>
</div>       
<div class='calc-form-td'>
   <div class='contract-form-label'><label for="payment_text" id='payment_text_label'>Назначение платежа:</label></div>
        <div class='contract-form-form'>
        <input type="text" id='payment_text' class="calc-input-long" value='' placeholder='За какие услуги или по какому счету/отчету' onchange="checkPayText();">

        </div>
</div>      
 
 <div class='calc-form-td'>
   <div class='contract-form-label'><label for="payment_from" id='payment_from_label'>От кого:</label></div>
        <div class='contract-form-form'>
        <input type="text" id='payment_from' class="calc-input-long" value='' placeholder='Ваши ФИО и/или название компании' onchange="checkPayFrom();">

        </div>
</div>   
  
<div class='calc-form-result-button'>
<div id='payment_button' class='usual-button-center' title='Оплатить услуги курьерской доставки' onClick="clickPayment();">ОПЛАТИТЬ</div><br /><br /><br />
</div> 
  
</div>
<br> <br>

* Платеж будет совершен с помошью защищенной безопасной технологии компании <a href='http://cloudpayments.ru' target='_blank'>CloudPayments</a>. Более подробную информацию о безопасноси платежей на нашем сайте вы можете получить здесь: <a href='https://www.cloudpayments.ru/Docs/Security' target='_blank'>https://www.cloudpayments.ru/Docs/Security</a>.
<br> <br>
</div>