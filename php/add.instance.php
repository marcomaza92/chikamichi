<?php
if (!isset($_POST['submit'])) {
    header("Location: ../");
} else {

    require_once '../classes/users.class.php';
    $users = users::singleton();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = date('Y-m-d');
    $users->add_users($name,$email,$date);
    header("Location: ../");
}
?>
