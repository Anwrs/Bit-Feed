
  $(document).on("click",".close",function (){
      $('.modal').css('display','none');
    });

    $(document).on("click","#send",function (){
        $('.modal').css('display','none');
      });



$(document).on("click","#addItem", function (){
    $('.modal').css('display','block');
});

  //
  // $(document).on("click","#addItem1",function (){
  //     // $('ul').append('<li>Item</li>');
  //     // $( "li" ).addClass( "editable" );
  //     // $( "li" ).addClass("ui-state-default");
  //     // alert("hdvhde");
  //   });


$(document).on("mousedown",function() {
  $(".sortableList").sortable({
      connectWith: "#li_drag",
      revert: true
  });
});

var update = function(e) {
    var name = $('#modal_dialog #li_val').val();
     $("#sortable").append('<li>'+name+'</li>');
};
$('.save').click(update);


$(document).on("click","li",function (){
      $('.modal_li').css('display','block');
});

// var renew = function(e) {
//   var new = $('#modal_dialog #update_val').val();
//   var that $(this);
//   var currentText = that.text();
//   $(currentText).val(that);
// };
// $('.update_val').click(renew);


$(document).on('click','.add_Column',function (){
  var $newDiv= $('<div class="container"><div id="title"><h3 class="editable">Title</h3><button type="button" id="addItem" name="button">+</button></div><ul  id="sortable" class="connectedSortable" ></div>');
  $('.containment').append($newDiv);

  $('ul').sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer'
  });
});

$(function () {
  $("ul").sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer'
  });
});



// $(document).ready(function() {
//     $(document).on("click",".editable", function (){
//         var that = $(this);
//         // if (that.find('input').length > 0) {
//         //     return;
//         // }
//         var currentText = that.text();
//
//         // var input = $('#li_val').val(currentText)
//         // .css({
//         //     'position': 'absolute',
//         //     top: '0px',
//         //     left: '0px',
//         //     width: that.width(),
//         //     height: that.height(),
//         //     opacity: 0.9,
//         //     padding: '10px'
//         // });
//
//         $(this).append(input);
//
//         $(document).click(function(event) {
//             if(!$(event.target).closest('.editable').length) {
//                 if ($input.val()) {
//                     that.text($input.val());
//                 }
//                 that.find('input').remove();
//             }
//         });
//     });
// });
