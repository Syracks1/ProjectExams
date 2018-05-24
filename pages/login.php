<?php
require '../classes/DB.php';
require '../classes/Login.php';

if (isset($_POST['login'])){
     $username = $_POST['username'];
     $password = $_POST['password'];

     if (DB::query('SELECT User_name FROM user WHERE User_name=:username', array(':username'=>$username))){

          if (password_verify($password, DB::query('SELECT passw FROM user WHERE User_name=:username', array(':username'=>$username))[0]['passw'])) {
                  // echo 'Logged in!';

                  $cstrong = True;
                  $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

                  $user_id = DB::query('SELECT U_id FROM user WHERE User_name=:username', array(':username'=>$username))[0]['U_id'];
                  DB::query('INSERT INTO login_tokens VALUES (null, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                  // DB::query('INSERT INTO employee VALUES (null, null, :user, :name, :adress, :tell)', array(':user'=>$user_id, ':name'=>'Empty', ':adress'=>'Empty', ':tell'=>'Empty'));

                  // $pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
                  // $stmt = $pdo->prepare('SELECT 1 FROM table WHERE ID=?');
                  // // $stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
                  // $stmt->bindValue( 1, 'U_id');
                  // $stmt->execute();
                  // // $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  //
                  // if(!$stmt->rowCount() == 0)
                  // {
                  //      DB::query('INSERT INTO employee VALUES (null, null, :user, :name, :adress, :tell)', array(':user'=>$user_id, ':name'=>'Empty', ':adress'=>'Empty', ':tell'=>'Empty'));
                  // }

                  setcookie('SNID', $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                  setcookie('SNID_', '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
          }
          else {
                  echo 'Incorrect Password!';
          }

     }
     else {
          echo 'User does not exist!';
     }
}



require '../html/register.html';

if (!Login::IsLoggedIn()){
     echo '<form action="login.php" method="post" class="login-form">
          <h1>Login to your account</h1>
          <input type="text" name="username" value="" placeholder="Username ..."><p />
          <input type="password" name="password" value="" placeholder="Password ..."><p />
          <input type="submit" name="login" value="Login">
     </form>';
} else {
     echo 'Already logged in!';
}
?>
