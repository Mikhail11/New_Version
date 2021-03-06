<?php
	require 'includes/core/db_config.php';
	require 'includes/core/DBWiFiInterface.php';

 	$database = new DBWiFiInterface($servername, $username, $password, $dbname,'','','','','');
 	$tokens = $database->getAccessTokenForVKMessage();
 	if ($tokens->num_rows > 0) {
		while($row = $tokens->fetch_assoc()) {
			$birthday = $database->getVKBirthdayUsers($row['ID_USER']);
			if($birthday->num_rows > 0){
				while($rows = $birthday->fetch_assoc()) {

					$domain = substr($rows['LINK'],15);
					$url = 'https://api.vk.com/method/messages.send?domain='.$domain
					.'&message='.urlencode($row['MESSAGE'])
					.'&v=5.34&emoji=1&access_token='.$row['TOKEN'];

				 	if( $curl = curl_init() ) {
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
					$json = curl_exec($curl);
					curl_close($curl);

					}

				}
			}
		}
	}

 	$tokens = $database->getVKPostTime();
 	if ($tokens->num_rows > 0) {
		while($row = $tokens->fetch_assoc()) {
			$database -> id_db_user = $row['ID_USER'];
			$peruser = $database ->getValueByShortName('AUTO_POST_ONLY_PERMANENT')['VALUE'];
			$token = $database ->getValueByShortName('AUTO_MESSAGE_VK_TOKEN')['VALUE'];
			$message = $database ->getValueByShortName('AUTO_POST_VK_MESSAGE')['VALUE'];
			$UserId = $database->getVKUsers($row['ID_USER'],$peruser);
			if($UserId->num_rows > 0){
				while($rows = $UserId->fetch_assoc()) {

					$domain = substr($rows['LINK'],15);
					$url = 'https://api.vk.com/method/messages.send?domain='.$domain
					.'&message='.urlencode($message)
					.'&v=5.34&emoji=1&access_token='.$token;

				 	if( $curl = curl_init() ) {
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
					$json = curl_exec($curl);
					curl_close($curl);

					}

				}
			}
		}
	}

	$tokens = $database->getMobileParametersForSend();
		 	if ($tokens->num_rows > 0) {
				while($row = $tokens->fetch_assoc()) {
					$phones = $database ->getMobileUsers($row['ID_USER']);
					$database -> id_db_user = $row['ID_USER'];
					$count = $database->getValueByShortName('SMS_PAYMENTS_COUNT')['VALUE'];
						if($phones->num_rows > 0){
							while($rows = $phones->fetch_assoc()) {

								if ($count == 0) {

									$database->setValueByShortName('mobile','F');
									$database->setValueByShortName('AUTO_MESSAGE_SMS_DATE','');

									break;
								}

								$phone = $rows['NAME'];
								$text = $row['MESSAGE'];
								$url = "http://sms.ru/sms/send?api_id=699b26d8-aa69-53d4-1dfe-d5105fbe37e5&to=".$phone."&text=".$text;

						  		if( $curl = curl_init() ) {
									curl_setopt($curl, CURLOPT_URL, "http://sms.ru/sms/send?api_id=699b26d8-aa69-53d4-1dfe-d5105fbe37e5&to=$phone&text=$text");
									curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
									$out = curl_exec($curl);
									curl_close($curl);
								}

								$count = $count - 1;
							}

							$database->setValueByShortName('SMS_PAYMENTS_COUNT',$count);
						}
				}
			}

?>