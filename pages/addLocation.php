<?php
require '../classes/DB.php';
require '../html/register.html';



$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM location';
$statement = $pdo->prepare($sql);
$employee = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['name']) && isset($_POST['loc']) && isset($_POST['adr']) && isset($_POST['tel']))
{

     $name = $_POST['name'];
     $loc = $_POST['loc'];
     $adr = $_POST['adr'];
     $tel = $_POST['tel'];

               DB::query('INSERT INTO location (name, Fil_place, Fil_adress, Fil_tell) VALUES (:name, :loc, :adr, :tell)', array(':name'=>$name, ':loc'=>$loc, ':adr'=>$adr, ':tell'=>$tel));

}


?>

<div class="container">
     <div class="login-form">
          <h3>Voeg locatie toe</h3>
          <form action="#" method="post">
                    <input type="text" name="name" placeholder="Naam">
                    <input type="text" name="loc" placeholder="Locatie">
                    <input type="text" name="adr" placeholder="Adres">
                    <input type="text" name="tel" placeholder="Telefoon">
                    <input type="submit" class="submit" value="Toevoegen">
          </form>
     </div>
</div>
