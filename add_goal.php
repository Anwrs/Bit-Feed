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

    <title></title>
  </head>
  <body>
    <header id="header">
      <h1>BitFeed</h1>
      <img src="images/logo/logo.png">
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
        <p>Team Members</p>
        <h6>select memebers</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
        <button type="button" id="submit" class="btn btn-primary create_item">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      <hr>
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

        </div>
      <hr>
    </main>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
