<?php
     require './classes/DB.php';
     // require './html/head.html';
     require './html/homepage.html';
     require './classes/Login.php';

if (Login::IsLoggedIn()) {
     // echo 'Logged In!';
     // echo IsLoggedIn();
}
else {
     echo 'Not logged In!';
}

?>
