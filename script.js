$(document).ready(function(){


// $('#inputText input').uniqueId();
//
// var count= 1;
// var countcard= 1;
$('button#addItem').unbind("click");
$('body').on('click','button#addItem',function(){
//     var inputVal =$('#modal_dialog #li_val').val();
//       if(inputVal === ""){
//         inputVal= "";
//       }
//       var name;
//       name =  inputVal;
//       var that = this;
//       var ulParent = $(this).closest(".card-container");
//       var thisLi = ulParent.find(".sortable");
//       countcard++;
//       var liItem = '<li class="ui-state-default" id="li_style-'+count+'"  datali-editable><input type="text" name="" id="card '+countcard+'" value="hi" placeholder="Give a title"></li>';
//       count++;
//
//       thisLi.append(liItem);
//       name = $(that).val('');
//
});
//


function addItem() {
  var newValue = "Heeeey Guys";
  var url = 'edit-status.php';

  var data = {value: newValue};
  var xhttp = new XMLHttpRequest();
    // Set POST method and ajax file path
    xhttp.open("POST", "edit-status.php", true);

    // call on request changes state
    xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {

    var response = this.responseText;
    if(response == 1){
       alert("Insert successfully.");
     }
     xhttp.setRequestHeader("Content-Type", "application/json");

  // Send request with data
  xhttp.send(JSON.stringify(data));
  // $.ajax({
  //   type: "POST",
  //   data: {Value: newValue}
  //     url: url,
  //     success: function(response){
  //         }
  // });
}


//this function is going to be used for appending new li items to correct positions
function UpdateLi(){
  var url = 'edit-status.php';
  var status_id = $(ui.item).parent(".sortable").data("status-id");
  var task_id = $(ui.item).data("task-id");
  $.ajax({
      url: url+'?status_id='+status_id+'&task_id='+task_id,
      success: function(response){
          }
  });
}

var count2= 1;
$('button#column').unbind("click");
$(document).on('click','button#column',function (){
  var div = $('<div class="card-container"><div class="card-header"><span class="card-header-text">Title Here</span></div><ul class="sortable ui-sortable" id="sort" data-status-id><li class="text-row ui-sortable-handle" data-task-id>Test</li></ul><div class="newItem"><button type="button"  id="addItem" name="button">+ Add new Card</button></div></div>');
  count2++;

  console.log(count2);
  $(div).find('li')
      .remove()
    .end();
  $('.retro-board').append(div);

    });

$(document).on('click','#deleteItem', function(){
  $(this).parent().parent().parent().parent().remove();
});


});
