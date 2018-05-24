<?php
require '../classes/DB.php';
require '../html/register.html';

if (isset($_POST['createaccount'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $email = $_POST['email'];

        if (!DB::query('SELECT User_name FROM user WHERE User_name=:username', array(':username'=>$username))){

             if (strlen($username) >= 3 && strlen($username) <= 32){

                  if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                       if (strlen($password) >= 6 && strlen($password) <= 60) {


                                 DB::query('INSERT INTO user VALUES (null, null, :password, :username)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT)));
                                 $echo = 'Success!';
                            }

                       }
                       else {
                            // echo 'Invalid Password!';
                            $echo = 'Invalid Password!';
                       }

                  }
                  else {
                         // echo 'Invalid Username!';
                         $echo = 'Invalid Username!';
                  }

             }
             else {
                  // echo 'Invalid Username!';
                  $echo = 'Invalid Username!';
             }

     }else {
          // echo 'User already exists!';
          $echo = 'User already exists!';
     }

?>

<form action="#" method="post" class="login-form">
     <h1>Register</h1>
          <input type="text" name="username" value="" placeholder="Username ..."><p />
          <input type="password" name="password" value="" placeholder="Password ..."><p />
          <input type="submit" name="createaccount" value="Create Account"><p />
          <h3><?php echo $echo; ?></h3>
</form>
