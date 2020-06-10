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
    <title>Welcome on Bit-Feed!</title>
</head>

<body>
    <header>
        <nav class="nav">
            <img class="nav-img" src="images/bitwhite.png" alt="bit-logo">

            <ul class="nav-link">
                <li><span><i class="fas fa-user"></i> <?= $_SESSION['user'] ?></span></li>
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
            $stmt = $pdo->prepare('SELECT * FROM Goals WHERE email = ? OR groupPerson1 = ? OR groupPerson2 = ? OR groupPerson3 = ? OR groupPerson4 = ?');
            $stmt->execute([$_SESSION['userEmail'],$_SESSION['userEmail'],$_SESSION['userEmail'],$_SESSION['userEmail'],$_SESSION['userEmail']]);
            $data = $stmt->fetchAll();

            if ($data) : ?>
                <?php foreach ($data as $goal) : ?>
                    <div class="goal-box">
                        <a href='retroboard.php?link=<?= $goal['goal_id'] ?>'>
                            <p><?= $goal['goal'] ?></p>
                            <span><?= $goal['type'] ?></span>
                            <p><?= $goal['date'] ?></p>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php else : ?>
                <h1> Je hebt nog geen goals..<br> Maak er nu eentje aan!</h1>
            <?php endif; ?>
        </div>

        <div class="right-container">
            <button id="myBtn">Add a goal</button>
            <button id="theBtn">Delete a goal</button>
            <div class='help-text'>
            <p>How to use:</p>
            <ul>
                <li>You can create an goal which you like to achieve.</li>
                <li>Click on your goal to see your retroboard.</li>
                <li>You can delete your goal if completed.</li>
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

                    <label class="public-hover" for="">Public view <span><i class="far fa-question-circle"></i></span></label>
                    <div class="public-text"><span>This option will show your goal on the Goals page for other users.</span></div>

                    <div class="radio-input">
                    <input type="radio" id="Yes" name="publicView" value="Yes" checked="checked">
                    <label class="radio-lbl" for="Yes">Yes</label>
                    </div>

                    <div class="radio-input">
                    <input type="radio" id="No" name="publicView" value="No">
                    <label class="radio-lbl" for="No">No</label>
                    </div>

                    <label class="public-hover" for="">Type of goal <span><i class="far fa-question-circle"></i></span></label>
                    <div class="public-text"><span>A personal goal is for you alone, a group goal can reach up to 5 people.</span></div>

                    <div class="radio-input">
                    <input type="radio" id="Personal" name="typeGoal" value="Personal" checked="checked" onclick='openInputs()'>
                    <label class="radio-lbl" for="Personal">Personal goal</label>
                    </div>

                    <div class="radio-input">
                    <input type="radio" id="Group" name="typeGoal" value="Group" onclick='openInputs()'>
                    <label class="radio-lbl" for="Group">Group goal</label>
                    </div>

                    <div class='radio-input'>
                    <input type="email" id="GroupInput1" name="groupPerson1" placeholder="Email of Person 1.." maxlength="35">
                    <input type="email" id="GroupInput2" name="groupPerson2" placeholder="Email of Person 2.." maxlength="35">
                    </div>
                    
                    <div class='radio-input'>
                        <input type="email" id="GroupInput3" name="groupPerson3" placeholder="Email of Person 3.." maxlength="35">
                        <input type="email" id="GroupInput4" name="groupPerson4" placeholder="Email of Person 4.." maxlength="35">
                    </div>
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
                                  <th>Type of goal</th>
                                  <th>End date</th>
                                  <th>Tool</th>
                                </tr>
                                    <?php foreach ($data as $goal) : ?>
                                        <tr>
                                            <td><p><?= $goal['goal'] ?></p></td>
                                            <td><p><?= $goal['type'] ?></p></td>
                                            <td><p><?= $goal['date'] ?></p></td>
                                            <td>
                                                <p>
                                                    <form action="goal.php" method="post">
                                                        <button type="submit" name='deleteGoal' value="<?= $goal['id'] ?>"><i class="fas fa-times"></i> Delete</button>
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

        function openInputs() {
          var groupBox = document.getElementById("Group");
          var personalBox = document.getElementById("Personal");
          var input1 = document.getElementById("GroupInput1");
          var input2 = document.getElementById("GroupInput2");
          var input3 = document.getElementById("GroupInput3");
          var input4 = document.getElementById("GroupInput4");

          if (groupBox.checked == true) {
            input1.style.display = "block";
            input2.style.display = "block";
            input3.style.display = "block";
            input4.style.display = "block";
          }

          if (personalBox.checked == true) {
            input1.style.display = "none";
            input2.style.display = "none";
            input3.style.display = "none";
            input4.style.display = "none";
          }
        }
    </script>
</body>
</html>
