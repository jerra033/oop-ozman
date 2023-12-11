<?php
session_start();

require_once('User.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userObj = new User($db);
    $user = $userObj->login($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit();
    } else {
       
        echo "Ongeldige gebruikersnaam of wachtwoord.";
    }
}
?>
