<? top(' Reviews ')?>

   <h1> Reviews </h1>

   <p><textarea name="" id="message" cols="30" rows="4" placeholder="Typing your message:"></textarea></p>
   <p><button onclick="post_query('add', 'reviews', 'message')">Send</button></p>

 <?  
   
   $query = mysqli_query( $connect, ' SELECT `text`, `uid` FROM `reviews` ORDER BY `id` DESC ' );

   if( !mysqli_num_rows($query) ) echo('You havent reviews!');


   while( $row = mysqli_fetch_assoc( $query )){

      $user = mysqli_fetch_assoc( mysqli_query($connect, " SELECT `email` FROM `users` WHERE `id` = $row[uid] " ));

      echo '<p><span style="margin-right: 10px; font-size: 13px; color: #555;">'.$user['email'].'</span >'.nl2br(htmlspecialchars($row['text']), false).'</p>'; 
   }

 ?>


<? bottom()?>