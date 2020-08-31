<?
 
if( $_GET['ref'] && is_numeric( $_GET['ref']) ){

   setcookie( "ref", $_GET['ref'], strtotime('+1 week'));
   header('location: /home');
}


if ( $_SERVER['REQUEST_URI'] == '/' ) $page = 'home';
else{
   $page = substr($_SERVER['REQUEST_URI'], 1);
   if ( !preg_match('/^[A-z0-9]{3,15}$/', $page ) ) not_found();
};


  //localhost
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_name = 'fanj1';
  //ProFreeHost
  $db_host2 = 'sql212.unaux.com';
  $db_user2 = 'unaux_26589335';
  $db_password2 = 'pnf2g6nuz7jlci';
  $db_name2 = 'unaux_26589335_1';  
  //timeweb
  $db_host3 = 'localhost';
  $db_user3 = 'cc10089_engine';
  $db_password3 = 'tSQ81vf2';
  $db_name3 = 'cc10089_engine';  
  //42web
  $db_host4 = 'sql100.epizy.com';
  $db_user4 = 'epiz_26604486';
  $db_password4 = 'D6Udyi2j9MZS5T';
  $db_name4 = 'epiz_26604486_engine';  



$connect = mysqli_connect( $db_host2, $db_user2, $db_password2, $db_name2 );
if( !$connect ) exit('Error connect to DataBase');

session_start();

if( file_exists('all/'.$page.'.php') ) include 'all/'.$page.'.php';
else if( $_SESSION['id'] and file_exists('auth/'.$page.'.php') ) include 'auth/'.$page.'.php';
else if( !$_SESSION['id'] and file_exists('guest/'.$page.'.php') ) include 'guest/'.$page.'.php';
else not_found();


function not_found()
{
   exit('Not found page');
}

function message( $text )
{
   exit('{"message" : "'.$text.'"}');
}

function go( $url )
{
   exit('{"go" : "'.$url.'"}');
}

function random_str( $num = 30 )
{
   return substr(str_shuffle('0987654321qazxswedcvfrtgbnhyujmkiolpQAZXSWEDCVFRTGBNHYUJMKIOLP'), 0, $num );
}

function captcha_show()
{
   $questions = array(
      1 => 'Capitan of USA?',
      2 => 'Capitan of Ukraine?',
      3 => 'Capitan of Russian?',
      4 => 'Capitan of UK?',
      5 => 'President Belarus?',
   );
   $num = mt_rand( 1, count($questions) );
   $_SESSION['captcha'] = $num;
   echo $questions[$num];
}

function captcha_valid()
{
   $answers = array(
      1 => 'Washington',
      2 => 'Kiev',
      3 => 'Moscow',
      4 => 'London',
      5 => 'Lukashenko',
   );

   if( $_SESSION['captcha'] != array_search( $_POST['captcha'], $answers ) )
      message(' Answer is not valid! ' );

}

function email_valid()
{
   if( !filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL))
      message('Email is not correct!');
}

function password_valid()
{
   if ( !preg_match('/^[A-z0-9]{3,18}$/',  $_POST['password'] ) )
      message('Password is not correct!');
   //$_POST['password'] = md5($_POST['password']);
}


function top( $title )
{
   echo '
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>'.$title.'</title>
   <link rel="stylesheet" href="../css/main.css">
   <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

   <div class="wrapper">

   
      <div class="menu">
      <a href="/contact"> Contact </a>
      ';
      if($_SESSION['id'])
      
         echo '
            <a href="/profile"> Profile </a>
            <a href="/history"> History </a>
            <a href="/referral"> Referral </a>
            <a href="/logout"> Logout </a>
         ';
      else
         echo '
            <a href="/"> Main </a>
            <a href="/login"> Log In </a>
            <a href="/signup"> Sing Up </a>
         ';
      echo'
      </div>

      <div class="content">
         <div class="block">
         
         
     

   
   ';
};

function bottom()
{
   echo '
         </div>
      </div>
   </div>
   <script src="js/script.js"></script>
   <script src="js/jquery.min.js"></script>
</body>
</html>
   ';
};




?>


