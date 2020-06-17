<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/82664ff85a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Hind&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
    <title>contact page</title>
</head>

<body>
    <div class="wrap">
        <div class="logo">
            <img src="images/bitwhite.png" alt="bit-logo">
            <div class="link">
                <span><a href="index.php"><i class="fas fa-bars"></i> Home</a></span>
                <span><a href="login.php"><i class="far fa-comments"></i> Login</a></span>
            </div>
        </div>

        <div class="container">
            <div class="left-side-container">
                <div class="title">
                    <h1>Send us a Message</h1>
                </div>


                <div class="field-form">
                    <form action="https://formspree.io/bittool.us@gmail.com" method="POST" onsubmit="return checkform(this)">
                        <input type="text" name="name" placeholder="name" required >
                        <input type="email" name="_replyto" placeholder="email" required >
                        <input type="text" name="_subject" placeholder="subject" required >
                        <textarea name="_message" rows="8" cols="80" placeholder="..message" required ></textarea>
                        <input type="submit" value="Send" id="send">
                    </form>
                </div>
            </div>


            <div class="right-side-container">
              <img src="images/login.png" alt="target-girl">
                  <h1>Contact Information</h1>
                  <h3>Email:</h3>
                  <p>Bittool.us@gmail.com</p>
                  <h3>Telephone:</h3>
                  <p>06 12345678</p>
            </div>
        </div>
    </div>
</body>

</html>
