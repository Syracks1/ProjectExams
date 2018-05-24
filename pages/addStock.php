<?php
require '../classes/DB.php';
require '../html/register.html';



$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM stock';
$statement = $pdo->prepare($sql);
$employee = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['am']) && isset($_POST['min']) && isset($_POST['max']) && isset($_POST['prod']) && isset($_POST['fil']))
{

     $am = $_POST['am'];
     $min = $_POST['min'];
     $max = $_POST['max'];
     $prod = $_POST['prod'];
     $fil = $_POST['fil'];

     if ($am > $min){
          if ($am < $max){
               DB::query('INSERT INTO stock (Amount, Min_amount, Max_amount, Prod_id, fil_id) VALUES (:am, :min, :max, :prod, :fil)', array(':am'=>$am, ':min'=>$min, ':max'=>$max, ':prod'=>$prod, ':fil'=>$fil));
          }
          else {
               echo 'Je kunt niet meer dan ' . $max . ' producten toevoegen!';
          }
     }
     else {
          echo 'Je kunt niet minder dan ' . $max . ' producten toevoegen!';
     }
}


?>

<div class="container">
     <div class="login-form">
          <h3>Voeg voorraad toe</h3>
          <form action="#" method="post">
                    <input type="text" name="am" placeholder="Hoeveelheid">
                    <input type="text" name="min" placeholder="Minimaal">
                    <input type="text" name="max" placeholder="Maximaal">
                    <input type="text" name="prod" placeholder="Product ID">
                    <input type="text" name="fil" placeholder="Filiaal ID">
                    <input type="submit" class="submit" value="Toevoegen">
          </form>
     </div>
</div>
