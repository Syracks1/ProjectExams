<?php
require '../classes/DB.php';


$id = $_GET['id'];


$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM employee';
$statement = $pdo->prepare($sql);
$employee = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['name'])&& isset($_POST['loc'])&& isset($_POST['adr'])&& isset($_POST['tel']))
{

     $name = $_POST['name'];
     $loc = $_POST['loc'];
     $adr = $_POST['adr'];
     $tel = $_POST['tel'];

     DB::query('UPDATE location SET name=:name, Fil_place=:loc, Fil_adress=:adr, Fil_tell=:tel WHERE fil_id=:id', array(':name'=>$name, ':loc'=>$loc, ':adr'=>$adr, ':tel'=>$tel, ':id'=>$id));

}

require '../html/register.html';
?>

<div class="container">
     <div class="login-form">
               <h3>Wijzig locatie</h3>
               <form action="#" method="post">
                         <input type="text" name="name" placeholder="Naam">
                         <input type="text" name="loc" placeholder="Locatie">
                         <input type="text" name="adr" placeholder="Adres">
                         <input type="text" name="tel" placeholder="Telefoon">
                         <input type="submit" class="submit" value="Wijzig">
               </form>
     </div>
</div>
