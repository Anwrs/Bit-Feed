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
    <header id="header">
      <img src="images/bitwhite.png" alt="bit-logo">
    </header>

    <main>

  <div class="modal fade" tabindex="-1" role="dialog" id="modal_dialog" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>Show Input value option</p>
        <input type="text" name="subject" value="" id="li_val"placeholder="subject....">
        <p>Team Members</p>
        <h6>select memebers</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
        <button type="button" id="send" class="btn btn-primary create_item save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      <!-- <hr> -->


      <div class="modal_li fade" tabindex="-1" role="dialog" id="modal_update" style="display:none">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Li</h4>
          </div>
          <div class="modal-body">
            <p>Show Input value option</p>
            <input type="text" name="subject" value="" id="update_val"placeholder="subject....">
            <p>Team Members</p>
            <h6>select memebers</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
            <button type="button" id="send" class="btn btn-primary create_item update">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<a href="#"  class="view" >View</a>
<div id="dialogBox" title="details" style="display: none;">
    <div id="list" class="ui-popup">
        <label for="name">Add name</label><br/>
        <input style="width: 50%;" type='text' id="name" value="" >
        <input type="submit" class="save" id="save" value="SAVE"/>

        <ul id="namelist">
            <li>reena</li>
        </ul>
    </div>
</div>





      <div class="containment">
            <div class="container1">
              <div id="title">
                <h3 class="editable" id="textq">Title</h3>
                <button type="button"  id="addItem1" name="button">+</button>
              </div>
              <ul   id="sortable1" class="connectedSortable">
            </div>
            <div class="container2">

              <div id="title">
                <h3 class="editable">Title</h3>
                <button type="button" id="addItem2" name="button">+</button>
              </div>
              <ul id="sortable2" class="connectedSortable" >
            </div>
            <div class="container3">
              <div id="title">
                <h3 class="editable">Title</h3>
                <button type="button" id="addItem3" name="button">+</button>
              </div>
              <ul  id="sortable3" class="connectedSortable" >
            </div>

          <div class="add_Column">
            <button type="button" name="button" id="column">+</button>
          </div>
        </div>
      <!-- <hr> -->
    </main>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
