<?php
// session_start();
include 'config/database.php';

$goal = "";
$email = $_SESSION['userEmail'];
$date = "";
$public = "";
$type = "";
$full = false;
$groupperson1 = "";
$groupperson2 = "";
$groupperson3 = "";
$groupperson4 = "";

if (isset($_POST['createGoal'])) {
    $goal = $_POST['goal'];
    $date = $_POST['date'];
    $public = $_POST['publicView'];
    $goal_id = rand(1, 5000);
    $type = $_POST['typeGoal'];

    if ($type == 'Group') {
        $groupPerson1 = $_POST['groupPerson1'];
        $groupPerson2 = $_POST['groupPerson2'];
        $groupPerson3 = $_POST['groupPerson3'];
        $groupPerson4 = $_POST['groupPerson4'];

            $sql = 'SELECT goal_id, goal, email, date, public FROM Goals WHERE email = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $count = $stmt->rowCount();

            if ($count < 20) {
                $sql = 'INSERT INTO Goals (goal_id, goal, email, date, public, type, groupPerson1, groupPerson2, groupPerson3, groupPerson4) VALUES (?,?,?,?,?,?,?,?,?,?)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$goal_id, $goal, $email, $date, $public, $type, $groupPerson1, $groupPerson2, $groupPerson3, $groupPerson4]);

                header('location:goal.php');
                exit;
            } else {
                $full = true;
            }

    } else {

            $sql = 'SELECT goal_id, goal, email, date, public FROM Goals WHERE email = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $count = $stmt->rowCount();

            if ($count < 20) {
                $sql = 'INSERT INTO Goals (goal_id, goal, email, date, public, type) VALUES (?,?,?,?,?,?)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$goal_id, $goal, $email, $date, $public, $type]);

                header('location:goal.php');
                exit;
            } else {
                $full = true;
            }
    }
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

    $stmt = $pdo->prepare('DELETE FROM Goals WHERE id = ?');
    $stmt->execute([$idGoal]);
    $user = $stmt->fetch();

    header('location:goal.php');
    exit;
}
