<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="css/retro.css" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <link href="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
         <script type="text/javascript" src="js/script.js"></script>
    <title></title>
  </head>
  <style>
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
      <h1 class="title_update project-text" id="lblname"><?php echo $projectName ?></h1>
    </div>
<?php
  }}
   ?>
    <div class="add-column">
      <div class="box_content">
        <div class="box_header">
          <h2>New Column</h2>
        </div>
        <div class="box_body">
            <input type="text" name="Subject" value="" id="textVal" placeholder="text...." required>
        </div>
        <div class="box_footer">
          <button type="button" id="send" class="btn btn-primary create_item save">Add Column</button>
          <button type="button" class="closed"  id="deleteItem">Close</button>
        </div>
      </div>
    </div>

    <div class="update-item">
      <div class="box_content">
        <div class="box_header">
          <h2>Update Item</h2>
        </div>
        <div class="box_body">
          <textarea name="context" id="context" rows="1" cols="30"></textarea>
        </div>
        <div class="box_footer">
          <button type="button" id="send" class="btn btn-primary create_item save">Save changes</button>
          <button type="button" class="closed"  id="deleteItem">Close</button>
        </div>
      </div>
    </div>


    <div class="add-item">
      <div class="box_content">
        <div class="box_header">
          <h2>Add New Card</h2>
        </div>
        <div class="box_body">
          <textarea name="context" id="add_context" rows="1" cols="30"></textarea>
        </div>
        <div class="box_footer">
          <button type="button" id="send" class="btn btn-primary create_item save">Add Item</button>
          <button type="button" class="closed"  id="deleteItem">Close</button>
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
            <span class="editable card-header-text<?php echo $statusRow['container_id']; ?>" class="editable" id="lblname" data-status-id="<?php echo $statusRow['container_id']; ?>"><?php echo $statusRow['container_name']; ?> </span>
            <div class="edit">
              <button type="button" name="button" class="reject">X</button>
              <button type="button" name="button" class="accept">V</button>
            </div>
            <div class="bars" data-hide-id="<?php echo $statusRow['container_id']; ?>">
              <h5>...</h5>
              <div class="bars-content">
              <a href=""><h6> Edit</h6></a>
              <a href=""><h6>Delete</h6></a>
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
             data-task-id="<?php echo $taskRow['id']; ?>"><?php echo $taskRow['title']; ?></li>

           <?php
         endforeach;
         }
            ?>
            </ul>
          <div class="newItem">
            <button type="button"  id="addItem" name="button" class="id_all"data-container-id="<?php echo $statusRow['container_id']?>">+ Add new Card</button>
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

// SORTABLE CONECTION
    $( function() {
        var url = 'dbfiles/edit-status.php';
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
/// ADD COlUMN
        $(document).on("click","#column",function(){
          $('.add-column').show();
          var url ="dbfiles/update-status.php";
            var name= "<?= $projectName ?>";
            var project_id = <?= $projectId ?>;
            $('.save').on("click",function(){
              var value = $('#textVal').val();
         $.ajax({
             type: "POST",
             url: url,
             data: {value: value,project_name:name,project_id:project_id},
             success: function(response){
                 }
               });
             });
           });


//Update LI/CARD
        $("li").each(function(){
          var $this = $(this);
          $this.on("click",function(){
            $('.update-item').show();
            var id = $(this).data('task-id');
            var url ="dbfiles/update-item.php";
            var clickedvalue =$(this).text();
            $('.save').on("click",function(){
              $('.edit').show();
              var value = $("textarea#context").val();
            $.ajax({
              type: "POST",
              url: url,
              data: {value:value,id:id},
              success: function(response){
                }
              });
            });
          });
        });

// ADDD CARDD/LI
          $(".id_all").each(function(){
            var $this = $(this);
            alert("heeeerree");
            $this.on("click",function(){
              var name= "<?= $projectName ?>";
              $('.add-item').show();
              var project_id = <?= $projectId ?>;
              var url ="dbfiles/add-item.php";
              var clickedId =$(this).data('container-id');
                $('.save').on("click",function(){
                  var value = $('textarea#add_context').val();
               $.ajax({
                   type: "POST",
                   url: url,
                   data: {value:value, clicked_id:clickedId, project_id:project_id},
                   success: function(response){
                     alert()
                       $( 'li' ).html(response);
                       }
                     });
              });
            });
          });

//UPDATE CONTAINER TITLE
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
                     }
                   });
           }
         });
// UPDATE PROJECT/GOAL TITLE
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
                   }
                 });
         }
       });

       setInterval(function(){
         $('.retro-board').load();
       }, 1000);

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
                          $(this).prev().show();
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
