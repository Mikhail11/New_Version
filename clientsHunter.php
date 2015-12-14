<?php
	require 'includes/core/db_config.php';
	require 'includes/core/DBWiFiInterface.php';

 	$database = new DBWiFiInterface($servername, $username, $password, $dbname,'','','','','');
 	

?>