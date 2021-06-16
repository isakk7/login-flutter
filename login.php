<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $email = $_POST['user_email'];
    $password = $_POST['users_password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE users_email=:user_email");
    $query->bindParam("users_email", $email, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">El usuario es incorrecta!</p>';
    } else {
        if (password_verify($password, $result['users_password'])) {
            $_SESSION['users_id'] = $result['ID'];
            echo '<p class="success">Bienvenido</p>';
        } else {
            echo '<p class="error">El password es imcorrecto!</p>';
        }
    }
}
 
?>

