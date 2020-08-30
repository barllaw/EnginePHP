<?php

if ($_POST['login_f']){
   email_valid();
   password_valid();
   captcha_valid();
   
   if( !mysqli_num_rows( mysqli_query( $connect, "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]' AND `password` = '$_POST[password]' ") ) )
      message('Account not found!');
   $row = mysqli_fetch_assoc(mysqli_query( $connect, "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]' "));

   foreach ( $row as $key => $value)
      $_SESSION[$key] = $value;
   
   go('profile');

}

else if ($_POST['signup_f']){
   email_valid();
   password_valid();
   captcha_valid();

   $email = $_POST['email'];

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

   if( !mail( $email, 'Sign up', "Code to confirm sign up: <b>$code</b>")) message('message not send');

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

      mysqli_query($connect, 'INSERT INTO `users` VALUES ("", "'.$_SESSION['confirm']['email'].'", "'.$_SESSION['confirm']['password'].'") ');
      unset($_SESSION['confirm']);
      go('login');

   }else if( $_SESSION['confirm']['type'] == 'recovery'){

      if( $_SESSION['confirm']['code'] != $_POST['code']) message('Code is not correct');

      $newpass = random_str(5);

      mysqli_query($connect, ' UPDATE `users` SET `password` = "'.$newpass.'" WHERE `email` = "'.$_SESSION['confirm']['email'].'" ');
      unset($_SESSION['confirm']);
      message("Your new password: $newpass");

   }else not_found();

}

?>