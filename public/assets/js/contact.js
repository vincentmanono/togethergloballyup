$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $("#contactus").on("submit", e => {
        e.preventDefault();
        //Validation before submit
        $(".text-response").css('color',"yellow").text("Sending...")
        $("#btnSubmit").attr("disabled", true);
        var data = $("#contactus").serialize() ;

        $.ajax({
            type: "POST",
            url: "/contact",
            data: data ,
            success: function (response) {
                $(".text-response").css('color',"green").html(response.message)
                $("#btnSubmit").attr("disabled", false);

                $('input[type="text"],input[type="email"], ,textarea').val('');

            }
        });

    });
});
