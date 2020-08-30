<? top('Sign Up')?>

   <h1>Sign Up</h1>

   <p><input id="email" name="email" type="text" placeholder="Email"></p>
   <p><input id="password" name="password" type="password" placeholder="Password"></p>
   <p><input id="captcha" type="text" placeholder="<? captcha_show() ?>"></p>
   <p><button onclick="post_query('gform', 'signup', 'email.password.captcha')">Sign Up</button></p>
   <p><a href="login" class="second_btn">Enter</a></p>

<? bottom()?>