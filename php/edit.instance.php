<?php
if (!isset($_POST['submit'])) {
    header("Location: ../");
} else {

    require_once '../classes/users.class.php';
    $users = users::singleton();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = date('Y-m-d');
    $users->update_users($id,$name,$email,$date);
    header("Location: ../");
}
?>
