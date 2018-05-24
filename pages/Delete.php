<?php
require '../classes/DB.php';
$pdo = new PDO('mysql:host=127.0.0.1;dbname=ToolsForEver;charset=utf8', 'root', '');

$id = $_GET['id'];
DB::query('DELETE FROM employee WHERE U_id=:id', array(':id'=>$id));

 ?>

<a href="./account.php"></a>
