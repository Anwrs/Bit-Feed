<?php
session_start();
if (isset($_SESSION['user'])) {} else {
    header("Location:login.php");
    exit;
}
$persgoal = "";
include 'config/goal/personal.php';
include 'config/database.php';

if (isset($_GET['persgoal_id'])) :
    $persgoal = $_GET['persgoal_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82664ff85a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Hind&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/personalgoal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Your goal info</title>
</head>
<body>
    <header>
        <nav class="nav">
            <img class="nav-img" src="images/bitwhite.png" alt="bit-logo">

            <ul class="nav-link">
                <li><a href="personalgoal.php"><i class="fas fa-child"></i> Personal Goals</a></li>
                <li><a href="index.php"><i class="fas fa-bars"></i> Home</a></li>
            </ul>
        </nav>
    </header>

    <?php
    $stmt = $pdo->prepare('SELECT * FROM PersonalGoals WHERE persgoal_id = ?');
    $stmt->execute([$persgoal]);
    $info = $stmt->fetch();

    $stmt = $pdo->prepare('SELECT * FROM PersonalComment WHERE persgoal_id = ?');
    $stmt->execute([$persgoal]);
    $comments = $stmt->fetchAll();
    ?>

    <main>
    <?php if ($info) : ?>
        <div class="maincenter">
            <div class="maintitle">
                <h1><?= $info['goal'] ?></h1>
            </div>
            <div class="maininfo">
                <p><?= $info['goaltext'] ?></p>
            </div>
            <div class="maindate">
                <p> Start on: <?= $info['startdate'] ?><p>
                <p style="color:red;"> End on: <?= $info['enddate'] ?><p>
            </div>
            <div class="maincomment">
                <?php if ($comments) : foreach ($comments as $comment) : ?>
                    <div class="comment">
                        <p><?= $comment['commenttext'] ?></p>
                        <p><?= $comment['date'] ?></p>
                    </div>
                <?php endforeach; endif; ?>
            </div>
            <div class="mainbuttons">
                <form action="Personalgoalinfo.php?persgoal_id=<?= $persgoal ?>" method="post"><button type="submit" value="<?= $persgoal ?>" name="delete" style="background:#D91417;">Delete goal</button></form>
                <button id="myBtn" style="background:#747AEA;">Comment</button>
                <form action="Personalgoalinfo.php?persgoal_id=<?= $persgoal ?>" method="post"><button type="submit" value="<?= $persgoal ?>" name="finish" style="background:#1EA02D;">Finish goal</button></form>
            </div>
        </div>
    <?php endif ?>

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
            <div class="maininput">
                <form class="mainform" action="Personalgoalinfo.php?persgoal_id=<?= $persgoal ?>" method="post">
                    <h1>Comment on your goal</h1>
                    <input type="text" id="goal" name="comment" placeholder="Comment.." maxlength="100" required>
                    <button type="submit" value="<?= $persgoal ?>" name='createComment'>Create comment</button>
                </form>
            </div>
      </div>
    </div>

    </main>

    <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    </script>
</body>

<?php
else :
    header("Location:personalgoal.php");
    exit;
endif;
?>
