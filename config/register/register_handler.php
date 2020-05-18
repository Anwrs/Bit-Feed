<?php

$_SESSION['ColorMode'] = "Dark";

$name = "";
$email = "";
$password = "";
$password2 = "";
$errors = [];

if (isset($_POST['submit'])) {
    
    $name = (isset($_POST['name'])) ? $_POST['name'] : $errors["Name is required"];
    $email = (isset($_POST['email'])) ? $_POST['email'] : $errors["Email is required"];
    $password = (isset($_POST['password'])) ? $_POST['password'] : $errors["Password is required"];
    $password2 = (isset($_POST['password2'])) ? $_POST['password2'] : $errors["Verify second Password"];
    
    // function ValidateUser($name, $email, $password, $password2) {
    //     global $name, $email, $password, $password2, $errors;

    //     $name = (strlen($name) < 2) ? $name : $errors['Name is to short'];
    //     $name = (!ctype_alnum($name)) ? $name : $errors['Name cant have special characters'];
    //     $name = (strlen($name) > 16) ? $name : $errors['Name is to long'];
    //     $email = (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? $email : $errors['Email doenst exist'];
    //     $password = (strlen($password) < 6) ? $password : $errors['Password needs to have more then 6 characters'];
    //     $password = (!ctype_alnum($password)) ? $password : $errors['Password cant have special characters'];
    //     $password = (strlen($password) > 30) ? $password : $errors['Password cant be longer then 30 characters'];
    //     $password2 = ($password == $password2) ? $password2 : $errors['Passwords do not match'];
    // }

    // if (count($errors) == 0) {
    //     ValidateUser($name, $email, $password, $password2);
    // } elseif (count($errors) > 0) {
        
    // }

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
