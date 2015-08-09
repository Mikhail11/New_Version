<?php 
  $config ='includes/core/hybridauth/config.php';
   require_once( "includes/core/hybridauth/Hybrid/Auth.php" );
 
   try{
       $hybridauth = new Hybrid_Auth( $config );
 
       $twitter = $hybridauth->authenticate( "Twitter" );
       $twitter->setUserStatus( "Hello world!","http://kazanwifi.ru/images/its.jpg" );
 

   }
   catch( Exception $e ){
       echo "Ooophs, we got an error: " . $e->getMessage();
   }
?>