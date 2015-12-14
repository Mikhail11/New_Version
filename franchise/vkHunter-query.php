<?php
	$id_client = $_REQUEST['id'];

	if( $curl = curl_init() ) {
			curl_setopt($curl, CURLOPT_URL, "http://respot.ru/vkHunter-query.php?id=$id_client");
			curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
			$json = curl_exec($curl);
			curl_close($curl);
		}

	echo $json.' '.$id_client;
	

?>