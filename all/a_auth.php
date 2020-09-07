<?

if($_POST['login_f']){

   captcha_valid();

   if( $_POST['password'] != '12345'){
      exit('You cant login!');
   }else{
   
      $_SESSION['admin'] = 1;

      go('a_home');
      
   }

   

}

?>