<?php

$test = '1'; //Тестирование системы: 0 - выключено, 1 - включено 

$notification_secret = "JPlYkENkKJsug6y4UgrBgNWH"; 


$notification_type = $_POST["notification_type"];  
$operation_id = $_POST["operation_id"]; 
$amount = $_POST["amount"]; 
$currency = $_POST["currency"]; 
$datetime = $_POST["datetime"]; 
$sender = $_POST["sender"]; 
$codepro = $_POST["codepro"]; 
$label = $_POST["label"]; 
$sha1_hash = $_POST["sha1_hash"]; 

$hash = $notification_type . '&' . $operation_id . '&' . $amount . '&' . $currency . '&' . $datetime . '&' . $sender . '&' . $codepro . '&' . $notification_secret . '&' . $label; //формируем хеш 
$sha1 = hash("sha1",$hash); //кодируем в SHA1 

//Ниже - проверка на валидность 
if ( $sha1 == $sha1_hash ) { 
	header("HTTP/1.0 200 OK"); 
	$amount = $amount/1.1;
	$database->smsCountAdd($amount);

} else { 
	header("HTTP/1.0 100 ERROR");  
} 
// Ниже - отладка - запись в файл testlog.txt переданых данных с ЯД. 
if ($test=='1') { 
$test_wr = fopen ('testlog.txt', 'a+'); 
fwrite ($test_wr, "$notification_type - тип нотификации\r\n$operation_id - ид операции\r\n$amount - сумма\r\n$currency -Код валюты\r\n$datetime - дата+время\r\n$sender -отправитель\r\n$codepro - наличие кода протекции\r\n$label - метка платежа\r\n$sha1_hash - переданый проверочный хеш\r\n$sha1 - расчитаный хэш\r\n"); 
fclose ($test_wr); 
} 

?> 