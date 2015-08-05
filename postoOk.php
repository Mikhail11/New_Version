<?php 
  $config ='includes/core/hybridauth/config.php';
   require_once( "includes/core/hybridauth/Hybrid/Auth.php" );
 
   try{
       $hybridauth = new Hybrid_Auth( $config );
 
       $twitter = $hybridauth->authenticate( "Twitter" );
 
       $user_profile = $twitter->getUserProfile();
 
       echo "Hi there! " . $user_profile->displayName;
 
       $twitter->setUserStatus( "Hello world!" );
 
       $user_contacts = $twitter->getUserContacts(); 
   }
   catch( Exception $e ){
       echo "Ooophs, we got an error: " . $e->getMessage();
   }
?>