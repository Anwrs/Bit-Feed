<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/doelen.css">
    <title>Goals Example Page</title>
  </head>
  <body>

    <?php echo '
      <header id="header">
        <h1>BitFeed</h1>
        <img src="images/logo/Logo.png">
      </header>

      <main>
        <div id="container">
          <div class="sidebar_left">
            <div id="button_styles">
              <h3>Home</h3>
            </div>
            <h3>Goals</h3>
          </div>'
      ?>

      <?php

        $username="placeholder";
        $a = 1;
        $boxCount = 6;
        $goalTxt= 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,';
        $goalCount= 2;
        $goal = "<li class='box_shadow'>$goalTxt</li>";
        $goalRepeat = str_repeat($goal, $goalCount);
        $text = '<div class="blok  standard_layout">
          <h3 class="box_shadow">Progress '. $username .'</h3>
          <ul>'.$goalRepeat.'
          </ul>
        </div>';
        ?>
          <div class="content">
        <?php
       while ( $a <= $boxCount) {
         $a++;
          echo $text;
        }


      ?>
      </div>
    </div>
      </main>

      <footer id="footer">
        <?php echo '
        <h3>Made by YourFeedbackTool - Team 2020</h3>'
        ?>
      </footer>

  </body>
</html>
