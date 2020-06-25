$(document).ready(function(){



  $("#board_input").attr('maxlength','30');
$('#board_input').blur(function (){
    if( !this.value) {
       // $(this).parents('p').addClass('warning');
       // alert("emptyyyyyyy");
 } else {
      $("button.create_board").click(function(){
          // alert("start project create board");
          var inputVal = $('#board_input').val();
          // Your existing code unmodified...
          var name;
            name =  inputVal;
          var elm = '<div class="card">'
                      +'<p>'+name+'</p>'+
                    '</div>';
          $('.content').append(elm);
              name = $(this).val('');

      });

 }

});



















});
