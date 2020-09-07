<?

if( $_POST['reviews_f'] ){

   if( strlen( $_POST['message']) <= 10 || strlen($_POST['message']) >= 100){
      message('Length of message may be more than 10 and less than 100! ');
   }else{
      mysqli_query($connect, 'INSERT INTO `reviews` VALUES ("", "'.$_SESSION['id'].'", "'.mysqli_real_escape_string($connect, $_POST['message']).'") ');

      go('reviews');

      message('Review was posted!');
   }

   

}



?>