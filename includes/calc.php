<script src="js/calc.js"></script>
<div class='calc-form-line'>

<div class='calc-form-td'>
  <div class='calc-form-label'><label for="client_type" class='calc-form-td-label1'>Тип сотрудничества:</label></div>
  <div class='calc-form-form'>
         <select id='client_type' class='location-select'>
             <option value='agreement' selected>Работа по договору</option>
             <option value='onetime'>Разовая доставка без договора</option>
          </select>
     </div>
  </div>       

</div>

<div class='calc-form-line'><div class='calc-form-td'></div></div>


<div class='calc-form-line'>
<div class='calc-form-td'>
    <div class='calc-form-label'><label for="service">Вид услуги:</label></div>
    <div class='calc-form-form'>
    <select id='service' class='location-select' onchange="changeService();">
             <option value='delivery' selected>Курьерская доставка</option>
             <option value='sam'>Самовывоз</option>
           <!--  <option value='russia'>Отправка по России</option>
             <option value='world'>Отправка в другие страны</option> -->
        </select>
    </div>
        <div class='calc-form-label'><label for="city">Ваш город:</label></div> 
        <div class='calc-form-form'>
           <select id='city' class='location-select' onchange="cityChange();">
             <option value='MSK' selected>Москва</option>
             <option value='SPB'>Санкт-Петербург</option>
           </select>
         </div>
    
</div>        
<div class='calc-form-line' id='city_delivery'>
<div class='calc-form-td'>
        <div class='calc-form-label'><label for="address_type" id='address_type_label'>Адрес получателя:</label></div>
        <div class='calc-form-form' id='address_type_select'>
        <select id='address_type' class='location-select' onChange='locationChange();'>
             <option value='inCity' selected>Москва (в пределах МКАД)</option>
             <option value='5km'>Москва и МО (5 км за МКАД)</option>
             <option value='10km'>Москва и МО (10 км за МКАД)</option> 
             <option value='more10km'>Москва и МО (>10 км за МКАД)</option> 
          </select>
        </div>
        <span id='km_more_10'>
        <div class='calc-form-label'><label for="city">Расстояние от МКАД:</label></div> 
        <div class='calc-form-form'>
           <input type="text" id='Km10more' class="calc-input-small"/ value='11' onchange="controlKm();"> км
         </div>
        </span>
      </div>

</div>    
<div class='calc-form-line' id='russia_delivery'>
<div class='calc-form-td'>
        <div class='calc-form-label'><label for="address_type" id='address_type_label'>Адрес получателя:</label></div>
        <div class='calc-form-form' id='address_type_select'>
        <input type="text" id='russia_address' class="calc-input-long" value='' placeholder='150029, г.Ярославль, Ярославская область, улица 8-го Марта 21' onchange="changeRussiaAddress();">

        </div>
     </div>

</div>    

<div class='calc-form-line'><div class='calc-form-td'></div></div>


<div class='calc-form-line'>
<div class='calc-form-td'>
    <div class='calc-form-label'><label for="weight" id='label_weight'>Вес заказа:</label></div>
	 <div class='calc-form-form'>
        <input type="text" id='weight' class="calc-input-small"/ value='0.5' onchange="controlWeight();"> кг
	</div>
	<div class='calc-form-label'><label for="weight">Габариты заказа:</label></div>
    <div class='calc-form-form'><input type="text" id='length' class="calc-input-small" onchange="countVolume();" />&nbsp;
    <input type="text" id='width' class="calc-input-small" onchange="countVolume();"/>&nbsp;
    <input type="text" id='height' class="calc-input-small" onchange="countVolume();"/> см
    </div>
    </div>
</div> 

<div class='calc-form-line'><div class='calc-form-td'></div></div>

<div class='calc-form-line'>
<div class='calc-form-td'>
    <div class='calc-form-label'><label for="pay_type">Вид оплаты:</label></div>
     <div class='calc-form-form'>
          <select id='pay_type' class='location-select' onchange="changePayType();">
             <option value='NOMONEY' selected>Оплата не требуется</option>
             <option value='CASH'>Наложенный платеж (наличные)</option>
             <option value='CARD'>Наложенный платеж (банк. карта)</option>             
          </select>
         </div>
        </div>
      </div>
   

<div class='calc-form-line'>
<div class='calc-form-td'>
    <div class='calc-form-label'><label for="valcost">Объявленная ценность:</label> </div>
      <div class='calc-form-form'><input type="text" id='valcost' class="calc-input-small" value="0" onchange="changeValueCost();"> руб.</div>
    
      <div class='calc-form-label'><label for="cashcost">Наложенный платеж:</label></div>
        <div class='calc-form-form'><input type="text" id='cashcost' class="calc-input-small" value="0" disabled="disabled" onchange="changeCashCost();"> руб.</div>
    </div>
</div> 

<div class='calc-form-result-button'>
<div class='usual-button-center' title='Расчет стоимости курьерской доставки' onClick="calculate();">РАССЧИТАТЬ СТОИМОСТЬ</div>
</div> 
<div class='calc-form-result-min' id='count_result_min'>
    <div class='calc-form-td'><div id='calc-common-result'>Расчётная стоимость доставки: <span id='calculated_tariff'>500</span> рублей</div><br />* Данный тариф рассчитан для предварительного ознакомления в соответствии с тарифной сеткой при условии, что клиент дает более 100 заказов в месяц. Офертой не является.</div>
</div>
<div class='calc-form-result-min' id='count_result_details'>
    <div class='calc-form-td'><div id='calc-details' onClick='detailsShow();'>[ детальная информация ]</div></div>
</div>

<div class='calc-form-result-min' id='count_result_detinfo'>
    <div class='calc-form-td'><div id='calc-common-result-detail'>Услуги курьерской доставки: <span id='calculated_tariff_det'></span> рублей</div></div>
    <div class='calc-form-td'><div id='calc-common-result-detail'>Комиссия за кассовое обслуживание (1%): <span id='calculated_KO'></span> рублей</div></div>
    <div class='calc-form-td'><div id='calc-common-result-detail'>Комиссия за страхование (0,5%): <span id='calculated_ins'></span> рублей</div></div>
    <div class='calc-form-td'><div id='calc-common-result'>Общая стоимость затрат на заказ: <span id='calculated_amount'></span> рублей</div></div>
</div>