<script src="js/contract.js"></script>
<div id='contract_content'>
<div id='priv_data2'>Заполняя данные этой формы, я принимаю  <A HREF="https://uniexpress.ru/privatedata.html" TARGET="_blank">Правила обработки персональных данных</A>, и даю согласие на обработку моих персональных данных.</div> 
<div id='contract_step1'>
<h2>Общие данные о заказчике</h2>
<div class='calc-form-line'>
<div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_person" id='contract_person_label'>Как к Вам обращаться:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='contract_person' class="calc-input-long" value='' placeholder='Введите Ваше имя' onchange="checkContractPerson();">

        </div>
</div>       
<div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_phone" id='contract_phone_label'>Ваш номер телефона:</label></div>
        <div class='contract-form-form'>
        <input type="text" id='contract_phone' class="calc-input-long" value='' placeholder='Введите Ваш телефонный номер' onchange="checkContractPhone();">

        </div>
</div>       
  
<div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_email" id='contract_email_label'>Ваш e-mail:</label></div>
        <div class='contract-form-form'>
        <input type="text" id='contract_email' class="calc-input-long" value='' placeholder='Введите Ваш адрес электронной почты' onchange="checkContractEmail();">

        </div>
</div> 
  
</div>

<div class='calc-form-line'><div class='calc-form-td'></div></div>
</div>

<div id='contract_step2'>
<h2>Услуги, которые мне могут понадобится</h2>
<div class='calc-form-line'>
<div class='calc-form-td'>
 <div class='contract-form-checkbox'>
        <input type="checkbox" id='delivery_msk' checked="checked" />
        <label for="delivery_msk" id='delivery_msk_label'><span></span> Доставка по Москве и МО</label>
   </div>       
   <div class='contract-form-checkbox'>
   <input type="checkbox" id='delivery_spb' checked="checked"/>
        <label for="delivery_spb" id='delivery_spb_label'><span></span> Доставка по Санкт-Петербургу и ЛО</label>
	</div>       
 </div>
 <div class='calc-form-td'>
 <div class='contract-form-checkbox'>
        <input type="checkbox" id='delivery_sam' checked="checked" />
        <label for="delivery_sam" id='delivery_sam_label'><span></span> Пункты самовывоза</label>
   </div>       
   <div class='contract-form-checkbox'>
   <input type="checkbox" id='delivery_russia' checked="checked"/>
        <label for="delivery_russia" id='delivery_russia_label'><span></span> Отправка по России</label>
	</div>       
 </div>
  <div class='calc-form-td'>
 <div class='contract-form-checkbox'>
        <input type="checkbox" id='delivery_sklad' checked="checked" />
        <label for="delivery_sklad" id='delivery_sklad_label'><span></span> Хранение на складе (фулфилмент)</label>
   </div>       
   <div class='contract-form-checkbox'>
   <input type="checkbox" id='delivery_finance' checked="checked"/>
        <label for="delivery_finance" id='delivery_finance_label'><span></span> Прием оплаты за заказы</label>
	</div>       
 </div>
 
</div>

<div class='calc-form-line'><div class='calc-form-td'></div></div>
</div>

<div id='contract_step3'>
<h2>Немного о моем бизнесе</h2>
<div class='calc-form-line'>
<div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_person" id='contract_person_label'>URL сайта:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='site' class="calc-input-long" value='' placeholder='http://www.amazon.ru' onchange="checkContractPerson();">

        </div>
</div>    
 <div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_person" id='contract_person_label'>Среднее количество заказов в месяц:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='orders_counts' class="calc-input-small" value=''  onchange="checkContractPerson();"> шт.

        </div>
</div>

<div class='calc-form-td'>
 <div class='contract-form-checkbox2'>
        <input type="checkbox" id='rekv' onchange='rekvChange();'/>
        <label for="rekv" id='rekv_label'><span></span> Я хочу сразу ввести реквизиты юр.лица для заключения договора</label>
   </div>  
 </div>

