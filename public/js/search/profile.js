/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */

$(document).ready(function () {
    $.ajax({
        url: "/api/v1/profiles/list",
        cache: true,
        success: function (request) {

            var response = jQuery.parseJSON(request);

            $("#profiles").select2({
                data: response.data
            })
        }
    });
});

