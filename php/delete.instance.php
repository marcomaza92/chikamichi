<?php
if (!isset($_GET['id'])) {
    header("Location: ../");
} else {

    require_once '../classes/users.class.php';
    $users = users::singleton();
    $id = $_GET['id'];
    $users->delete_users($id);
    header("Location: ../");
}
?>
