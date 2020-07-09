<?php
include 'config/database.php';

$comment = "";
$persgoal = "";
if (isset($_POST['createComment'])) {
    $comment = $_POST['comment'];
    $persgoal = $_POST['createComment'];

    $sql = 'INSERT INTO PersonalComment (persgoal_id, commenttext, date) VALUES (?,?, NOW())';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$persgoal, $comment]);

    header('location:Personalgoalinfo.php?persgoal_id=' . $persgoal);
    exit;
}

if (isset($_POST['delete'])) {
    $persgoal = $_POST['delete'];

    $stmt = $pdo->prepare('DELETE FROM PersonalGoals WHERE persgoal_id = ?');
    $stmt->execute([$persgoal]);
    $user = $stmt->fetchAll();

    $stmt = $pdo->prepare('DELETE FROM PersonalComment WHERE persgoal_id = ?');
    $stmt->execute([$persgoal]);
    $user = $stmt->fetchAll();

    header('location:personalgoal.php');
    exit;
}

if (isset($_POST['finish'])) {
    $persgoal = $_POST['finish'];

    $sql = "UPDATE PersonalGoals SET complete = ? WHERE persgoal_id = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(["YES", $persgoal]);

    header('location:personalgoal.php');
    exit;
}
