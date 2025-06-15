<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents('php://input'), true);
$text = $data['text'] ?? '';
$target = $data['target'] ?? 'en';

$apiKey = getenv('DEEPSEEK_API_KEY') ?: 'YOUR_DEEPSEEK_API_KEY';
$url = 'https://api.deepseek.com/v1/translate';

if($apiKey === 'YOUR_DEEPSEEK_API_KEY'){
    echo json_encode(['text' => $text]);
    exit();
}

$payload = json_encode([
    'text' => $text,
    'target_lang' => $target
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if($error){
    echo json_encode(['text' => $text]);
    exit();
}


$result = json_decode($response, true);
$translated = $text;
if(isset($result['translation'])){
    $translated = $result['translation'];
}elseif(isset($result['data']['translations'][0]['translatedText'])){
    $translated = $result['data']['translations'][0]['translatedText'];
}

echo json_encode(['text' => $translated]);

