<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="css/retro.css" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <link href="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>RetroBoard</title>
  </head>
  <style>
  </style>
  <body id="retro_style body_save">
<?php
include 'config/database.php';
include 'dbfiles/DbManagement.php';
$library = new library();
$projectId = $_GET['link'];
if(isset($projectId)){
  $name = $library->getProjectname(intval($projectId));
} else {
  echo"Not SET";
}
      if(!empty($name)){
      foreach ($name as $new) {
        $projectName= $new['goal'];
        $contents = $library->getAllTblContents($projectId);
        $Items = $library->getAllItems($projectId);
      ?>
    <div class="retro_title">
      <div class="header">
        <h1 class="title_update project-text" id="lblname"><?php echo $projectName ?></h1>
        <div class="links">
          <a href="https://projects.bit-academy.nl/~bit-feed/index.php"><p>Home</p></a>
          <a href="https://projects.bit-academy.nl/~bit-feed/goal.php"><p>Goals</p></a>
        </div>
      </div>
      <div class="getTeam">
        Team
        <?php
        $stmt = $pdo->prepare('SELECT goaluser FROM Goalsinvite WHERE goal_id = ?');
        $stmt->execute([$projectId]);
        $countinvites = $stmt->rowCount();
        $invites = $stmt->fetchAll();
        foreach ($invites as $message) :
          ?>
    | <?= $message['goaluser']?>
        <?php endforeach; ?>
      </div>
    </div>
<?php
  }}
   ?>
    <div class="add-column">
      <div class="box_content">
        <div class="box_header">
          <h2>New Column</h2>
          <div class="">
            <button type="button" class="closed"  id="deleteItem">X</button>
          </div>
        </div>
        <div class="box_body">
            <input type="text" name="Subject" value="" id="textVal" placeholder="text...." required>
        </div>
        <div class="box_footer">
          <button type="button" id="send" class="btn btn-primary create_item save_column">Add Column</button>
        </div>
      </div>
    </div>

    <div class="update-item">
      <div class="box_content">
        <div class="box_header">
          <h2>Update Item</h2>
          <button type="button" class="closed"  id="deleteItem">X</button>
        </div>
        <div class="box_body">
          <textarea name="context" id="context" rows="1" cols="30"></textarea>
        </div>
        <div class="box_footer">
          <button type="button" id="send" class="btn btn-primary create_item save_update_item">Save changes</button>
          <button type="button" class="erase-item" >Delete</button>
        </div>
      </div>
    </div>

    <div class="add-item">
      <div class="box_content">
        <div class="box_header">
          <h2>Add New Card</h2>
        <button type="button" class="closed"  id="deleteItem">X</button>
        </div>
        <div class="box_body">
          <textarea name="context" id="add_context" rows="1" cols="30"></textarea>
        </div>
        <div class="box_footer">
          <button type="button" id="send" class="btn btn-primary create_item save_item">Add Item</button>
        </div>
      </div>
    </div>

    <main id="main">
      <div class="retro-board">
        <?php
        if(!empty($contents)){
        foreach ($contents as $statusRow) :
          $taskResult = $library->InsertColumnIdAndContent(intval($statusRow["container_id"]),$projectId);
        $counts = $statusRow['container_id'];
         ?>
        <div class="card-container" data-status-id="<?php echo $statusRow['container_id']; ?>">
          <div class="card-header">
            <span class="editable card-header-text<?php echo $statusRow['container_id']; ?>" id="lblname" data-status-id="<?php echo $statusRow['container_id']; ?>"><?php echo $statusRow['container_name']; ?> </span>
            <div class="bars" data-hide-id="<?php echo $statusRow['container_id']; ?>">
              <h5>...</h5>
              <div class="bars-content">
                <h6 class="erase">Delete</h6>
              </div>
            </div>
          </div>
          <ul class="sortable ui-sortable"
            id="sort<?php echo $statusRow['container_id']; ?>"
            data-status-id="<?php echo $statusRow['container_id']; ?>">
        <?php
        if(! empty($taskResult)){
            foreach($taskResult as $taskRow) :
         ?>
             <li class="text-row ui-sortable-handle"
             data-task-id="<?php echo $taskRow['id']; ?>"><?php echo $taskRow['title']; ?><button type="button" name="button" class="edit-li" data-task-id="<?php echo $taskRow['id']; ?>">...</button></li>
           <?php
         endforeach;
         }
            ?>
            </ul>
          <div class="newItem">
            <button type="button"  id="addItem" name="button" class="id_all" data-container-id="<?php echo $statusRow['container_id']?>">+ Add new Card</button>
          </div>
        </div>
        <?php
      endforeach;
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
        var url = 'dbfiles/edit-status.php';
        $('ul[id^="sort"]').sortable({
            connectWith: ".sortable",
            start: function(e, ui){
       ui.placeholder.height(ui.item.height());
   },
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
/// ADD COlUMN
        $(document).on("click","#column",function(){
          $('.add-column').show();
          var url ="dbfiles/update-status.php";
            var name= "<?= $projectName ?>";
            var project_id = <?= $projectId ?>;
            $('.save_column').on("click",function(){
              var value = $('#textVal').val();
         $.ajax({
             type: "POST",
             url: url,
             data: {value: value,project_name:name,project_id:project_id},
             success: function(response){
                location.reload();
                 }
               });
             });
           });


//Update LI
        $("li").each(function(){
          var $this = $(this);
          $(".edit-li").on("click",function(){
            $('.update-item').show();
            var id = $(this).data('task-id');
            var url ="dbfiles/update-item.php";
            var clickedvalue =$(this).text();
            $('.save_update_item').on("click",function(){
              $('.edit').show();
              var value = $("textarea#context").val();
            $.ajax({
              type: "POST",
              url: url,
              data: {value:value,id:id},
              success: function(response){
                location.reload();
                }
              });
            });
          });
        });
// DELETE LI ITEM/CARD
        $("li").each(function(){
          var $this = $(this);
          $(".edit-li").on("click",function(){
            $('.update-item').show();
            var id = $(this).data('task-id');
            var url ="dbfiles/delete-item.php";
              $('.erase-item').on("click",function(){
            $.ajax({
              type: "POST",
              url: url,
              data: {id:id},
              success: function(response){
                location.reload();
                }
              });
            });
          });
        });

// ADDD CARDD
          $(".id_all").each(function(){
            var $this = $(this);
            $this.unbind();
            $this.on("click",function(){
              var name= "<?= $projectName ?>";
              $('.add-item').show();
              var project_id = <?= $projectId ?>;
              var url ="dbfiles/add-item.php";
              var clickedId =$(this).data('container-id');
                $('.save_item').on("click",function(){
                  var value = $('textarea#add_context').val();
               $.ajax({
                   type: "POST",
                   url: url,
                   data: {value:value, clicked_id:clickedId, project_id:project_id},
                   success: function(response){
                      location.reload();
                       }
                     });
              });
            });
          });

  // UPDATE CONTAINER TEXT
  $(document).on('keypress','#header-text', function(event) {
             var $this = $(this);
           let keycode = (event.keyCode ? event.keyCode : event.which);
           if(keycode == '13') {
             var url ="dbfiles/update-title.php";
             var id_container = $(this).parent().parent().attr('data-status-id');
                var project_id = <?= $projectId ?>;
                var valueText = $this.val();
             $.ajax({
                 type: "POST",
                 url: url,
                 data: {valueText: valueText, id_container:id_container},
                 success: function(response){
                   location.reload();
                     }
                   });
           }
         });

// UPDATE TITLE/GOAL TEXT
              $(document).on('keypress','#title-text', function(event) {
           var $this = $(this);
         let keycode = (event.keyCode ? event.keyCode : event.which);
         if(keycode == '13') {
           var url ="dbfiles/update-goalname.php";
           var id_container = $(this).parent().parent().attr('data-status-id');
              var project_id = <?= $projectId ?>;
              var valueText = $this.val();
           $.ajax({
               type: "POST",
               url: url,
               data: {valueText: valueText, project_id:project_id},
               success: function(response){
                  location.reload();
                   }
                 });
         }
       });

// DELETE COLUMNS
       $('.erase').click(function(){
           var clickedId =$(this).parent().parent().attr('data-hide-id');
           var url = "dbfiles/delete-column.php";
           $.ajax({
               type: "POST",
               url: url,
               data: {clickedId:clickedId},
               success: function(response){
                 location.reload();
                   }
                 });
               });


          $(document).on("click",".closed",function (){
              $('.update-item').css('display','none');
              $('.add-column').css('display','none');
              $('.add-item').css('display','none');
          });

          $(document).on("click",".save",function (){
              $('.update-item').css('display','none');
              $('.add-column').css('display','none');
              $('.add-item').css('display','none');
          });

          $(document).on("click","#send",function (){
                $('.box').css('display','none');
          });

                  $(".editable").each(function () {
                      var label = $(this);
                      label.after("<input type = 'text' style='display:none' id='header-text'/>");
                      var textbox = $(this).next();
                      textbox[0].name = this.id.replace("lbl", "txt");
                      textbox.val(label.html());

                      label.on("dblclick",function (){
                        $(this).hide();
                        $(this).next().show();
                    });


                      textbox.focusout(function () {
                          $(this).hide();
                          $(this).prev().html($(this).val());
                      });
                  });

                  $(".title_update").each(function () {
                      var label = $(this);
                      label.after("<input type='text' style='display:none' id='title-text' />");
                      var textbox = $(this).next();
                      textbox[0].name = this.id.replace("lbl", "txt");
                      textbox.val(label.html());

                      label.on("dblclick",function (){
                        $(this).hide();
                        $(this).next().show();
                    });


                      textbox.focusout(function () {
                          $(this).hide();
                          $(this).prev().html($(this).val());
                          $(this).prev().show();
                      });
                  });

          });
     </script>
  </body>
</html>
