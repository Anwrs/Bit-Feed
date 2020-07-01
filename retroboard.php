<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="css/retro.css" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- <script type="text/javascript" src="js/script.js"></script> -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <!-- <link rel="stylesheet" href="/r"> -->
         <link href="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
  </head>
  <style>
  .card-container> div.newItem{
    padding: 0px;
    height: 30px;
    bottom: 0;
    background-color: red;
    display: inline-block;
    width: 100%;
  }
  </style>
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


<?php
require_once "connection.php";
$projectName = "Project";
$library = new library();
$contents = $library->getAllTblContents();
var_dump($contents);
 ?>


    <div class="retro_title">
      <input type="text" name="" value="" placeholder="text" id="placeholder">
    </div>
    <main id="main">


      <div class="retro-board">
        <?php
        if(!empty($contents)){
        foreach ($contents as $statusRow) {
          $taskResult = $library->InsertColumnIdAndContent(intval($statusRow["container_id"]),$projectName);
          // $liUpdate = $library->setItemToContainerId(intval($statusRow["container_id"]));
         ?>
        <div class="card-container">
          <div class="card-header">
            <span class="card-header-text"><?php echo $statusRow['container_name'] ?> </span>
          </div>
          <ul class="sortable ui-sortable"
            id="sort<?php echo $statusRow['container_id']  ?>"
            data-status-id=" <?php echo $statusRow['container_id'] ?>">
        <?php
        if(! empty($taskResult)){
            foreach($taskResult as $taskRow) {
         ?>
             <li class="text-row ui-sortable-handle"
             data-task-id=" <?php echo $taskRow['items_id'] ?>"><?php echo $taskRow['title'] ?></li>

           <?php
              }
         }
            ?>
            </ul>
          <div class="newItem">
            <button type="button"  id="addItem" name="button">+ Add new Card</button>
          </div>

        </div>
        <?php
      }
    }
      ?>


      </div>
      <div class="add_Column">
      <button type="button" name="button" id="column">+</button>
      </div>


      </div>
    </main>
    <script type="text/javascript" src="script.js">
    // </script>
  </body>
</html>
