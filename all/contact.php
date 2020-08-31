<? top(' Contact ')?>

   <h1> Contact </h1>

   <p><input id="email" type="text" placeholder="Email" value="<?=$_SESSION['email']?>"></p>
   <p><textarea name="" id="message" cols="30" rows="4" placeholder="Typing your message:"></textarea></p>
   <p><input id="captcha" type="text" placeholder="<? captcha_show() ?>"></p>
   <p><button onclick="post_query('mail', 'contact', 'email.message.captcha')">Send</button></p>

<? bottom()?>