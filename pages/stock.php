<?php
     require '../classes/DB.php';
     require '../html/head2.html';
     require '../html/header.html';
     require '../classes/Login.php';

// $pdo = DB::query('SELECT user.U_id AS UserID, employee.U_id AS EmployeeUID, name, adress, tell FROM user, employee WHERE employee.U_id=user.U_id');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM stock';
$statement = $pdo->prepare($sql);
$statement->execute();
$employee = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
     <div class="login-form">
               <h2>Voorraad</h2>
               <table class="table">
                    <tr>
                         <th>ID</th>
                         <th>Hoeveelheid</th>
                         <th>Minimale hoeveelheid</th>
                         <th>Maximale hoeveelheid</th>
                         <th>Product ID</th>
                         <th>Filiaal ID</th>
                         <?php if (Login::IsLoggedIn()){ ?>
                              <th>Acties</th>
                         <?php } ?>
                    </tr>
                    <?php  foreach($employee as $emp): ?>
                    <tr>
                         <td><?= $emp->Stock_id; ?></td>
                         <td><?= $emp->Amount; ?></td>
                         <td><?= $emp->Min_amount; ?></td>
                         <td><?= $emp->Max_amount; ?></td>
                         <td><?= $emp->Prod_id; ?></td>
                         <td><?= $emp->fil_id; ?></td>
                         <td>
                              <?php if (Login::IsLoggedIn()){ ?>
                                   <a href="editStock.php?id=<?= $emp->Stock_id ?>">Edit</a>
                                   <a onclick="return confirm('Are you sure?')" href="deleteStock.php?id=<?= $emp->Stock_id ?>" class="#">Delete</a>
                                   <a href="addStock.php">Voeg voorraad toe</a>
                              <?php } ?>
                         </td>
                    </tr>
               <?php endforeach; ?>
               </table>
     </div>
</div>
