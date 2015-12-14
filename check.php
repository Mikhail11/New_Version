<?php
	require 'includes/core/db_config.php';
	require 'includes/core/DBWiFiInterface.php';

 	$database = new DBWiFiInterface($servername, $username, $password, $dbname,'','','','','');

	
$test = '1'; //Тестирование системы: 0 - выключено, 1 - включено 

$notification_secret = "4Fr1VEXDTSrSQIs4sY+SImin"; 
$notification_type = $_REQUEST["notification_type"];  
$operation_id = $_REQUEST["operation_id"]; 
$amount = $_REQUEST["amount"]; 
$currency = $_REQUEST["currency"]; 
$datetime = $_REQUEST["datetime"]; 
$sender = $_REQUEST["sender"]; 
$codepro = $_REQUEST["codepro"]; 
$label = $_REQUEST["label"]; 
$sha1_hash = $_REQUEST["sha1_hash"]; 

$hash = $notification_type . '&' . $operation_id . '&' . $amount . '&' . $currency . '&' . $datetime . '&' . $sender . '&' . $codepro . '&' . $notification_secret . '&' . $label; //формируем хеш 
$sha1 = hash("sha1",$hash); //кодируем в SHA1 

//Ниже - проверка на валидность 
if ( $sha1 == $sha1_hash ) { 

	$smsCount = substr($label,0,3);
	$idDbUser = substr($label,4);

 	$database -> id_db_user = $idDbUser;
	$database->smsCountAdd($smsCount);

	header("HTTP/1.0 200 OK"); 
	// $fl = pay ($amount,$label);
	// if($fl){
	// 	$database->smsCountAdd($label);	
	// }

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