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

            <div class="field">

                <form class="field-form" action="login.php" method="post">

                  <div class="info_user">
                    <div class="info">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" placeholder="Email..">

                    </div>

                  <div class="info">
                    <label for="name"> Your Name</label>
                    <input type="name" name="name" placeholder="name..">

                  </div>

                  </div>

                  <div class="message">
                    <label for="subject">Subject</label>
                    <div class="msg_block">
                      <textarea id="subject" name="subject" placeholder="Write something.."></textarea>
                      <div class="btn_send">
                        <button type="button" class="btn btn-info"><i class="fas fa-paper-plane"></i></button>
                      </div>
                    </div>
                  </div>
                  <!-- <button id="btn_send" type="submit">Send</button> -->


                </form>
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
