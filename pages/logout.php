<?php
require '../classes/DB.php';
require '../classes/Login.php';

if (isset($_POST['confirm'])){

     if (isset($_POST['alldevices'])){
          DB::query('DELETE FROM login_tokens WHERE U_id=:userid', array(':userid'=>Login::IsLoggedIn()));
     } else{
          if (isset($_COOKIE['SNID'])){
               DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
          }
          setcookie('SNID', '1', time()-3600);
          setcookie('SNID_', '1', time()-3600);

     }
}

require '../html/register.html';
?>

<form class="login-form" action="#" method="post">
     <?php
          if (!Login::IsLoggedIn()){
               echo '<h3>Not logged in!</h3>' . '<br />';
          }
     ?>
     <input type="checkbox" name="alldevices" value="alldevices">
     <h2>Log uit op alle devices?</h2>
     <input type="submit" name="confirm" value="Logout">
</form>
