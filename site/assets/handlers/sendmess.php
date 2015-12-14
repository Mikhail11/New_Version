<?php
  header('Access-Control-Allow-Origin: *'); 
  echo $_POST['name'];
  if(!empty($_POST['name']) AND !empty($_POST['phone'])){
	  $name = $_POST['name'];
	  $phone = $_POST['phone'];
	  $сшен = $_POST['city'];
	  
	  $to = 'support@respot.ru';
	  $subject = 'Заявка с сайта Respot';
	  $message = '
	         <p>Имя: '.$name.'</p>
	         <p>Город: '.$name.'</p>
			 <p>Телефон: '.$phone.'</p>
	  ';
	  
	  
	  $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
      $headers .= "From: Respot <not@reply.com>\r\n"; 
      $headers .= "Reply-To: reply-to@example.com\r\n"; 
	  echo $to;
	  echo $subject;
	  echo $message;
	  echo $headers;
	  mail($to, $subject, $message, $headers); 
  }
  ?>