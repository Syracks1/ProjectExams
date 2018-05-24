<?php
require '../classes/DB.php';


$id = $_GET['id'];


$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM employee';
$statement = $pdo->prepare($sql);
// $statement->execute([':id'=>$id]);
$employee = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['des'])&& isset($_POST['price']) && isset($_POST['sup']))
{

     $des = $_POST['des'];
     $price = $_POST['price'];
     $sup = $_POST['sup'];

     DB::query('UPDATE products SET Description=:des, Price=:price, Sup_id=:sup WHERE Prod_id=:id', array(':des'=>$des, ':price'=>$price, ':id'=>$id, ':sup'=>$sup));

}

require '../html/register.html';
?>

<div class="container">
     <div class="login-form">
          <h3>Wijzig Producten</h3>
          <form class="" action="#" method="post" class="login-form">
                    <input type="text" name="des" placeholder="Beschrijving">
                    <input type="text" name="price" placeholder="Prijs">
                    <input type="text" name="sup" placeholder="Leverancier">
                    <input type="submit" class="submit" value="Wijzig">
          </form>
     </div>
</div>
