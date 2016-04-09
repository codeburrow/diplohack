/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */

$(document).ready(function () {
    $.ajax({
        url: "/api/v1/districts/list",
        cache: true,
        success: function (request) {

            var response = jQuery.parseJSON(request);

            $("#districts").select2({
                data: response.data
            })
        }
    });
});

