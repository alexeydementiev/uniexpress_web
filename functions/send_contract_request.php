<?php
$contract_person = $_POST['contract_person'];
$contract_phone = $_POST['contract_phone'];
$contract_email = $_POST['contract_email'];

$delivery_msk = $_POST['delivery_msk'];
$delivery_spb = $_POST['delivery_spb'];
$delivery_sam = $_POST['delivery_sam'];
$delivery_russia = $_POST['delivery_russia'];
$delivery_sklad = $_POST['delivery_sklad'];
$delivery_finance = $_POST['delivery_finance'];

$delivery_services = "\n";

if($delivery_msk=="true") {$delivery_services .= "Доставка по Москве \n";}
if($delivery_spb=="true") {$delivery_services .= "Доставка по Санкт-Петербургу \n";}
if($delivery_sam=="true") {$delivery_services .= "Пункты самовывоза \n";}
if($delivery_russia=="true") {$delivery_services .= "Отправка по России \n";}
if($delivery_sklad=="true") {$delivery_services .= "Хранение на складе \n";}
if($delivery_finance == "true") {$delivery_services .= "Прием оплаты за заказы \n";}


$site = $_POST['site'];
$orders_counts = $_POST['orders_counts'];
$rekv = $_POST['rekv'];

$contract_org = $_POST['contract_org'];
$contract_inn = $_POST['contract_inn'];
$contract_kpp = $_POST['contract_kpp'];
$contract_address = $_POST['contract_address'];
$contract_count = $_POST['contract_count'];
$contract_bik = $_POST['contract_bik'];
$contract_ks = $_POST['contract_ks'];
$contract_bank = $_POST['contract_bank'];
$contract_ruk = $_POST['contract_ruk'];

$usn = $_POST['usn'];
$osn = $_POST['osn'];

if ($osn == "true" AND $usn == "false" )
{
   $nal = "Общая система налогообложения (с НДС)";
} 
elseif ($usn == "true" AND $osn == "false" )
{
   $nal = "Упрощенная система налогообложения (без НДС)";
} 
else
{
   $nal = "Не указано!";
} 







if($rekv == "on")
{
   $rekviz = "********** Реквизиты для договора ****************\n 
   Наименование: $contract_org \n
   ИНН/КПП: $contract_inn / $contract_kpp \n
   АДРЕС: $contract_address \n
   Р/С: $contract_count \n
   БИК: $contract_bik \n
   К/С: $contract_ks \n
   БАНК: $contract_bank \n
   РУКОВОДИТЕЛЬ: $contract_ruk \n
   ВИД НАЛОГООЛОЖЕНИЯ: $nal
   ";
   	
} else 
{ $rekviz = "";}


function sendSMS($chatId, $text)
{
    $text = urlencode($text);

    $url2 = 'https://api.telegram.org/bot6181617266:AAE2W_05yic7Hx30kJZyqEYMvoI149ixAQ4/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.$text;


    $ch2 = curl_init();

    curl_setopt($ch2, CURLOPT_URL,$url2);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch2, CURLOPT_POST,false);

    curl_exec($ch2);
    curl_close($ch2);
}

$headers  = "Content-type: text/plain; charset=UTF-8 \n"; 
$headers .= "From: notification@uniexpress.ru \n";
$headers .= "Bcc: sales@uniexpress.ru\r\n";


//FULL
$text_zakaz=
"Запрос на заключение договора\n
***********************************************\n
\n
********** Сведение о клиенте ****************\n
ФИО: $contract_person\n
Телефон: $contract_phone\n
Email: $contract_email\n
\n
********** Запрашиваемые услуги ****************\n
$delivery_services
\n
**********Сведение о бизнесе клиента****************\n
Веб-сайт: $site\n
Количество заказов: $orders_counts\n
\n\n
$rekviz 
\n
***********************************************\n";
$chatIdR = "708408244"; //Рябов
$chatIdD = "993384895"; //dementiuev


$m =  mail("ryabov@uniexpress.ru", "Запрос на заключение договора", $text_zakaz, $headers);
$sms = sendSMS($chatIdR, $text_zakaz);

echo json_encode($m);
exit();

?>