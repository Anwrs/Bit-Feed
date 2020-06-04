$(document).on("click","#addItem1",function (){
    $('.modal').css('display','block');
  });



  $(document).on("click",".create_item",function (){
      $('ul').append('<li>Item</li>');
      $( "li" ).addClass("ui-state-default");
      $( "li" ).addClass( "editable");
      $('.modal').css('display','none');
    });

  $(document).on("click",".close",function (){
      $('.modal').css('display','none');
    });


  $(document).ready(function() {
    $(document).on("click","li",function (){
      alert("heyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy");
    // $( "#sortable1, #sortable2, #sortable3" ).sortable({connectWith: ".connectedSortable"}).disableSelection();
  });
});

// $(document).on("click","#addItem1", function (){
//   $("#modal_dialog").dialog();
// }
// $(document).on("click","button", function (){
//
//   if (this.id == 'addItem1'){
//     alert("dhgfggegfksehcfjkfgvhb");
//     $('ul').append('<li>Item</li>');
//     $( "li" ).addClass("ui-state-default");
//     $( "li" ).addClass( "editable");
//   }
//
//   if (this.id == 'addItem2'){
//     alert("hey");
//     $('ul').append('<li>Item</li>');
//     $( "li" ).addClass("ui-state-default");
//     $( "li" ).addClass( "editable");
//
//   }
//
//
//   if (this.id == 'addItem3'){
//     alert("powerrangers");
//     $('ul').append('<li>Item</li>');
//     $( "li" ).addClass("ui-state-default");
//     $( "li" ).addClass( "editable");

  // }


// });

$(document).ready(function() {
    $(document).on("click",".editable", function (){
      // $(".fa-close").prop("disabled" , true);
        var that = $(this);
        if (that.find('input').length > 0) {
            return;
        }
        var currentText = that.text();

        var $input = $('<input>').val(currentText);


        $(this).append($input);

        $(document).click(function(event) {
            if(!$(event.target).closest('.editable').length) {
                if ($input.val()) {
                    that.text($input.val());
                }
                that.find('input').remove();
            }
        });
    });
});

// var modal = document.getElementById("myModal");
//
// // Get the button that opens the modal
// var btn = document.getElementById("addItem1");
//
// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];
//
// // When the user clicks the button, open the modal
// btn.onclick = function() {
//   modal.style.display = "block";
// }
//
// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }
//
// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }
