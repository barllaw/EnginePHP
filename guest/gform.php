<?php



function go_auth( $data )
{
   foreach ( $data as $key => $value){
      $_SESSION[$key] = $value;
   }

   go('profile');
}




if ($_POST['login_f']){
   email_valid();
   password_valid();
   captcha_valid();
   
   if( !mysqli_num_rows( mysqli_query( $connect, "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]' AND `password` = '$_POST[password]' ") ) )
      message('Account not found!');

   $row = mysqli_fetch_assoc(mysqli_query( $connect, "SELECT * FROM `users` WHERE `email` = '$_POST[email]' "));


   if( $row['ip'] ){

      $arr = explode(',', $row['ip']);

      if( !in_array($_SERVER['REMOTE_ADDR'], $arr)){
         message("This IP was banned!");
      }
   }

   if( $row['protected'] == 1){

      $code = random_str(5);

      $_SESSION['confirm'] = array(
         'type' => 'login',
         'data' => $row,
         'code' => $code,
      );

      if( !mail( $_POST['email'], 'Log In', "Code to confirm log in: <b>$code</b>")) message('message not send');

      go('confirm');
   
   }

   go_auth($row);
      
   
   go('profile');

}

else if ($_POST['signup_f']){
   email_valid();
   password_valid();
   captcha_valid();

   if( mysqli_num_rows( mysqli_query( $connect, "SELECT `id` FROM `users` WHERE `email` = '$email' ") ) )
      message('This email is was registered!');

   $code = random_str(5);

   $_SESSION['confirm'] = array(
      'type' => 'signup',
      'email' => $_POST['email'],
      'password' => $_POST['password'],
      'code' => $code,
   );


   // mail( 'rokec76626@99mimpi.com', 'register', 'hello', '-f rokec76626@99mimpi.com');

   if( !mail( $_POST['email'], 'Sign up', "Code to confirm sign up: <b>$code</b>")) message('message not send');

   go('confirm');
   message('Ok');
}

else if ($_POST['recovery_f']){
   captcha_valid();
   email_valid();

   if( !mysqli_num_rows( mysqli_query( $connect, "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]' ") ) )
      message('Account not found!');

   $code = random_str(5);

   $_SESSION['confirm'] = array(
      'type' => 'recovery',
      'email' => $_POST['email'],
      'code' => $code,
   );

   if( !mail( $_POST['email'], 'Recovery password', "Code to recovery password: <b>$code</b>")) message('message not send');
   
   go('confirm');
}

else if ($_POST['confirm_f']){
  
   if( $_SESSION['confirm']['type'] == 'signup'){

      if( $_SESSION['confirm']['code'] != $_POST['code']) message('Code is not correct');

         if( is_numeric( $_COOKIE['ref']) ){
            $ref = $_COOKIE['ref'];
         }else{
            $ref = 0;
         }

         mysqli_query($connect, 'INSERT INTO `users` VALUES ("", "'.$_SESSION['confirm']['email'].'", "'.$_SESSION['confirm']['password'].'", "", 0, '.$ref.') ');
         unset($_SESSION['confirm']);
         go('login');

   }else if( $_SESSION['confirm']['type'] == 'recovery'){

      if( $_SESSION['confirm']['code'] != $_POST['code']) message('Code is not correct');

      $newpass = random_str(5);

      mysqli_query($connect, ' UPDATE `users` SET `password` = "'.$newpass.'" WHERE `email` = "'.$_SESSION['confirm']['email'].'" ');
      unset($_SESSION['confirm']);
      message("Your new password: $newpass");

   }else if( $_SESSION['confirm']['type'] == 'login'){

      if( $_SESSION['confirm']['code'] != $_POST['code']) message('Code is not correct');

         go_auth($_SESSION['confirm']['data']);

   }
   
   
   
   
   
   else not_found();

}

?>