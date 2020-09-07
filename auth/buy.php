<?

   if($_POST['services_f']){

      $sid = array_pop($_POST);

      $price = services_price( $sid );

      if( !$price )
         message('Error to buy service!');
         
      $price = calc_promo( $sid );
      
      if( $price > $_SESSION['balance'] )
         message('Dont enough cash for buy!');
      
      

      $_SESSION['balance'] -= $price;
      mysqli_query($connect, "UPDATE `users` SET `balance` = $_SESSION[balance] WHERE `id` = $_SESSION[id] ");

      mysqli_query($connect, 'INSERT INTO `history` VALUES ("","'.$_SESSION['id'].'","You buy service #'.$sid.'") ');
      

      message( 'Success' );
   }

   if($_POST['promo_f']){

      $disc = services_promo($_POST['code']);
   
      if( !$disc )
         message('This code is not avaible!');


      $_SESSION['promo'] = $disc;

      go('services');

   }

?>