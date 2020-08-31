<? top(' Referrals ')?>

   <h1> Referrals </h1>

   <p>Your referral`s link: <b> http://enginephp.unaux.com?ref=<?= $_SESSION['id'] ?> </b></p>
<?
$query = mysqli_query( $connect, " SELECT `email` FROM `users` WHERE `ref` = $_SESSION[id] ");

if( !mysqli_num_rows($query))  exit('You havent referral');

while( $row = mysqli_fetch_assoc($query) ){
   echo '<p>'.$row['email'].'<p>';
}

?>
<? bottom()?>