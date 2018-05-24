<?php
require '../classes/DB.php';


$id = $_GET['id'];


$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM employee';
$statement = $pdo->prepare($sql);
// $statement->execute([':id'=>$id]);
$employee = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['func'])&& isset($_POST['uname']))
{

     $func = $_POST['func'];
     $uname = $_POST['uname'];

     DB::query('UPDATE user SET Func_id=:func, User_name=:uname WHERE U_id=:id', array(':func'=>$func, ':uname'=>$uname, ':id'=>$id));

}

require '../html/register.html';
?>

<div class="container">
     <div class="login-form">
               <h3>Wijzig Gebruiker</h3>
               <form action="#" method="post">
                         <input type="text" name="func" placeholder="Functie ID">
                         <input type="text" name="uname" placeholder="Username">
                         <input type="submit" class="submit" value="Wijzig">
               </form>
          </div>
     </div>
</div>
