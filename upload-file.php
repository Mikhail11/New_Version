<?php      
include 'includes/core/session.php';
include 'includes/core/cache.class.php';  
$cache = new Cache();    
$uploaddir = 'images/postImages/'; 
$name = $cache->getCachePath();
$extension = strstr($_FILES['uploadfile']['name'],".");
$newFileName = md5(time().rand()).'_'.$database->id_db_user.$extension;      
$file = $name . $newFileName;
$newFile = $uploaddir . $newFileName;

$ext = substr($_FILES['uploadfile']['name'],strpos($_FILES['uploadfile']['name'],'.'),strlen($_FILES['uploadfile']['name'])-1); 
$filetypes = array('.jpg','.gif','.bmp','.png','.JPG','.BMP','.GIF','.PNG','.jpeg','.JPEG');

if(!in_array($ext,$filetypes)){

		echo "<p>Неподходящий формат файла!</p>";}
else{ 
	if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
	  
		$json = array('response'=>'success','file'=>$file, 'newfile'=>$newFile);
	  echo  json_encode($json); 
	} else {
		$json = array('response'=>'error','file'=>'');
		echo  json_encode($json);
	}
}
 

?>      