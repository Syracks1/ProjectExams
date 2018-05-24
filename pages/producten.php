<?php
     require '../classes/DB.php';
     require '../html/head2.html';
     require '../html/header.html';
     require '../classes/Login.php';

// $pdo = DB::query('SELECT user.U_id AS UserID, employee.U_id AS EmployeeUID, name, adress, tell FROM user, employee WHERE employee.U_id=user.U_id');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT Prod_id, Description, Price, Sup_id FROM products';
$statement = $pdo->prepare($sql);
$statement->execute();
$employee = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
     <div class="login-form">
          <h2>All Users</h2>
          <table class="table">
               <tr>
                    <th>ID</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th>Leverancier ID</th>
                    <?php if (Login::IsLoggedIn()){ ?>
                         <th>Acties</th>
                    <?php } ?>
               </tr>
               <?php  foreach($employee as $emp): ?>
               <tr>
                    <td><?= $emp->Prod_id; ?></td>
                    <td><?= $emp->Description; ?></td>
                    <td><?= $emp->Price; ?></td>
                    <td><?= $emp->Sup_id; ?></td>
                    <td>
                         <?php if (Login::IsLoggedIn()){ ?>
                              <a href="editProduct.php?id=<?= $emp->Prod_id ?>">Edit</a>
                              <a onclick="return confirm('Are you sure?')" href="deleteUser.php?id=<?= $emp->Prod_id ?>" class="#">Delete</a>
                              <a href="addProd.php">Voeg product toe</a>
                         <?php } ?>
                    </td>
               </tr>
          <?php endforeach; ?>
          </table>
     </div>
</div>
