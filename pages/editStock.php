<?php
require '../classes/DB.php';


$id = $_GET['id'];


$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM employee';
$statement = $pdo->prepare($sql);
// $statement->execute([':id'=>$id]);
$employee = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['am'])&& isset($_POST['min'])&& isset($_POST['max'])&& isset($_POST['fil']))
{

     $am = $_POST['am'];
     $min = $_POST['min'];
     $max = $_POST['max'];
     $fil = $_POST['fil'];

     DB::query('UPDATE stock SET Amount=:am, Min_amount=:min, Max_amount=:max, fil_id=:fil WHERE Stock_id=:id', array(':am'=>$am, ':min'=>$min, ':id'=>$id, ':max'=>$max, ':fil'=>$fil));

}

require '../html/register.html';
?>

<div class="container">
     <div class="login-form">
               <h3>Wijzig voorraad</h3>
               <form action="#" method="post">
                         <input type="text" name="am" placeholder="Hoeveelheid">
                         <input type="text" name="min" placeholder="Minimaal">
                         <input type="text" name="max" placeholder="Maximaal">
                         <input type="text" name="fil" placeholder="Filiaal ID">
                         <input type="submit" class="submit" value="Wijzig">
               </form>
     </div>
</div>
