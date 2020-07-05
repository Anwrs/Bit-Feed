<?php
include 'config/register/register_handler.php';

if (isset($_SESSION['user'])) {
    header("Location:goal.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82664ff85a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Hind&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <title>Register page</title>
</head>

<body>
    <div class="wrap">
        <div class="logo">
            <img src="images/bitwhite.png" alt="bit-logo">
            <div class="link">
                <span><a href="index.php"><i class="fas fa-bars"></i> Home</a></span>
                <span><a href="login.php"><i class="far fa-bookmark"></i> Login</a></span>
            </div>
        </div>

        <div class="container">
            <div class="left-side-container">
                <div class="title">
                    <h1>Create an account..</h1>
                </div>

                <div class="field">
                    <form class="field-form" action="register.php" method="post">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name..">

                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email..">

                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password..">

                        <label for="password2">Repeat password</label>
                        <input type="password" name="password2" placeholder="Repeat password..">

                        <button type="submit" name='submit'>Create account</button>
                    </form>
                </div>
            </div>

            <div class="right-side-container">
                <?php if (count($errors) > 0) : ?>
                    <div class="error-box">
                        <img src="images/error.png" alt="error">
                        <?php foreach ($errors as $error) : ?>
                            <ul>
                                <li><?= $error ?></li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <img src="images/target.png" alt="target-girl">
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
