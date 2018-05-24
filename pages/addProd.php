<?php
require '../classes/DB.php';
require '../html/register.html';



$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM employee';
$statement = $pdo->prepare($sql);
// $statement->execute([':id'=>$id]);
$employee = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['des']) && isset($_POST['price']) && isset($_POST['sup']))
{

     $des = $_POST['des'];
     $price = $_POST['price'];
     $sup = $_POST['sup'];

     DB::query('INSERT INTO products (Description, Price, Sup_id) VALUES (:des, :price, :sup)', array(':des'=>$des, ':price'=>$price, ':sup'=>$sup));
}


?>

<div class="container">
     <div class="login-form">
               <h3>Voeg een product toe</h3>
               <form action="#" method="post" >
                         <input type="text" name="des" placeholder="Beschrijving">
                         <input type="text" name="price" placeholder="Prijs">
                         <input type="text" name="sup" placeholder="Leverancier">
                         <input type="submit" class="submit" value="Toevoegen">
               </form>
     </div>
</div>
