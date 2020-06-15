$(document).ready(function(){
$(document).on("click",".close",function (){
    $('.modal').css('display','none');
    $('.modal_li').css('display','none');

  });

// $(document).on("click",".close",function (){
//     $('.modal').css('display','none');
//     $('.modal_li').css('display','none');
//
// });

$(document).on("click","#send",function (){
      $('.modal').css('display','none');
      $('.modal_li').css('display','none');

});



// $(document).on("click","#addItem", function (){
    // $('.modal').css('display','block');
// });


// var update = function(e) {
//     var name = $('#modal_dialog #li_val').val();
//      // $(e.target).siblings("#sortable ul").append('<li id="li_style"datali-editable>'+name+'</li>');
//      $("#sortable").append('<li id="li_style"datali-editable>'+name+'</li>');
//      // $('#addItem').parent().parent().parent()append('<li id="li_style"datali-editable>'+name+'</li>');
//      // $(this).closest('#sortable ul').append('<li id="li_style"datali-editable>'+name+'</li>');
// };
// $('.save').click(update);
// var update;
$('body').on('click','#addItem',function(){

    // var update = function(e) {
    var inputVal =$('#modal_dialog #li_val').val();

    if(inputVal === ""){
      inputVal= "untitled";
    }
    var ulParent = $(this).closest(".container");
    var name =  inputVal;
    var thisLi = ulParent.find("#sortable");
    if(name !=""){
      var liItem ='<li id="li_style"datali-editable>'+name+'</li>';
      $(this).closest('#sortable').append('<li id="li_style"datali-editable>'+name+'</li>');
           // $("#sortable").append('<li id="li_style"datali-editable>'+name+'</li>');
    }
    thisLi.append(liItem);
    name.val('');
    $('.save').click(function() {
      alert("gosh darn variables");
    });
  // };
});



$(document).on("click",".update",function (){
    $('.modal_li').css('display','none');
  });



$(document).on('click','.add_Column',function (){
  var $newDiv= $('<div class="container"><div id="title"><h3 class="editable" id="textq" datatitle-editable>Title</h3><div class="handlers"><button type="button"  id="addItem" name="button">+</button><button type="button"  id="deleteItem" name="button">x</button></div></div><ul   id="sortable" class="connectedSortable"></div>');
  $('.containment').append($newDiv);

  $('.container ul').sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer'
  });
});

$(document).on('click','#deleteItem', function(){
  $(this).parent().parent().parent().remove();
})

$(function () {
  $(".container ul").sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer'
  });
});




$('body').on('click', '[data-editable]', function(){

  var $el = $(this);

  var $input = $('<input/>').val( $el.text() );
  $input.css({
    "position":"relative",
    "top":"40px",
    "padding":"5px"
    // "left":"25%"
});
  $el.replaceWith( $input );

  var save = function(){
    var $p = $('<h1 data-editable />').text( $input.val() );
    $input.replaceWith( $p );
  };
   $("#placeholder").css({'position':"absolute"});
  $input.one('blur', save).focus();

});

$('body').on('click', '[datatitle-editable]', function(){

  var $el = $(this);

  var $input = $('<input/>').val( $el.text() );
  $el.replaceWith( $input );

  var save = function(){
    var $p = $('<h3 datatitle-editable />').text( $input.val() );
    $input.replaceWith( $p );
  };
  $input.one('blur', save).focus();

});



$('body').on('click', '[datali-editable]', function(){

  var $el = $(this);

  var $input = $('<input/>').val( $el.text() );
  $el.replaceWith( $input );

  var save = function(){
    var $p = $('<li datali-editable />').text( $input.val() );
    $input.replaceWith( $p );
  };
  $input.one('blur', save).focus();

});




});
