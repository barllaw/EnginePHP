<?

$query = mysqli_query( $connect, ' SELECT `text` FROM `history` LIMIT '.$_SESSION['loader'].', '.( $_SESSION['loader'] + 2) );

if( !mysqli_num_rows($query) ){
   exit;
}

$_SESSION['loader'] += 2;

while( $row = mysqli_fetch_assoc( $query )){
   echo '<p>'.$row['text'].'</p>'; 
}

?>