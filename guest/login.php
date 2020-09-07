<? top('Login')?>

   <h1>Login</h1>
   
   <p><input id="email" type="text" placeholder="Email"></p>
   <p><input id="password" type="password" placeholder="Password"></p>
   <p><input id="captcha" type="text" placeholder="<? captcha_show() ?>"></p>
   <p><button onclick="post_query('gform', 'login', 'email.password.captcha')">Enter</button></p>
   <p><a href="recovery" class="second_btn">Recovery password</a></p>

<? bottom()?>