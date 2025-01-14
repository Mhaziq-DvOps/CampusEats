$(function() {
    $('.toggle-class').change(function() {
        var day_off = $(this).prop('checked') == true ? 1 : 0; 
        var day_id = $(this).data('day_id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'day_id': day_id, 'day_off': day_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })