<?php
session_start();

$email = "";
$password = "";
$errors = [];

include 'config/database.php';

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ((empty($email)) || (empty($password))) {
        $errors[] = "Its empty..";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email adress is not valid";
    } else {
        $stmt = $pdo->prepare('SELECT * FROM Users WHERE email = :email AND password = :password');
        $stmt->execute(['email' => $email, 'password' => $password]);
        $user = $stmt->fetch();

        if (empty($user)) {
            $errors[] = 'Email and password do not match';
        }
    }

    if (count($errors) == 0 ) {
        $_SESSION['user'] = $user['names'];
        $_SESSION['userEmail'] = $user['email'];
        header('Location:goal.php');
        exit;
    }
}
