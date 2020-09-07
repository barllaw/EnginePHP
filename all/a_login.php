<? top('Login Admin')?>

   <h1>Login Admin</h1>

   <p><input id="password" type="password" placeholder="Password"></p>
   <p><input id="captcha" type="text" placeholder="<? captcha_show() ?>"></p>
   <p><button onclick="post_query('a_auth', 'login', 'password.captcha')">Enter</button></p>

<? bottom()?>