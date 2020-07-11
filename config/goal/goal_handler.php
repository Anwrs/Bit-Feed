<?php
session_start();
include 'config/database.php';

$goal = "";
$email = $_SESSION['userEmail'];
$date = "";
$invite = '';

if (isset($_POST['createGoal'])) {
    $goal = $_POST['goal'];
    $date = $_POST['date'];
    $goal_id = rand(1, 5000);
    $invite = $_POST['inviteUsers'];

    $sql = 'INSERT INTO Goals (goal_id, goal, email, date, checked) VALUES (?,?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$goal_id, $goal, $email, $date, "YES"]);

    foreach ($invite as $user) {
        if ($user == $_SESSION['userEmail']) {

        } else {
            $sql = 'INSERT INTO Goalsinvite (goal_id, creator, goal, goaluser, checked) VALUES (?,?,?,?,?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$goal_id, $email, $goal, $user, "NO"]);
        }
    }

header('location:goal.php');
exit;
}

$pergoal = "";
$startperdate = "";
$endperdate = "";
$pergoaltext = "";

if (isset($_POST['createPergoal'])) {
    $pergoal = $_POST['pergoal'];
    $startperdate = $_POST['startperdate'];
    $endperdate = $_POST['endperdate'];
    $pergoal_id = rand(1, 5000);
    $pergoaltext = $_POST['pergoaltext'];

    $sql = 'INSERT INTO PersonalGoals (persgoal_id, goal, goaltext, email, startdate, enddate, complete) VALUES (?,?,?,?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$pergoal_id, $pergoal, $pergoaltext, $email, $startperdate, $endperdate, "NO"]);

header('location:personalgoal.php');
exit;
}

if (isset($_POST['logout'])) {
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
    header('Location:index.php');
    exit;
}

if (isset($_POST['deleteGoal'])) {
    $idGoal = $_POST['deleteGoal'];

    $stmt = $pdo->prepare('DELETE FROM Goals WHERE goal_id = ?');
    $stmt->execute([$idGoal]);
    $user = $stmt->fetch();

    $stmt = $pdo->prepare('DELETE FROM Goalsinvite WHERE goal_id = ?');
    $stmt->execute([$idGoal]);
    $user = $stmt->fetch();

    header('location:goal.php');
    exit;
}

if (isset($_POST['acceptMessage'])) {
    $idGoal = $_POST['acceptMessage'];

    $sql = "UPDATE Goalsinvite SET checked = ? WHERE goal_id = ? AND goaluser = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(["YES", $idGoal, $_SESSION['userEmail']]);

    header('location:goal.php');
    exit;
}

if (isset($_POST['declineMessage'])) {
    $idGoal = $_POST['declineMessage'];

    $stmt = $pdo->prepare('DELETE FROM Goalsinvite WHERE goal_id = ? AND goaluser = ?');
    $stmt->execute([$idGoal, $_SESSION['userEmail']]);
    $user = $stmt->fetch();

    header('location:goal.php');
    exit;
}
