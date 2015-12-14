<?php 
	require 'includes/core/db_config.php';
	require 'includes/core/DBWiFiInterface.php';

 	$database = new DBWiFiInterface($servername, $username, $password, $dbname,'','','','','');

 	$database -> id_db_user = $_REQUEST['idDBUser'];
	$smsCount = $_REQUEST['smsCount'];
	$database->smsCountAdd($smsCount);

?>