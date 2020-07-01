$(document).ready(function(){


$('#inputText input').uniqueId();

var count= 1;
var countcard= 1;
$('button#addItem').unbind("click");
$('body').on('click','button#addItem',function(){
    var inputVal =$('#modal_dialog #li_val').val();
      if(inputVal === ""){
        inputVal= "";
      }
      var name;
      name =  inputVal;
      var that = this;
      var ulParent = $(this).closest(".card-container");
      var thisLi = ulParent.find(".sortable");
      countcard++;
      var liItem = '<li class="ui-state-default" id="li_style-'+count+'"  datali-editable><input type="text" name="" id="card '+countcard+'" value="hi" placeholder="Give a title"></li>';
      count++;

      thisLi.append(liItem);

      name = $(that).val('');

});
// <div class="container_card" id="cardcount1"><div id="title"><form class="card_title"  autocomplete="off" action="index.html" method="post"><input type="text" autocomplete="off" placeholder="text here" id="inputText"><!-- <input type="text" name="" value="" class="gh"> --></form><div class="btn-group dropright"><button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button><div class="dropdown-menu"><!-- Dropdownmenulinks -->defgrvhb</div></div></div><ul id="'+count2+'" class="sortable  connectedSortable"></ul><div class="handlers"><button type="button"  id="addItem" name="button">+ Add new Card</button></div>
// $(function(){
//   var vars =$('input#card').val("soooo");
//   // console.log(vars+"  sss");
// })


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

  $(function() {
		var url = 'edit-status.php';
		$('ul[id^="sort"]').sortable(
				{
					connectWith : ".sortable",
					receive : function(e, ui) {
						var status_id = $(ui.item).parent(".sortable").data(
								"status-id");
						var task_id = $(ui.item).data("task-id");
						$.ajax({
							url : url + '?status_id=' + status_id + '&task_id='
									+ task_id,
							success : function(response) {
							},
              update: function(){
                alert("do something");
              }
						});
					}

				}).disableSelection();
	});

    //   $('.container_card ul').sortable({
    //     connectWith:'.connectedSortable',
    //     cursor: 'pointer',
    //     update: function(event, ui) {
    //       var changedList = this.id;
    //       var order = $(this).sortable('toArray');
    //       var positions = order.join(';');
    //       var n = $(order).length;
    //       for(i=0;i<n;i++){
    //         var test = order[i];
    //         console.log(test);
    //
    //         const toSend = {
    //           title : "Sortable Container",
    //    container_num: changedList,
    //        positions: order
    //      };
    //
    //      var responseText = document.getElementById('response');
    //      const jsonString = JSON.stringify(toSend);
    //      const xhr = new XMLHttpRequest();
    //      xhr.open("POST", "retroboard.php");
    //      xhr.setRequestHeader("Content-Type","application/json");
    //      xhr.send(jsonString);
    //
    //
    //     }
    //
    //     $.post('receive.php?action=sendMessage', function(response){
    //               $('#chat').html(response);
    //                                    });
    //     }
    //   });
    });
//   $('.container_card ul').sortable({
//     connectWith:'.connectedSortable',
//     cursor: 'pointer',
//     update: function(event, ui) {
//       var changedList = this.id;
//       var order = $(this).sortable('toArray');
//       var positions = order.join(';');
//       var n = $(order).length;
//       for(i=0;i<n;i++){
//         var test = order[i];
//         console.log(test);
//
//         const toSend = {
//           title : "Sortable Container",
//    container_num: changedList,
//        positions: order
//      };
//
//      var responseText = document.getElementById('response');
//      const jsonString = JSON.stringify(toSend);
//      const xhr = new XMLHttpRequest();
//      xhr.open("POST", "retroboard.php");
//      xhr.setRequestHeader("Content-Type","application/json");
//      xhr.send(jsonString);
//
//
//     }
//
//     $.post('retroboard.php?action=getMessage', function(response){
//               $('#chat').html(response);
//
//
//                                    });
//
//     }
//   });
// });




$(document).on('click','#deleteItem', function(){
  $(this).parent().parent().parent().parent().remove();
});

// $(function () {
//   $(".container_card ul").sortable({
//     connectWith:'.connectedSortable',
//     cursor: 'pointer',
//
//
//   });
//           $(".sortable").disableSelection();
// });

$(function() {
  var url = 'edit-status.php';
  $('ul[id^="sort"]').sortable(
      {
        connectWith : ".sortable",
        receive : function(e, ui) {
          var status_id = $(ui.item).parent(".sortable").data(
              "status-id");
          var task_id = $(ui.item).data("task-id");
          $.ajax({
            url : url + '?status_id=' + status_id + '&task_id='
                + task_id,
            success : function(response) {
            }
          });
        }

      }).disableSelection();
});
// $(function () {
//   $(".sortable ul").sortable({
//     connectWith:'.connectedSortable',
//     cursor: 'pointer',
//
//   });
//           $(".sortable").disableSelection();
// });


});
