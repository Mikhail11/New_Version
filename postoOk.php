<?php 
  require 'includes/core/db_config.php';
  require 'includes/core/DBWiFiInterface.php';

  $database = new DBWiFiInterface($servername, $username, $password, $dbname,'','','','','');

 echo $database ->getFriendsForMail('2');
 echo '<br>'.$database ->getShortMonthReportForMail('2');
 echo '<br>'.$database ->getUniqueShortMonthReportForMail('2');
 echo '<br>'.$database ->getBirthdayWhichAuth('2');
?>