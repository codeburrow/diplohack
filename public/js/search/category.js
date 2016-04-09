/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */

$(document).ready(function () {
    $.ajax({
        url: "/api/v1/categories/list",
        cache: true,
        success: function (request) {

            var response = jQuery.parseJSON(request);

            $("#categories").select2({
                data: response.data
            })
        }
    });
});

