<?php
     require '../classes/DB.php';
     require '../html/head2.html';
     require '../html/header.html';
     require '../classes/Login.php';

// $pdo = DB::query('SELECT user.U_id AS UserID, employee.U_id AS EmployeeUID, name, adress, tell FROM user, employee WHERE employee.U_id=user.U_id');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');
$sql = 'SELECT U_id, Func_id, User_name FROM user';
$statement = $pdo->prepare($sql);
$statement->execute();
$employee = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
     <div class="login-form">
               <h3>All Users</h3>
               <table class="table">
                    <tr>
                         <th>ID</th>
                         <th>Functie ID</th>
                         <th>Gebruikersnaam</th>
                         <?php if (Login::IsLoggedIn()){ ?>
                              <th>Acties</th>
                         <?php } ?>
                    </tr>
                    <?php  foreach($employee as $emp): ?>
                    <tr>
                         <td><?= $emp->U_id; ?></td>
                         <td><?= $emp->Func_id; ?></td>
                         <td><?= $emp->User_name; ?></td>
                         <td>
                              <?php if (Login::IsLoggedIn()){ ?>
                                   <a href="editUser.php?id=<?= $emp->U_id ?>">Edit</a>
                                   <a onclick="return confirm('Are you sure?')" href="deleteUser.php?id=<?= $emp->U_id ?>" class="#">Delete</a>
                                   <a href="addEmp.php?id=<?= $emp->U_id ?>">Voeg medewerker toe</a>
                              <?php } ?>
                         </td>
                    </tr>
               <?php endforeach; ?>
               </table>
     </div>
</div>
