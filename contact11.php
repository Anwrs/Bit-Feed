<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact us</title>
    <link rel="stylesheet" href="contact.css">
        <script src="https://kit.fontawesome.com/82664ff85a.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>

    <div class="wrap">
      <div class="logo">
          <img src="images/bitwhite.png" alt="bit-logo">
          <div class="link">
              <span><a href="index.php"><i class="fas fa-bars"></i> Home</a></span>
              <span><a href="login.php"><i class="far fa-bookmark"></i>  Login</a></span>
          </div>
      </div>
    </div>

    <div class="wrapper">
      <div class="container">
          <div class="c_left">
            <h2>Send us a Message</h2>
            <?php
            $error ="";
            if(isset($_GET['error'])){
                $error = "please fill in the blanks";
                echo'<div class="alert alert-danger">'.$error.'</div>';
            }
            if(isset($_GET['succes'])){
              $error = "Your message was sent";
              echo'<div class="alert alert-succes">'.$error.'</div>';
            }

            if(isset($_GET['notsent'])){
              $error = "Your message was not sent";
              echo'<div class="alert alert-danger">'.$error.'</div>';
            }

            ?>
            <div class="field">
                  <!-- <form action="process.php" method="POST">
                    <input type="text" name="username" placeholder="username" class="form-contrl mb-2">
                    <input type="email" name="email" placeholder="email" class="form-contrl mb-2">
                    <input type="text" name="subject" placeholder="subject" class="form-contrl mb-2">
                    <textarea name="msg" class="form-control" placeholder="Write Message"rows="8" cols="80"></textarea>
                    <button type="submit" class="btn btn-succes" name="btn-send"id="btn_send">Send</button>
                  </form> -->
                    <form action="https://formspree.io/bittool.us@gmail.com" method="POST">
                    <input type="text" name="name" placeholder="name">
                    <input type="email" name="_replyto" placeholder="email">
                    <input type="text" name="_subject" placeholder="subject">
                    <textarea name="_message" rows="8" cols="80" placeholder="..message"></textarea>

                    <input type="submit" value="Send">
                  </form
              </div>
          </div>

          <div class="c_right">
            <h1>Contact Information</h1>
            <h3>Email:</h3>
            <p>Bit-Feed@gmail.com</p>
            <h3>Telephone:</h3>
            <p>06 12345678</p>

            <div class="socials">
              <i class="fab fa-twitter"></i>
              <i class="fab fa-linkedin-in"></i>
              <i class="fab fa-instagram"></i>
            </div>
          </div>
        </div>
    </div>

  </body>
</html>

<div class="alert alert-danger">
</div>
