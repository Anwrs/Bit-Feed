<?php
include 'config/register/register_handler.php';
session_start();

?>

<?php
if (isset($_POST['Mode'])) {
    $mode = $_POST['changeMode'];
    if ($mode === 'Light') {
        $_SESSION['ColorMode'] = "Light";
    } else {
        $_SESSION['ColorMode'] = "Dark";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82664ff85a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <title>Register page</title>
</head>

<style>
    <?php if ($_SESSION['ColorMode'] === "Light") : ?>
        .register-wrap {
            background: rgb(70,74,73);
            background: linear-gradient(289deg, rgba(70,74,73,1) 0%, rgba(255,255,255,1) 19%, rgba(255,255,255,1) 74%, rgba(144,236,219,1) 100%);
        }
        .register-box {
        border-color: #000000;
        background-color: #f3f3f3;
        }
        .title span {
            color: #000000;
        }
        .title .icons {
            color: #1a1a1a;
        }
        .input input {
            color: #000000;
            border-color: #cecece;
        }
        .input span {
            color: #000000;
        }
        .input input:hover {
            border-color: #0d7377;
        }
        .input input:focus {
            border-color: #000000;
        }
        .submit button {
            border-color: #000000;
            color: #000000;
            background-color: #cecece;
        }
        .submit button:hover {
            background-color: #a3a3a3;
        }
        .errors-box {
            background-color: #eeadad;
            border-color: #000000;
        }
        .errors-box li {
            color: #000000;
        }
    <?php endif; ?>
</style>

<body>
    <div class="register-wrap">
    <div class="darkbutton">
        <form action="register.php" method="post">
            <input type="radio" name="changeMode" value="Dark" value id="Dark">
            <label for="Dark">Dark Mode</label>
            <input type="radio" name="changeMode" value="Light" id="Light">
            <label for="Light">Light Mode</label>
            <button type="submit" name="Mode">Change Mode</button>
        </form>
</div>
        <img id="image-svg" src="images/logo/logo.png" alt="logo">

        <?php 
            include 'config/register/register_errors.php'; 
        ?>

        <form class="register-box" action='register.php' method='post'>
            <div class="title">
                <span>Register <span class="icons"><i class="fas fa-user-plus"></span></i></span>
            </div>
            <div class="input">
                <span>Name</span>
                <input type="text" name="name" id="" placeholder="Your name">
            </div>
            <div class="input">
                <span>Email</span>
                <input type="email" name="email" id="" placeholder="Your email">
            </div>
            <div class="input">
                <span>Password</span>
                <input type="password" name="password" id="" placeholder="Your password">
            </div>
            <div class="input">
                <span>Verify Password</span>
                <input type="password" name="password2" id="" placeholder="Verify your password">
            </div>
            <div class="submit">
                <button type="submit" name="submit">Create account</button>
            </div>
        </form>
        <img class="group-img" src="images/people.png" alt="group">
        <div class="opac-text">
            <span>With the right mindset and hard work,<br> You can reach all of your goals.</span>
        </div>
    </div>

</body>
</html>