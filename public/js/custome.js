$(document).ready(function () {
    var url = "/subscribe" ;
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $("#subscribe").submit((e)=>{
        e.preventDefault();
        var formData = $("#subscribe").serialize() ;
        $.ajax({
            type: "POST",
            url: url,
            data: formData ,
            success: function (response) {
                if ( response.success ) {
                     $("#response").text(response.message).addClass("text text-success")
                     $("#response").fadeOut(3000)

                } else {
                    $("#response").text(response.message).addClass("text text-danger")
                    $("#response").fadeOut(3000)
                }




            }
        });

    })

});
