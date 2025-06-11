<?php
$contract_person = $_POST['contract_person'];
$contract_phone = $_POST['contract_phone'];
$contract_email = $_POST['contract_email'];

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
$headers .= "From: notification@shipperty.ru \n";
$headers .= "Bcc: sales@shipperty.ru\r\n";


//FULL
$text_zakaz=
"Запрос на заключение договора (упрощенная форма)\n
********** Сведение о клиенте ****************\n
ФИО: $contract_person\n
Телефон: $contract_phone\n
Email: $contract_email\n
\n
Клиент не пожелал заполнять уточняющие данные, и просит с ним связаться.
***********************************************\n";
$chatIdR = "708408244"; //Рябов
$chatIdD = "993384895"; //dementiuev


$m =  mail("ryabov@shipperty.ru", "Запрос на заключение договора (упрощенная форма)", $text_zakaz, $headers);
$sms = sendSMS($chatIdR, $text_zakaz);

echo json_encode($m);
exit();

?>