$(document).ready(function(){


$('#inputText input').uniqueId();


var count= 1;
$('button#addItem').unbind("click");
$('body').on('click','button#addItem',function(){
    var inputVal =$('#modal_dialog #li_val').val();
      if(inputVal === ""){
        inputVal= "";
      }
      var name;
      name =  inputVal;
      var that = this;
      var ulParent = $(this).closest(".container_card");
      var thisLi = ulParent.find(".sortable");
      count++;
      var liItem = '<li class="ui-state-default" id="li_style-'+count+'" datali-editable><input type="text" name="" id="card" value="" placeholder="Give a title"><p class="test">add to card</p></li>';

      thisLi.append(liItem);

      name = $(that).val('');

});



var count2= 2;

$(document).on('click','button#column',function (){
  // $('ul.sortable').uniqueId();

  // var clones = $('.container_card:first').clone();
  var div = $('<div class="container_card" id="cardcount1"><div id="title"><form class="card_title"  autocomplete="off" action="index.html" method="post"><input type="text" autocomplete="off" placeholder="text here" id="inputText"><!-- <input type="text" name="" value="" class="gh"> --></form><div class="btn-group dropright"><button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button><div class="dropdown-menu"><!-- Dropdownmenulinks -->defgrvhb</div></div></div><ul id="sortable'+count2+'" class="sortable  connectedSortable"></ul><div class="handlers"><button type="button"  id="addItem" name="button">+ Add new Card</button></div>');
  count2++;

  console.log(count2);
  $(div).find('li')
      .remove()
    .end();

  $('.containment').append(div);


  $('.container_card ul').sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer',
    update: function(event, ui) {
      var changedList = this.id;
      var order = $(this).sortable('toArray');
      var positions = order.join(';');

      console.log({
        id: changedList,
        positions: positions
      });
      // alert(JSON.stringify(neworder));

      //here, you could pass this re-ordered items to a webmethod and save to the database using AJAX.
    }
  });
});




$(document).on('click','#deleteItem', function(){
  $(this).parent().parent().parent().parent().remove();
})

$(function () {
  $(".container_card ul").sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer'

  });
          $(".sortable").disableSelection();
});


$(function () {
  $(".sortable ul").sortable({
    connectWith:'.connectedSortable',
    cursor: 'pointer',

  });
          $(".sortable").disableSelection();
});


});
