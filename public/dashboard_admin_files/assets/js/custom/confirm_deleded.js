$(document).ready(function() {
    
    $('.delete').click(function(e) {
        e.preventDefault();

        var that = $(this)

        var n = new Noty({
            text: 'confarm deleted',
            type: "warning",
            killer: true,
            buttons: [
                Noty.button('yes', 'btn btn-primary mx-2 text-light', function() {
                    that.closest('form').submit();
                }),

                Noty.button('no', 'btn btn-primary mx-2 text-light', function() {
                    n.close();
                })
            ]
        });

        n.show();

    }); //end of delete

});//end of document redy 