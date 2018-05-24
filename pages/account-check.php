<?php
     require '../classes/DB.php';
     require '../classes/Login.php';

     if (Login::IsLoggedIn()) {
          header("Location: account.php");
     }
     else {
          if (!Login::IsLoggedIn()){
               echo '<h3>Not logged in!</h3>' . '<br />';
          }
     }
?>
