$(document).ready(function () {

    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $("#subscribe").submit((e)=>{
        e.preventDefault();
        var value = $("#subemail").val() ;
        if ( value == "" ) {
            $("#response").text("Please input the Email").addClass("text text-danger")
        }
        var formData = $("#subscribe").serialize() ;
        var url = "/subscribe" ;
        $.ajax({
            type: "POST",
            url: url,
            data: formData ,
            success: function (response) {
                if ( response.success ) {
                     $("#response").text(response.message).addClass("text text-success").removeClass("text text-danger")
                     $("#response").fadeIn(3000,'swing',function () {
                         $("#subemail").val("")
                     })

                } else {
                    $("#response").text(response.message).addClass("text text-danger").removeClass("text text-success")
                    $("#response").fadeIn(3000,'swing',function () {
                        $("#subemail").val("")
                    })
                }




            }
        });

    })


});
