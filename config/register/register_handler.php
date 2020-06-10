<?php
session_start();

$name = "";
$email = "";
$password = "";
$password2 = "";
$errors = [];

include 'config/database.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (strlen($name) < 2) {
        $errors[] = "Name needs to be longer than 2 characters";
    } elseif (!ctype_alnum($name)) {
        $errors[] = "Name can't have special characters";
    } elseif (strlen($name) > 16) {
        $errors[] = "Name can't be longer than 16 characters";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email adress is not valid";
    }

    $stmt = $pdo->prepare("SELECT email FROM Users WHERE email=?");
    $stmt->execute([$email]);
    $user_email = $stmt->fetch();
    if ($user_email) {
        $errors[] = "Email adress is already being used";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password needs to be longer than 6 characters";
    } elseif (!ctype_alnum($password)) {
        $errors[] = "Password can't have special characters";
    } elseif (strlen($password) > 30) {
        $errors[] = "Password can't be longer than 30 characters";
    }

    if ($password != $password2) {
        $errors[] = "The two passwords do not match";
    }


    if (count($errors) == 0) {
        $sql = "INSERT INTO Users (names, email, password) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$name, $email, $password]);

        $_SESSION['user'] = $name;
        $_SESSION['userEmail'] = $email;
        header('Location:goal.php');
        exit;
    }
}
