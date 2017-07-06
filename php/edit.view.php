<?php
if(!empty($_GET["id"])) {
  $id = $_GET['id'];
  // $name = $_GET['name'];
  // $email = $_GET['email'];
  // $date = $_GET['date'];
  require_once '../classes/users.class.php';
  $users = users::singleton();
  $data = $users->get_users_id($id);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>CRUD PHP PDO</title>
    <meta charset="utf-8" />
</head>
<body>
  <div>
    <?php
    foreach($data as $row):
    ?>
    <form class="" action="../instances/edit.instance.php" method="post">
      <input type="hidden" name="id" value="<?=$row['id']?>">
      <input type="text" name="name" value="<?=$row['name']?>">
      <input type="text" name="email" value="<?=$row['email']?>">
      <button type="submit" name="submit">Save</button>
    </form>
    <?php
    endforeach;
    ?>
  </div>
</body>
</html>
