<?php
session_start();
if (isset($_SESSION['user'])) {} else {
    header("Location:login.php");
    exit;
}

include 'config/goal/goal_handler.php';
include 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82664ff85a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Hind&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/goal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Goal Page</title>
</head>

<body>
    <header>
        <nav class="nav">
            <img class="nav-img" src="images/bitwhite.png" alt="bit-logo">

            <ul class="nav-link">
                <li><span><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></span></li>
                <li><a href="goal.php"><i class="far fa-handshake"></i> Sprint Goals</a></li>
                <li><a href="index.php"><i class="fas fa-bars"></i> Home</a></li>

                <li>
                    <a href="#">
                        <form id="logout" action="goal.php" method="post">
                            <button type="submit" name='logout'><i class="far fa-bookmark"></i> Log out</button>
                        </form>
                    </a>
                </li>


            </ul>
        </nav>
    </header>

    <main>
        <div class="box-container">
            <?php
            $stmt = $pdo->prepare('SELECT * FROM PersonalGoals WHERE email = ?');
            $stmt->execute([$_SESSION['userEmail']]);
            $data = $stmt->fetchAll();

            if ($data) : ?>
                <?php foreach ($data as $goal) : ?>
                    <div class="goal-box" <?php if ($goal['complete'] == "YES") : ?> style="background:#16BA4B;" <?php endif; ?>>
                        <a href="Personalgoalinfo.php?persgoal_id=<?= $goal['persgoal_id'] ?>">
                            <p><?= $goal['goal'] ?></p>
                            <p>Start date: <?= $goal['startdate'] ?></p>
                            <p style="color: red;">End date: <?= $goal['enddate'] ?></p>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endif; ?>
        </div>

        <div class="right-container">
             <div class="dropdown1">
              <button class="dropbtn1">Add your goal</button>
              <div class="dropdown-content1">
                      <div class="order">
                          <button id="myBtn">Sprint Goal</button>
                          <button id="perBtn">Personal Goal</button>
                      </div>
              </div>
            </div>
            <div class='help-text'>
            <p>How to use:</p>
            <ul>
                <li>Every goal has an retroboard</li>
                <li>An Personal goal is for you</li>
                <li>An Sprint Goal is for meetings</li>
            </ul>

        </div>

        <div id="perModal" class="modal">
          <div class="modal-content">
            <span class="perclose">&times;</span>
            <form class="field-form" action="goal.php" method="post">
                <h1>Add a new Personal goal</h1>
                <label for="goal">Your goal</label>
                <input type="text" id="goal" name="pergoal" placeholder="Goal.." maxlength="55" required>

                <label for="goal">When does your goal start?</label>
                <input type="date" id="goal" name="startperdate" required>

                <label for="goal">When does your goal end?</label>
                <input type="date" id="goal" name="endperdate" required>

                <label for="goal">How do you want to achief your goal?</label>
                <input type="text" id="goal" name="pergoaltext" placeholder="By .." maxlength="70" required>

                <button type="submit" name='createPergoal'>Create your goal</button>
            </form>
          </div>
        </div>


            <div id="myModal" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <form class="field-form" action="goal.php" method="post">
                    <h1>Add a new Sprint goal</h1>
                    <label for="goal">Your sprint name?</label>
                    <input type="text" id="goal" name="goal" placeholder="Goal.." maxlength="55" required>

                    <label for="goal">When is your sprint?</label>
                    <input type="date" id="goal" name="date" required>

                    <label for='sel'>Choose your user's <span style="color:red; font-size: 17px;">hold Ctrl to select multiple</span></label>
                    <select id='sel' type='text' multiple class="sel" name='inviteUsers[]'>
                        <?php
                        $stmt = $pdo->query("SELECT email FROM Users");
                        while ($chosenUser = $stmt->fetch()) : ?>
                            <option value='<?= $chosenUser['email'] ?>'><?= $chosenUser['email'] ?></option>
                        <?php endwhile; ?>
                    </select>

                    <button type="submit" name='createGoal'>Create your goal</button>
                </form>
              </div>
            </div>
        </div>

    </main>
    <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    var permodal = document.getElementById("perModal");
    var perbtn = document.getElementById("perBtn");
    var perspan = document.getElementsByClassName("perclose")[0];


    btn.onclick = function() {
        modal.style.display = "block";
    }
    perbtn.onclick = function() {
        permodal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }
    perspan.onclikc - function() {
        permodal.style.display = "none";
    }


    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == permodal) {
            permodal.style.display = "none";
        }
    }

    </script>
</body>
</html>
