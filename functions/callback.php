<?php

$phone = $_POST['phone'] ?? '';
$name = $_POST['name'] ?? '';

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

$smsText = "Обратный звонок: ".$phone." ".$name;	

$chatIdR = "708408244"; //Рябов
$chatIdD = "993384895"; //dementiuev

$sms = sendSMS($chatIdD, $smsText);
$sms2 = sendSMS($chatIdR, $smsText);

$headers  = "Content-type: text/plain; charset=UTF-8 \n";
$headers .= "From: notification@shipperty.ru \n";

echo json_encode($smsText);
exit();

?>