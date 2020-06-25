$(document).ready(function(){
// $(document).on("click",".close",function (){
//     $('.modal').css('display','none');
//     $('.modal_li').css('display','none');
//
//   });
//
// $(document).on("click","#send",function (){
//       $('.modal').css('display','none');
//       $('.modal_li').css('display','none');
//
// });

$('body').on('click','button#addItem',function(){
    var inputVal =$('#modal_dialog #li_val').val();

    if(inputVal === ""){
      inputVal= "";
    }
    var ulParent = $(this).closest(".container");
    var name;
      name =  inputVal;

    var thisLi = ulParent.find("#sortable");
      var liItem ='<li class="ui-state-default" id="li_style"datali-editable>'+name+'</li>';
      // $(this).closest('#sortable').append('<li id="li_style"datali-editable>'+name+'</li>');
      thisLi.append(liItem);
      // name.val('');
      name = $(this).val('');
});


//
// $(document).on("click",".update",function (){
//     $('.modal_li').css('display','none');
//   });



$(document).on('click','button#column',function (){
  var $newDiv= $('<div class="container"><div id="title"><h3 class="editable" id="textq" datatitle-editable>Title</h3><div class="handlers"><button type="button"  id="addItem" name="button">+</button><button type="button"  id="deleteItem" name="button">x</button></div></div><ul   id="sortable" class="connectedSortable"></div>');
  $('.containment').append($newDiv);
    // $newDiv.empty();
  $('.container ul').sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer',
    update: function(event, ui) {
      var neworder = [];
      $("#sortable").find("li").each(function () {
          var item = $(this).text();
          //alert(item);
          neworder.push(item)
      });
      alert(JSON.stringify(neworder));

      //here, you could pass this re-ordered items to a webmethod and save to the database using AJAX.
    }
  });
});

$(document).on('click','#deleteItem', function(){
  $(this).parent().parent().parent().remove();
})

$(function () {
  $(".container ul").sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer',
    update: function(event, ui) {
       console.log($(this));
       var neworder = [];
       $("#sortable").filter(".ui-state-default").each(function () {
           var item = $(this).text();
           //alert(item);
           neworder.push(item)
       });
       alert(JSON.stringify(neworder));

     }
  });
          $("#sortable").disableSelection();
});

$('body').on('click', '[data-editable]', function(){

  var $el = $(this);

  var $input = $('<input/>').val( $el.text() );
  $el.replaceWith( $input );

  var save = function(){
    var $p = $('<h1 data-editable />').text( $input.val() );
    $input.replaceWith( $p );
  };
  $input.one('blur', save).focus();
  $input.css('border','none');
  $input.css('position','relative');
  $input.css('top','15%');
  $input.css('left','48%');
  $input.css('font-size','27px');
  $input.css('font-weight','bold');
  $input.css('outline','none');
  $input.css('background-color','transparent');
  $input.style('placeholder','Untitled');

});


$('body').on('click', '[datatitle-editable]', function(){

  var $el = $(this);

  var $input = $('<input/>').val( $el.text() );
  $el.replaceWith( $input );

  var save = function(){
    var $p = $('<h3 datatitle-editable />').text( $input.val()??null );
    $input.replaceWith( $p );
  };
  $input.one('blur', save).focus();
  $input.css('border','none');
  $input.css('outline','none');
  $input.css('font-weight','bold');
  $input.css('background-color','transparent');
  $input.style('placeholder','Untitled');

});
  // $('h3').each(function(ev)
  // {
  // //   if
  // //     if($('h3').is(':empty')) {
  // //       $('h3').text("Untitled");
  // // }
  // });


$('body').on('click', '[datali-editable]', function(){

  var $el = $(this);

  var $input = $('<input/>').val( $el.text() );
  $el.replaceWith( $input );

  var save = function(){
    var $p = $('<li class="ui-state-default" id="li_style" datali-editable value />').text( $input.val() );
    $input.replaceWith( $p );
  };
  $input.one('blur', save).focus();
  // $input.css('font-weight','bold');

});

});
