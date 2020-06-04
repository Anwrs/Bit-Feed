<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82664ff85a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Hind&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login page</title>
</head>

<body>
    <div class="wrap">
        <div class="logo">
            <img src="images/bitwhite.png" alt="bit-logo">
            <div class="link">
                <span><a href="index.php"><i class="fas fa-bars"></i> Home</a></span>
                <span><a href="login.php"><i class="far fa-comments"></i>  Contact</a></span>
            </div>
        </div>

        <div class="container">
            <div class="left-side-container">
                <div class="title">
                    <h1>Log in to your account..</h1>
                </div>

                <div class="field">
                    <form class="field-form" action="login.php" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email..">

                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password..">

                        <button type="submit">Log in</button>

                        <p>You don't have an <span style='color: #9946b3'>account?</span></p>
                        <a href="register.php">Register here</a>
                    </form>
                </div>
            </div>

            <div class="right-side-container">

                <img src="images/login.png" alt="target-girl">
            </div>
        </div>
    </div>
</body>

</html>
