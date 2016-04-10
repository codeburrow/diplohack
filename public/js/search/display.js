/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */

$(document).ready(function () {
    var term = 'f';
    $.ajax({
        url: "/api/v1/funds/search?term=" + term,
        cache: true,
        success: function (request) {

            var response = jQuery.parseJSON(request);
            console.log(response);

            $("#categories").select2({
                data: response.data
            })
        }
    });
});

