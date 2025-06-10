<?php


$call_courier_person = $_POST['name'];
$call_courier_phone = $_POST['phone'];
$call_courier_email = $_POST['email'];

$addr_sender = $_POST['addr_sender'];
$cont_sender = $_POST['cont_sender'];
$phone_sender = $_POST['phone_sender'];


$addr_rec = $_POST['addr_rec'];
$cont_rec = $_POST['cont_rec'];
$phone_rec = $_POST['phone_rec'];

$gruz = $_POST['gruz'];
if ($gruz == "docs") {$bc = "БЕСКОНТАКТНАЯ ДОСТАВКА!"; }
$weight = $_POST['weight'];
$description = $_POST['description'];

$payer = $_POST['payer'];

if ($payer == "pay_sender_cash") {$pay="Отправитель, наличными при отправке";}
else if ($payer == "pay_reciep_cash") {$pay="Получатель, наличными при получении";}
else {$pay = $payer;}

$headers  = "Content-type: text/plain; charset=UTF-8 \n";
$headers .= "From: notification@uniexpress.ru \n";
$headers .= "Cc: zakaz@uniexpress.ru \r\n";

//FULL
$text_zakaz=
"ВЫЗОВ КУРЬЕРА С САЙТА ЗАКАЗ FIXED ONE - РЕМОНТ ТЕХНИКИ APPLE
***********************************************\n
\n
********** Сведение о ЗАКАЗЧИКЕ ****************\n
ФИО: $call_courier_person\n
Телефон: $call_courier_phone\n
Email: $call_courier_email\n
Адрес: $addr_sender\n
\n

********** СВЕДЕНИЕ О ПОЛУЧАТЕЛЕ ****************\n
АДРЕС КУДА ДОСТАВЛЯТЬ: Москва, м. Парк Культуры, ул. Льва Толстого, д. 19/2, подъезд 3. \n
Контакт: РЕСЕПШН ПРИЕМКА\n
Телефон: +7 499 754 8440 / +7 499 899 8440 \n
\n
********** ЧТО ВЕЗЕМ ****************\n
ОПЦИИ: $bc \n
Описание: $description \n
Вес: $weight \n
\n
***********************************************\n";





$id = '1219';
$auth = '824682b7c01d5c745bb87d6b1b4308c1';
$url = 'http://api2.uniexpress.su/new_order_msk.php';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_POST,true);

$deldate = strtotime('+1 day');
$weekday = date('w', $deldate);
if ($weekday == 0) 
{  $deldate = strtotime('+2 day');  }
if ($weekday == 6) 
{  $deldate = strtotime('+3 day');  }

$dd = date('d-m-Y', $deldate);


$q = array("id"=>$id,
			"auth"=>$auth,
            "number"=>"autonum", //ваш внутренний номер заказа
		    "deliverydate"=>$dd,   //дата доставки
			"deliverytime"=>"10-18",   //время доставки
			"pay"=>"NOMONEY",   //вид оплаты CASH/CARD/NOMONEY/ONLINE 
			"type"=>"DELIVERY",   //вид доставки 
			"client"=>$call_courier_person,   //получатель
			"company"=>" ",   //компания получателя
			"phone"=>$call_courier_phone,   //контактный телефон получателя
			"dopphone"=>"8",   //дополнительный телефон получателя
			"email"=>$call_courier_email,   //email получателя (для уведомлений)
			"metro"=>"",   //станция метро (для удоства курьера)
		    "deliverycost"=>"0",   //стоимость доставки для получаетеля
			"comment"=>$description." ".$bc,   //комментарий по доставке для курьера 
			"address"=>$addr_sender,   //адрес получателя
			"ordercost"=>"0",   //общая стоимость заказа
			"valuecost"=>"0",   //объявленная ценность 
			"weight"=>$weight,   //вес в кг
			"spots"=>"1",   //кол-во отдельно упакованных мест в заказе
			"timelimit"=>"false",   // признак строго соблюдения временного интервала true|false
		    "goods" => array( 0 =>array("code" => "1476",  "price" => "0",
							"qnt" => "1"),
						  ),
			
			"spots"=>"1" 
		   );  



curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($q));
$result = curl_exec($ch);
curl_close($ch);

$m =  mail("express@uniexpress.ru", "ЗАКАЗ НА ДОСТАВКУ ТЕХНИКИ APPLE В РЕМОНТ", $text_zakaz, $headers);

echo json_encode($result);


exit();

?>