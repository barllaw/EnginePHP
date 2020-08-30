<? top('Recovery password')?>

   <h1>Recovery password</h1>

   <p><input id="email" type="text" placeholder="Email"></p>
   <p><input id="captcha" type="text" placeholder="<? captcha_show() ?>"></p>
   <p><button onclick="post_query('gform', 'recovery', 'email.captcha')">Recovery</button></p>

<? bottom()?>