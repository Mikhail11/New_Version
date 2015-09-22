<?php
  header('Access-Control-Allow-Origin: *'); 
  echo $_POST['name'];
  if(!empty($_POST['name']) AND !empty($_POST['phone']) AND !empty($_POST['email']) AND !empty($_POST['city'])){
	  $name = $_POST['name'];
	  $phone = $_POST['phone'];
	  $email = $_POST['email'];
	  $city = $_POST['city'];
	  
	  $to = 'info@respot.ru';
	  $subject = 'Заявка с сайта Respot';
	  $message = '
	         <p>Имя: '.$name.'</p>
			 <p>E-mail: '.$email.'</p>
			 <p>Телефон: '.$phone.'</p>
			 <p>Город: '.$city.'</p>
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