<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="css/retro.css" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <link href="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <script type="text/javascript" src="js/script.js"></script>
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
$projectName = "project";
$library = new library();
$contents = $library->getAllTblContents();
 ?>


    <div class="retro_title">
      <input type="text" name="" value="" placeholder="text" id="placeholder">
    </div>

    <div class="box">
      <div class="box_content">
        <div class="box_header">
          <h2>New Column</h2>
        </div>
        <div class="box_body">
          <h4>Title</h4>
            <input type="text" name="Subject" value="" id="textVal" placeholder="text...." required>
        </div>
        <div class="box_footer">
          <button type="button" id="send" class="btn btn-primary create_item save">Save changes</button>
          <button type="button" class="closed"  id="deleteItem">Close</button>
        </div>
      </div>
    </div>

    <!-- <div class="box fade" id="box_dialog">
      <div class="box-dialog">
        <div class="box-content">
          <div class="box-header">
            <h4 class="box-title">Create New Item</h4>
            </div>
            <div class="box-body">
              <p>Title</p>
              <input type="text" name="Subject" value="" id="li_val" placeholder="text....">
            </div>
            <div class="box-footer">
              <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
              <button type="button" id="send" class="btn btn-primary create_item save">Save changes</button>
            </div>
          </div>

        </div>

      </div> -->
    <!-- </div> -->
    <main id="main">
<!--
          <div class="modal fade" tabindex="-1" role="dialog" id="modal_dialog">
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
          </div> -->

      <div class="retro-board">

        <?php
        if(!empty($contents)){
        foreach ($contents as $statusRow) {
          $taskResult = $library->InsertColumnIdAndContent(intval($statusRow["container_id"]),$projectName);
          var_dump(sizeof($contents));

         ?>
        <div class="card-container">
          <div class="card-header">
            <span class="card-header-text"><?php echo $statusRow['container_name']; ?> </span>
          </div>
          <ul class="sortable ui-sortable"
            id="sort<?php echo $statusRow['container_id']; ?>"
            data-status-id="<?php echo $statusRow['container_id']; ?>">
        <?php
        if(! empty($taskResult)){
            foreach($taskResult as $taskRow) {
         ?>
             <li class="text-row ui-sortable-handle"
             data-task-id="<?php echo $taskRow['id']; ?>"><?php echo $taskRow['title']; ?></li>
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

    <script type="text/javascript" >

    $(document).ready(function(){
    $( function() {
        var url = 'edit-status.php';
        $('ul[id^="sort"]').sortable({
            connectWith: ".sortable",
            receive: function (e, ui) {
                var status_id = $(ui.item).parent(".sortable").data("status-id");
                var task_id = $(ui.item).data("task-id");
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {status_id: status_id, task_id: task_id},
                    success: function(response){
                        }
                });
                }

        }).disableSelection();
        } );

        // $('#column').click(function(){
        //
        //   // $.post('update-status.php',value: value, function(data)
        //   // {
        //   //     alert(successfully)
        //   // });
        //
        // });

        $(document).on("click","#column",function(){
          alert("actiiiooon");
          var url ="update-status.php";
          var value = $('#textVal').val();
          var id = <?= sizeof($contents)+1?>;
          alert(id);
          console.log(value);
          alert(value);
         //  $.post('update-status.php',value: value, function(data)
         // //   // {
         //       alert(successfully)
         //   });
         $.ajax({
             type: "POST",
             url: url,
             data: {value: value, id:id},
             success: function(response){
               alert(response);
                 }
         });

        });


          $(document).on("click",".closed",function (){
              $('.box').css('display','none');
              // $('.modal_li').css('display','none');

          });

          $(document).on("click","#send",function (){
                // $('.modal_li').css('display','none');
                $('.box').css('display','none');
          });


          });
     </script>
  </body>
</html>
