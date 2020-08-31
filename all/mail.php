<?php

if( $_POST['contact_f']){
   email_valid();
   captcha_valid();

   if( strlen( $_POST['message']) <= 10 || strlen($_POST['message']) >= 100){
      message('Length of message may be more than 10 and less than 100! ');
   }

   if( !mail( 'iamhotladyy@gmail.com', 'Support', "Email: <b>$_POST[email]</b><p>".htmlspecialchars($_POST['message'])."</p>")) message('message not send');

   message('Message was send!');
}




?>