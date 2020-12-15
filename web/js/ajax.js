$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault();

        let json;
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                json = $.parseJSON(result);

                if(json.status == 'success') {
                    $('.report').html(json.data);
                } else {
                    $('.report').html(json.data);
                    console.log(json.status + ' - ' + json.message);
                }
            }
        });
    });
});
