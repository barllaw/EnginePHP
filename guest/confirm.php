<?

if( !$_SESSION['confirm']['code']) not_found();

top('Confirm')?>

   <h1>Confirm</h1>
   <p><b><?=$_SESSION['confirm']['code']?></b></p>
   <p><input id="code" name="code" type="text" placeholder="Code"></p>
   <p><button onclick="post_query('gform', 'confirm', 'code')">Confirm</button></p>

<? bottom()?>