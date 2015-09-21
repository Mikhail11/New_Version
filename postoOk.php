<?php 
  require 'includes/core/db_config.php';
  require 'includes/core/DBWiFiInterface.php';

  $database = new DBWiFiInterface($servername, $username, $password, $dbname,'','','','','');

 echo 'Охват аудитории: '.$database ->getFriendsForMail('2');
  echo '<br>';
 echo '<br>Количество подключений за месяц: '.$database ->getShortMonthReportForMail('2');
  echo '<br>';
  $unique = $database ->getUniqueShortMonthReportForMail('2');
 echo '<br>Количество уникальных поситителей за месяц: '.$unique;
 echo '<br>';
 echo '<br> Количество именинников за месяц: '.$database ->BirthdaysInMonthForMail('2');
 echo '<br>';
 echo '<br> Пользователи подключившиеся в свой ДР: '.$database ->getBirthdayWhichAuth('2');
 echo '<br>';
 echo '<br> Подключения по дням недели: ';
 foreach ($database ->getCustomersEveryDayForMail('2') as $key => $value) {
   echo '<br>'.$key.': '.$value;
 }
  echo '<br>';
  echo '<br> Поло-возрастные показтели: ';
  foreach ($database ->getCustomersSexAndAgeForMail('2') as $key => $value) {
   $percent = ($value/$unique)*100;
   echo '<br>'.$key.': '.$value.' ('.round($percent,2).' %)';
 }

  echo '<br>';
  echo '<br> Социальные сети: ';
  $database -> id_db_user = 2;
  foreach ($database ->getLoginCountByLoginOption(30) as $key => $val) {
   echo '<br>'.$val['SHORT_NAME'].' - '.$val['LOGIN_COUNT'].' ('.$val['PERCENTAGE'].' %)';
 }
 

?>