<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="css/retro.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script   type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"   integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="   crossorigin="anonymous"></script>
        <!-- <script type="text/javascript" src="js/script.js"></script> -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
         <!-- <link rel="stylesheet" href="/r"> -->
         <link href="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
  </head>
  <body id="retro_style body_save">
    <header>
        <nav class="nav">
            <img class="nav-img" src="images/bitwhite.png" alt="bit-logo">

            <ul class="nav-link">
              <li><a href="boards.php">Boards</a> </li>
                <li><span><i class="fas fa-user"></i> <?= $_SESSION['user'] ?? null ?></span></li>
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
    <div class="retro_title">
      <h1 id="placeholder" data-editable>Title</h1>
    </div>
    <main id="main">
  <!-- <div class="modal fade" tabindex="-1" role="dialog" id="modal_dialog" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create Item</h4>
      </div>
      <div class="modal-body">
        <p>Title</p>
        <input type="text" name="subject" value="" id="li_val"placeholder="subject....">
        <!-- <p>Assign</p> -->
      <!-- </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
        <button type="button" id="send" class="btn btn-primary create_item save">Save changes</button>
      </div>
    </div>
  </div>
</div>

      <div class="modal_li fade" tabindex="-1" role="dialog" id="modal_update" style="display:none">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Li</h4>
          </div>
          <div class="modal-body">
            <input type="text" name="subject" value="" id="update_val"placeholder="subject....">
            <p>Assign</p>
            <ul>
              <li>Members</li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
            <button type="button"  class="btn btn-primary create_item update">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->

      <div class="containment">
        <div class="container_card" id="cardcount1">
          <div id="title">
            <form class="card_title"  autocomplete="off" action="index.html" method="post">
              <input type="text" autocomplete="off" placeholder="text here" id="inputText">
              <!-- <input type="text" name="" value="" class="gh"> -->

            </form>
            <div class="btn-group dropright">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ...
            </button>
            <div class="dropdown-menu">
              <!-- Dropdown menu links -->
              defgrvhb
            </div>
          </div>
            </div>
            <ul id="sortable1" class="sortable connectedSortable"></ul>
              <div class="handlers">
                <button type="button"  id="addItem" name="button">+ Add new Card</button>
              </div>
        </div>


      </div>
      <div class="add_Column">
      <button type="button" name="button" id="column">+</button>
      </div>
      <!-- <div id="mySelector"> -->

      </div>
    </main>
    <script type="text/javascript" src="js/script.js">



    </script>
  </body>
</html>
