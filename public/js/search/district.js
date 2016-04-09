/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */

$(document).ready(function () {
    $.ajax({
        url: "/api/v1/districts/list",
        cache: true,
        success: function (response) {
            var response = jQuery.parseJSON(response);
            console.log(response.data);
            $("#districts").select2({
                data: response.data
            })
        }

    });
});

