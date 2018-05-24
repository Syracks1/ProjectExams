<?php
require '../classes/DB.php';
require '../html/register.html';

$id = $_GET['id'];


$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM employee';
$statement = $pdo->prepare($sql);
$employee = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['name']) && isset($_POST['adress']) && isset($_POST['fil']) && isset($_POST['tell']))
{

     $fil = $_POST['fil'];
     $name = $_POST['name'];
     $adress = $_POST['adress'];
     $tell = $_POST['tell'];

     DB::query('INSERT INTO employee (fil_id, U_id, name, adress, tell) VALUES (:fil, :id, :name, :adress, :tell)', array(':fil'=>$fil, ':id'=>$id, ':name'=>$name, ':adress'=>$adress, ':tell'=>$tell));
}


?>

<div class="container">
     <div class="login-form">
          <h2>Wijzig Medewerker</h2>
          <form action="#" method="post">
                    <input type="text" name="fil" placeholder="Filiaal ID">
                    <input type="text" name="name" placeholder="Naam">
                    <input type="text" name="adress" placeholder="Adres">
                    <input type="text" name="tell" placeholder="Telefoon">
                    <input type="submit" class="submit" value="Wijzig">
          </form>
     </div>
</div>
