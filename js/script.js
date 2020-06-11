

$(document).on("click",".close",function (){
    $('.modal').css('display','none');
    $('.modal_li').css('display','none');

});

$(document).on("click","#send",function (){
      $('.modal').css('display','none');
      $('.modal_li').css('display','none');

});



$(document).on("click","#addItem", function (){
    $('.modal').css('display','block');
    alert(($this).text());
});


var update = function(e) {
    var name = $('#modal_dialog #li_val').val();
     $("#sortable").append('<li id="li_style"datali-editable>'+name+'</li>');
       $(this).parent().find('#sortable').append("<h1>heyyyyyy</h1>");
};
$('.save').click(update);



$(document).on("click",".update",function (){
    $('.modal_li').css('display','none');
  });



$(document).on('click','.add_Column',function (){
  var $newDiv= $('<div class="container"><div id="title"><h3 class="editable" id="textq" datatitle-editable>Title</h3><div class="handlers"><button type="button"  id="addItem" name="button">+</button><button type="button"  id="deleteItem" name="button">x</button></div></div><ul   id="sortable" class="connectedSortable"></div>');
  $('.containment').append($newDiv);

  $('ul').sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer'
  });
});

$(document).on('click','#deleteItem', function(){
  $(this).parent().parent().parent().remove();
})

$(function () {
  $("ul").sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer'
  });
});




$('body').on('click', '[data-editable]', function(){

  var $el = $(this);

  var $input = $('<input/>').val( $el.text() );
  $el.replaceWith( $input );

  var save = function(){
    var $p = $('<h1 data-editable />').text( $input.val() );
    $input.replaceWith( $p );
  };
   $("#placeholder").css({'position':"absolute"});

  /**
    We're defining the callback with `one`, because we know that
    the element will be gone just after that, and we don't want
    any callbacks leftovers take memory.
    Next time `p` turns into `input` this single callback
    will be applied again.
  */
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
