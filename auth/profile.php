<? top('Profile')?>


  <p>Balance:</p>
  <p><b><?=$_SESSION['balance']?>$</b></p>

  <h1>Edit profile</h1>

  <p><input id="password" type="password" placeholder=" New Password"></p>
  <p><input id="ip" type="text" placeholder="IP List" valuer='<?=$_SESSION['ip']?>'></p>
  <p>Confirm LogIn</p>
  <p><select id="protected">
    <?=str_replace('"'.$_SESSION['protected'].'"', '"'.$_SESSION['protected'].'" selected', '<option value="0">Disable</option><option value="1">Enable</option> '   )?>
  </select></p>
  <p><button onclick="post_query('aform', 'edit', 'password.ip.protected')">Save</button></p>

<? bottom()?>