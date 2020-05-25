<?php

$name = "";
$email = "";
$password = "";
$password2 = "";
$errors = [];

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($name)) {
        array_push($errors, "Name is required");
    } elseif (strlen($name) < 4) {
        array_push($errors, "Name needs to be longer than 4 characters");
    } elseif (!ctype_alnum($name)) {
        array_push($errors, "Name can't have special characters");
    } elseif (strlen($name) > 16) {
        array_push($errors, "Name can't be longer than 16 characters");
    }

    if (empty($email)) {
        array_push($errors, "Email is required");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email adress is not valid");
    }
    
    if (empty($password)) {
        array_push($errors, "Password is required");
    } elseif (strlen($password) < 6) {
        array_push($errors, "Password needs to be longer than 6 characters");
    } elseif (!ctype_alnum($password)) {
        array_push($errors, "Password can't have special characters");
    } elseif (strlen($password) > 30) {
        array_push($errors, "Password can't be longer than 30 characters");
    }
    
    if ($password != $password2) {
        array_push($errors, "The two passwords do not match");
    }   
}