<div class='calc-form-line'><div class='calc-form-td'></div></div>
</div>
</div>

<div id='contract_step4'>
<h2>Реквизиты для заключения договора</h2>
<div class='calc-form-line'>
 <div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_org" id='contract_org_label'>Название организации:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='contract_org' class="calc-input-long" value='' placeholder='ООО "Дилижанс" или ИП Петров Виктор Васильевич' onchange="checkContractPerson();">

        </div>
 </div>    
 <div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_inn" id='contract_inn_label'>ИНН:</label></div>
   <div class='contract-form-form' id='address_type_select'><input type="text" id='contract_inn' class="calc-input-middle" value='' placeholder='772601245568' onchange="checkContractPerson();">
   </div>
   <div class='contract-form-label-mini'><label for="contract_kpp" id='contract_kpp_label'>КПП:</label></div>
   <div class='contract-form-form' id='address_type_select'><input type="text" id='contract_kpp' class="calc-input-middle" value='' placeholder='772601001' onchange="checkContractPerson();">
   </div>   
 </div>
  <div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_address" id='contract_address_label'>Адрес организации:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='contract_address' class="calc-input-long" value='' placeholder="г.Москва, ул.Донская, д.24" onchange="checkContractPerson();">

        </div>
 </div>
 <div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_count" id='contract_count_label'>Номер счета:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='contract_count' class="calc-input-middle" value='' placeholder="40702810700000000637" onchange="checkContractPerson();">
        </div>
        <div class='contract-form-label-mini'><label for="contract_bik" id='contract_bik_label'>БИК:</label></div>
		<div class='contract-form-form' id='address_type_select'><input type="text" id='contract_bik' class="calc-input-middle" value='' placeholder='044525716' onchange="checkContractPerson();"></div> 
 </div> 
 
  <div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_ks" id='contract_inn_label'>Кор.счет:</label></div>
   <div class='contract-form-form' id='address_type_select'><input type="text" id='contract_ks' class="calc-input-middle" value='' placeholder='30101810100000000716' onchange="checkContractPerson();">
   </div>
   <div class='contract-form-label-mini'><label for="contract_bank" id='contract_bank_label'>Банк:</label></div>
	<div class='contract-form-form' id='address_type_select'><input type="text" id='contract_bank' class="calc-input-middle" value='' placeholder='ВТБ 24 (ПАО) Г. МОСКВА' onchange="checkContractPerson();"></div> 
 </div>
   <div class='calc-form-td'>
   <div class='contract-form-label'><label for="contract_ruk" id='contract_ruk_label'>ФИО руководителя:</label></div>
        <div class='contract-form-form' id='address_type_select'>
        <input type="text" id='contract_ruk' class="calc-input-long" value='' placeholder="Генеральный директор Иванов Петр Семенович" onchange="checkContractPerson();">

        </div>
 </div>
 
     
<div class='calc-form-td'>
 <div class='contract-form-checkbox2'>
        <input type="checkbox" id='usn'/>
        <label for="usn" id='usn_label'><span></span> Упрощенная система налогообложения</label>
   </div>  
 </div>
 
 <div class='calc-form-td'>
 <div class='contract-form-checkbox2'>
        <input type="checkbox" id='osn'/>
        <label for="osn" id='osn_label'><span></span> Общая система налогообложения</label>
   </div>  
 </div>

<div class='calc-form-line'><div class='calc-form-td'></div></div>
</div>
</div>



<input type="hidden" id="thisStep" value="1" />
<div class='calc-form-result-button'>
<div id='contract_button' class='usual-button-center' title='Расчет стоимости курьерской доставки' onClick="nextStep();">ДАЛЕЕ</div><br /><br /><br />
<div id='enough'><a href='javacript:void();' onclick='sendContractRequest();'>Достаточно, просто свяжитесь со мной</a></div>
</div> 

</div>
