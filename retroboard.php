<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="css/retro.css">
        <script type="text/javascript" src="js/script.js"></script>
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
         <link rel="stylesheet" href="/resources/demos/style.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <script   src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"   integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="   crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
    <header>
        <nav class="nav">
            <img class="nav-img" src="images/bitwhite.png" alt="bit-logo">

            <ul class="nav-link">
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
  <div class="modal fade" tabindex="-1" role="dialog" id="modal_dialog" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create Item</h4>
      </div>
      <div class="modal-body">
        <p>Title</p>
        <input type="text" name="subject" value="" id="li_val"placeholder="subject....">
        <!-- <p>Assign</p> -->
      </div>
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
    </div>

      <div class="containment">
        <div class="container">
          <div id="title">
            <h3 class="editable" id="textq" datatitle-editable>Title</h3>
            <div class="handlers">
              <button type="button"  id="addItem" name="button">+</button>
              <button type="button"  id="deleteItem" name="button">x</button>
            </div>
            </div>
            <ul   id="sortable" class="connectedSortable">
        </div>
      </div>
      <div class="add_Column">
      <button type="button" name="button" id="column">+</button>
      </div>

    </main>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
