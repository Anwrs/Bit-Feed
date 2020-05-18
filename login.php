<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82664ff85a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login page</title>
</head>

<body>
<section id='topleft-svg'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 224.5 225"><defs><style>.cls-1{fill:#fff;}</style></defs><g id="leftcloud" data-name="Laag 2"><g id="Laag_1-2" data-name="Laag 1"><path class="cls-1" d="M0,0V225A120,120,0,0,0,119.11,119.61,120,120,0,0,0,224.5.5"/></g></g></svg></section>
<img id="image-svg" src="images/logo/logo.png" alt="logo">
<section id='bottomleft-svg'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 359.51 242.06"><defs><style>.cls-1{fill:#fff;stroke:#000;stroke-miterlimit:10;}</style></defs><g id="Laag_2" data-name="Laag 2"><g id="Laag_1-2" data-name="Laag 1"><path id="Cloud" class="cls-1" d="M203.19,5.82A120.45,120.45,0,0,0,169.36,22.3a111.46,111.46,0,1,0-4.73,194A120.5,120.5,0,1,0,203.19,5.82Z"/></g></g></svg></section>
<div class="login-wrap">
    <form class="login-box" action='#' method='post'>
        <div class="title">
            <span>Login here <i class="fas fa-user-plus"></i></span>
        </div>
        <div class="input">
            <span>Email</span>
            <input type="email" name="name" id="" placeholder="Your email">
        </div>
        <div class="input">
            <span>Password</span>
            <input type="password" name="name" id="" placeholder="Your password">
        </div>
        <div class="submit">
            <button type="submit"><a href="beginpag.php">Login</a></button>
        </div>
        <div class="register-link">
            <span>Not yet registered click here</span>
            <button type="submit"><a href="register.php">Register</a></button>
        </div>
    </form>
</div>
</body>
</html>