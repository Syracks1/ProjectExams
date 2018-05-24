<?php
     require '../classes/DB.php';
     require '../html/head2.html';
     require '../html/header.html';
     require '../classes/Login.php';

// $pdo = DB::query('SELECT user.U_id AS UserID, employee.U_id AS EmployeeUID, name, adress, tell FROM user, employee WHERE employee.U_id=user.U_id');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM location';
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
                         <th>Naam</th>
                         <th>Plaats</th>
                         <th>Adres</th>
                         <th>Telefoon</th>
                         <?php if (Login::IsLoggedIn()){ ?>
                              <th>Acties</th>
                         <?php } ?>
                    </tr>
                    <?php  foreach($employee as $emp): ?>
                    <tr>
                         <td><?= $emp->fil_id; ?></td>
                         <td><?= $emp->name; ?></td>
                         <td><?= $emp->Fil_place; ?></td>
                         <td><?= $emp->Fil_adress; ?></td>
                         <td><?= $emp->Fil_tell; ?></td>
                         <td>
                              <?php if (Login::IsLoggedIn()){ ?>
                                   <a href="editLocations.php?id=<?= $emp->fil_id ?>">Edit</a>
                                   <a onclick="return confirm('Are you sure?')" href="deleteStock.php?id=<?= $emp->fil_id ?>" class="#">Delete</a>
                                   <a href="addLocation.php">Voeg locatie toe</a>
                              <?php } ?>
                         </td>
                    </tr>
               <?php endforeach; ?>
               </table>
     </div>
</div>
