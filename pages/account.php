<?php
     // require '../classes/DB.php';
     require '../html/head2.html';
     require '../html/header.html';

// $pdo = DB::query('SELECT user.U_id AS UserID, employee.U_id AS EmployeeUID, name, adress, tell FROM user, employee WHERE employee.U_id=user.U_id');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT * FROM employee';
$statement = $pdo->prepare($sql);
$statement->execute();
$employee = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
     <div class="login-form">
          <h3>All employees</h3>
          <table class="table">
               <tr>
                    <th>ID</th>
                    <th>Filiaal ID</th>
                    <th>User ID</th>
                    <th>Naam</th>
                    <th>Adress</th>
                    <th>Telefoon</th>
                    <th>Action</th>
               </tr>
               <?php  foreach($employee as $emp): ?>
               <tr>
                    <td><?= $emp->Med_id; ?></td>
                    <td><?= $emp->fil_id; ?></td>
                    <td><?= $emp->U_id; ?></td>
                    <td><?= $emp->name; ?></td>
                    <td><?= $emp->adress; ?></td>
                    <td><?= $emp->tell; ?></td>
                    <td>
                         <a href="edit.php?id=<?= $emp->U_id ?>">Edit</a>
                         <a onclick="return confirm('Are you sure?')" href="delete.php?id=<?= $emp->U_id ?>" class="#">Delete</a>
                    </td>
               </tr>
          <?php endforeach; ?>
          </table>
     </div>
</div>
