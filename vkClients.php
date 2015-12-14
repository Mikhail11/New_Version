<?php
	require 'includes/core/db_config.php';
	require 'includes/core/DBWiFiInterface.php';

 	$database = new DBWiFiInterface($servername, $username, $password, $dbname,'','','','','');

?><!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include 'includes/base/headBootstrapAndBasics.php'; ?>
		<title>Клиенты</title>
	</head>
	<body class="admin-page simple-page dashboard"><div class="background-cover"></div>

				
				<table style = "padding:5px; margin-left:20%; margin-top:10%; text-align:center; font-size:23px;">
					<?php $result = $database->vkCLientsSelect();
						if($result->num_rows>0){

							while($row = $result->fetch_assoc()){

								?> <tr><td style="margin-right:5px; margin-bottom:5px;"><a href="<?=$row['LINK'];?>" style = "margin-right: 15px;"><?php echo $row['NAME']; ?> </a></td> <td> <?php echo $row['INPUT_DATE'] ?> </td></tr>
								<?php

							}
							} ?>
				</table>
					
		<?php
			include 'includes/base/jqueryAndBootstrapScripts.html'; 
		?>
		<script type="text/javascript" src="includes/js/jquery.monthpicker.min.js"></script>
	</body>
</html>