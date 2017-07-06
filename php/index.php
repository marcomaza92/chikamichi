<?php
require_once 'classes/users.class.php';
$users = users::singleton();
$data = $users->get_users();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>CRUD PHP PDO</title>
    <meta charset="utf-8" />
</head>
<body>
  <div>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
      <?php
      foreach($data as $row):
      ?>
      <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['email']?></td>
        <td><?=$row['date']?></td>
        <td><a href="views/edit.view.php?id=<?=$row['id']?>">Edit</a></td>
        <td><a href="instances/delete.instance.php?id=<?=$row['id']?>">Delete</a></td>
      </tr>
      <?php
      endforeach;
      ?>
    </table>
    <div class="">
      <a href="views/add.view.html">Add</a>
    </div>
  </div>
</body>
</html>
