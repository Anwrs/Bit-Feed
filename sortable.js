$('#sort').sortable({
  update: function(evt, ui) {
    $.ajax({
      type: 'POST',
      url: '/the_url_to_save',
      dataType: 'json',
      data: $('#sort').sortable('serialize'),
      success: function(msg) {
        console.log(msg);
      }
    });
  }
});
