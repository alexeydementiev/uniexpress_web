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
$weight = $_POST['weight'];
$description = $_POST['description'];

$payer = $_POST['payer'];

if ($payer == "pay_sender_cash") {$pay="Отправитель, наличными при отправке";}
else if ($payer == "pay_reciep_cash") {$pay="Получатель, наличными при получении";}
else {$pay = $payer;}

$headers  = "Content-type: text/plain; charset=UTF-8 \n"; 
$headers .= "From: notification@shipperty.ru \n";
$headers .= "Cc: sales@shipperty.ru\r\n";

//FULL
$text_zakaz=
"ВЫЗОВ КУРЬЕРА С САЙТА НА ЭКПРЕСС ДОСТАВКУ
***********************************************\n
\n
********** Сведение о ЗАКАЗЧИКЕ ****************\n
ФИО: $call_courier_person\n
Телефон: $call_courier_phone\n
Email: $call_courier_email\n
\n
********** СВЕДЕНИЕ ОБ ОТПРАВИТЕЛЕ ****************\n
АДРЕС ГДЕ ЗАБИРАТЬ: $addr_sender\n
Контакт: $cont_sender\n
Телефон: $phone_sender\n
\n
********** СВЕДЕНИЕ О ПОЛУЧАТЕЛЕ ****************\n
АДРЕС КУДА ДОСТАВЛЯТЬ: $addr_rec\n
Контакт: $cont_rec\n
Телефон: $phone_rec\n
\n
********** ЧТО ВЕЗЕМ ****************\n
Тип: $gruz \n
Описание: $description \n
Вес: $weight \n
Кто и как платит: $pay \n
\n
***********************************************\n";


$m =  mail("express@shipperty.ru", "ЗАКАЗ НА ЭКСПРЕСС-ДОСТАВКУ", $text_zakaz, $headers);



echo json_encode($m);
exit();

?>