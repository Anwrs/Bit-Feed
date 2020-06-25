<?php
session_start();
// if (isset($_SESSION['user'])) {} else {
//     header("Location:login.php");
//     exit;
// }
//
// include 'config/goal/goal_handler.php';
// include 'config/database.php';
// ?>

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
                <li><span><i class="fas fa-user"></i> <?= $_SESSION['user'] ?? null ?></span></li>
                <li><a href="index.php"><i class="fas fa-bars"></i> Home</a></li>

                <?php
                $stmt = $pdo->prepare('SELECT * FROM Goalsinvite WHERE goaluser = ? AND checked = ?');
                $stmt->execute([$_SESSION['userEmail'], "NO"]);
                $countinvites = $stmt->rowCount();
                $invites = $stmt->fetchAll();
                ?>

                <li>
                    <div class="dropdown">
                        <button class="dropbtn"><?php if ($countinvites) { echo "( ". $countinvites . " ) "; } else { echo "No "; } ?>Messages</button>
                        <div class="dropdown-content">
                            <?php
                            $stmt = $pdo->prepare('SELECT * FROM Goalsinvite WHERE goaluser = ? AND checked = ?');
                            $stmt->execute([$_SESSION['userEmail'], "NO"]);
                            $invites = $stmt->fetchAll();

                            foreach ($invites as $message) : ?>
                            <a href="#">
                                <form id="message" action="goal.php" method="post">
                                    <p> Invite from <?= $message['creator'] ?><br>Goal: <?= $message['goal'] ?></p>
                                    <button type="submit" name='acceptMessage' value="<?= $message['goal_id'] ?>">Accept</button>
                                    <button type="submit" name='declineMessage' value="<?= $message['goal_id'] ?>">Decline</button>
                                </form>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
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
            $stmt = $pdo->prepare('SELECT * FROM Goals WHERE email = ?');
            $stmt->execute([$_SESSION['userEmail']]);
            $data = $stmt->fetchAll();

            if ($data) : ?>
                <?php foreach ($data as $goal) : ?>
                    <div class="goal-box">
                        <a href='retroboard.php?link=<?= $goal['goal_id'] ?>'>
                            <p><?= $goal['goal'] ?></p>
                            <p><?= $goal['date'] ?></p>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endif; ?>

            <?php
            $stmt = $pdo->prepare('SELECT * FROM Goalsinvite WHERE goaluser = ? AND checked = ?');
            $stmt->execute([$_SESSION['userEmail'], "YES"]);
            $invites = $stmt->fetchAll();

            if ($invites) : ?>
                <?php foreach ($invites as $goal) : ?>
                    <div class="goal-box">
                        <a href='retroboard.php?link=<?= $goal['goal_id'] ?>'>
                            <p><?= $goal['goal'] ?></p>
                            <p style="font-size: 14px;">Created by: <?= $goal['creator'] ?></p>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endif; ?>
        </div>

        <div class="right-container">
            <button id="myBtn">Add a goal</button>
            <button id="theBtn">Delete a goal</button>
            <div class='help-text'>
            <p>How to use:</p>
            <ul>
                <li>Achieve your goals</li>
                <li>Every goal has an retroboard</li>
                <li style="color:<?php if ($full == true){ echo 'red'; } ?>">You can only have 20 goals for now.</li>
            </ul>

        </div>


            <div id="myModal" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <form class="field-form" action="goal.php" method="post">
                    <h1>Add a new goal</h1>
                    <label for="goal">Your goal</label>
                    <input type="text" id="goal" name="goal" placeholder="Goal.." maxlength="55" required>

                    <label for="goal">When does your goal end?</label>
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

            <div id="theModal" class="modal">
              <div class="modal-content">
                <span class="theclose">&times;</span>
                <form class="field-form" action="goal.php" method="post">
                    <h1>Delete a goal</h1>
                    <?php if ($data) : ?>
                        <div style="overflow-y:auto;">
                            <table>
                                <tr>
                                  <th>Goal</th>
                                  <th>End date</th>
                                  <th>Tool</th>
                                </tr>
                                    <?php foreach ($data as $goal) : ?>
                                        <tr>
                                            <td><p><?= $goal['goal'] ?></p></td>
                                            <td><p><?= $goal['date'] ?></p></td>
                                            <td>
                                                <p>
                                                    <form action="goal.php" method="post">
                                                        <button type="submit" name='deleteGoal' value="<?= $goal['goal_id'] ?>"><i class="fas fa-times"></i> Delete</button>
                                                    </form>
                                                </p>
                                            </td>
                                        </tr>
                                <?php endforeach;?>
                            </table>
                        </div>
                    <?php else : ?>
                        <h1> Je hebt nog geen goals..<br> Dan kan je ook niks verwijderen.</h1>
                    <?php endif; ?>
                </form>
              </div>
            </div>
        </div>

    </main>
    <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    var themodal = document.getElementById("theModal");
    var thebtn = document.getElementById("theBtn");
    var thespan = document.getElementsByClassName("theclose")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }
    thebtn.onclick = function() {
        themodal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }
    thespan.onclick = function() {
        themodal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == themodal) {
            themodal.style.display = "none";
        }
    }

    </script>
</body>
</html>
