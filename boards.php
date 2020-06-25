<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Boards</title>
        <link rel="stylesheet" href="css/board.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/retrospective.js"></script>
  </head>
  <body>
    <header>
      <nav class="nav">
          <img class="nav-img" src="images/bitwhite.png" alt="bit-logo">

          <ul class="nav-link">
            <li><a href="boards.php">Boards</a> </li>
              <li><span><i class="fas fa-user"></i> <?= $_SESSION['user'] ?? null ?></span>Lol</li>
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



    <main id="main">
        <div class="title">
          <h1>My boards</h1>
        </div>
      <div class="content">
        <div class="card">
            <p>Title</p>
        </div>

      </div>
      <div class="switch" >
          <p id="text">Add new Board</p>
          <div class="showSwitch" id="switch">
            <input type="text" name="" id="board_input"placeholder="Create new board">
            <button type="button" name="button" class="create_board">Create</button>
            <button type="button" name="button" class="cancel_board">Cancel</button>
          </div>
      </div>
    </main>
    <script type="text/javascript">


     $("p#text").click(function(){
       if($( '.showSwitch' ).is(":visible")){
                 $( '.showSwitch' ).hide();
                   $("#text").show();
            } else{
            // $(".cancel_board").click(function(){
                $("#text").hide();
                $( '.showSwitch' ).show();
            // });
            }
    });
       $(".cancel_board").click(function(){
         if($( '.showSwitch' ).is(":visible")){
                   $( '.showSwitch' ).hide();
                     $("#text").show();
              } else{
              // $(".cancel_board").click(function(){
                  $("#text").hide();
                  $( '.showSwitch' ).show();
              // });
              }
            });



    </script>


    <footer>idk if this neccesary</footer>
  </body>
</html>
