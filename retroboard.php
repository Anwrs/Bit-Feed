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

  .update-item,.add-column{
    background-color: white;
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50%;
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
$Items = $library->getAllItems();


 ?>


    <div class="retro_title">
      <h1 class="editable" id="lblname">title</h1>
    </div>

    <div class="add-column">
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

    <div class="update-item">
      <div class="box_content">
        <div class="box_header">
          <h2>Update Item</h2>
        </div>
        <div class="box_body">
          <h4>Title</h4>
          <textarea name="context" id="context" rows="3" cols="30"></textarea>
            <input type="text" name="context"  id="context" placeholder="text...." required>
        </div>
        <div class="box_footer">
          <button type="button" id="send" class="btn btn-primary create_item save">Save changes</button>
          <button type="button" class="closed"  id="deleteItem">Close</button>
        </div>
      </div>
    </div>

    <main id="main">
      <div class="retro-board">

        <?php
        if(!empty($contents)){
        foreach ($contents as $statusRow) {
          $taskResult = $library->InsertColumnIdAndContent(intval($statusRow["container_id"]),$projectName);
          // $nums = intval($statusRow["container_id"]);
            // var_dump($nums);
         ?>
        <div class="card-container">
          <div class="card-header">
            <span class="card-header-text editable" id="lblname"><?php echo $statusRow['container_name']; ?> </span>
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
           echo $taskRow['id'];
              }
         }
            ?>
            </ul>
          <div class="newItem">
            <button type="button"  id="addItem" name="button" class="id_all"data-container-id="<?php echo $statusRow['container_id']?>">+ Add new Card</button>
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



        $(document).on("click","#column",function(){
          alert("actiiiooon");
          $('.add-column').show();
          var url ="update-status.php";
          var id = <?= sizeof($contents)+1 ?>;
          // alert(id);
          // console.log(value);
    $('.save').on("click",function(){
      var value = $('#textVal').val();
      // alert(value);
         $.ajax({
             type: "POST",
             url: url,
             data: {value: value, id:id},
             success: function(response){
               alert(response);
                 }
               });
             });
           });

        $("li").each(function(){
          var $this = $(this);
          $this.on("click",function(){
            $('.update-item').show();
            var id = $(this).data('task-id');
            var url ="update-item.php";
            // var value = $('#context').val();
            var clickedvalue =$(this).text();
            alert(clickedvalue);
            $('.save').on("click",function(){
              var value = $("textarea#context").val();
              alert(id);
              alert(value);

            $.ajax({
              type: "POST",
              url: url,
              data: {value:value,id:id},
              success: function(response){
                alert(response);
                }
              });
            });
          });
        });

          $(".id_all").each(function(){
            var $this = $(this);
            $this.on("click",function(){
              $('.update-item').show();
              // alert($(this).data('container-id'));
              var url ="add-item.php";
              var clickedId =$(this).data('container-id');

              var id = <?= sizeof($Items)+1 ?>;
                $('.save').on("click",function(){
                  var value = $('textarea#context').val();
                  alert(value);
               $.ajax({
                   type: "POST",
                   url: url,
                   data: {value: value,id:id, clicked_id:clickedId},
                   success: function(response){
                     // alert(response);
                       }
                     });
              });
            });
          });

          $(document).on("click",".closed",function (){
              $('.update-item').css('display','none');
              $('.add-column').css('display','none');

          });

          $(document).on("click","#send",function (){
                $('.box').css('display','none');
          });
          //
          // $("span.card-header-text").on("click",function(e){
          //   // $(document).on("dblclick",$this,function(e){
          //     alert("heeyyyy");
          //
          // });

          // $(document).on("dblclick","span.card-header-text",function (){
                // $('.box').css('display','none');

                // $(document).on("dblclick","span.card-header-text",function (){
                  $(".editable").each(function () {
                    // alert("double");
                      var label = $(this);

                      label.after("<input type = 'text' style='display:none'/>");

                      var textbox = $(this).next();


                      textbox[0].name = this.id.replace("lbl", "txt");

                      textbox.val(label.html());

                      label.on("dblclick",function (){
                        // alert("hiii");
                        $(this).hide();
                        $(this).next().show();
                    });


                      textbox.focusout(function () {
                          $(this).hide();
                          $(this).prev().html($(this).val());
                          $(this).prev().show();
                      });
                  });
                // });


          // });






          });
     </script>
  </body>
</html>
