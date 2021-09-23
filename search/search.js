function searching(item) {
    if (item!='') {
        if (item.length >1) {
            $.ajax({
                type: "POST",
                    url: "backend.php",
                    data: {
                        data: data,
                    },
                    success: function(data) {
                        $('#list').fadeIn();
                        $('#list').html(data);

                    }
            });
        } else {
            $('#list').fadeOut();
            $('#list').html('');
        }   
    } else {
        $('#list').fadeOut();
        $('#list').html('');
        
    }
  
}