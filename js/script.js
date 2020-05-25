$(document).on("click","button",function (){
    $('ul').append('<li>Item</li>');
    $( "li" ).addClass( "editable" );
    // alert("hdvhde");
  });


$(document).on("mousedown",function() {
  $(".sortableList").sortable({
      connectWith: "#li_drag",
      revert: true,

  });
});

  $(".draggable").draggable({
      connectToSortable: '.sortableList',
      // connectWith: ".connectTo",
      cursor: 'pointer',
      helper: 'clone',
      revert: 'invalid'
  });

  a =  30000;

  	$(".slide").draggable({

  		revert:true,

  		start: function(event, ui) {  },
  		drag:function () {
  			$(this).removeClass('droped');
  		},
  		// removing the CSS classes once dragging is over.
  		stop:function () {
  			$(this).addClass('droped');
  		},
  		zIndex: 10000,
  		snapMode: "inner"
  	});
// $(document).on("mousedown",function() {
//   $( "box1, .box2, .box3" ).sortable({
    // connectWith: ".connectTo",
    // stop: function(event, ui) {
    //     $('.connectTo').each(function() {
    //         result = "";
    //         alert($(this).sortable("toArray"));
            // $(this).find("li").each(function(){
                // result += $(this).text() + ",";
            // });
            // $("."+$(this).attr("id")+".list").html(result);
//         });
//     }
// });
//
// });

$(document).ready(function() {
    $(document).on("click",".editable", function (){
        var that = $(this);
        if (that.find('input').length > 0) {
            return;
        }
        var currentText = that.text();

        var $input = $('<input>').val(currentText)
        .css({
            'position': 'absolute',
            top: '0px',
            left: '0px',
            width: that.width(),
            height: that.height(),
            opacity: 0.9,
            padding: '10px'
        });

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


$(function  () {
  $("ol.example").sortable();
});


var oldContainer;
$("ol.nested_with_switch").sortable({
  group: 'nested',
  afterMove: function (placeholder, container) {
    if(oldContainer != container){
      if(oldContainer)
        oldContainer.el.removeClass("active");
      container.el.addClass("active");

      oldContainer = container;
    }
  },
  onDrop: function ($item, container, _super) {
    container.el.removeClass("active");
    _super($item, container);
  }
});

$(".switch-container").on("click", ".switch", function  (e) {
  var method = $(this).hasClass("active") ? "enable" : "disable";
  $(e.delegateTarget).next().sortable(method);
});
