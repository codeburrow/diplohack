/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */

$(document).ready(function () {
    // on input pressed
    $('input[name=searchterm]').keyup(function () {
        var term = this.value;

        $.ajax({
            url: "/api/v1/funds/search?term=" + term,
            cache: true,
            success: function (request) {
                var response = jQuery.parseJSON(request);

                var funds = response.data;

                $("#funds-table").empty();

                $.each(funds, function (i, item) {
                    console.log(item);
                    var fund = $('<tr>').append(
                        $('<td>').text(item.rank),
                        $('<td>').text(item.content),
                        $('<td>').text(item.UID)
                    );
                    $("#funds-table").append(fund);
                });

            }
        });
    });

    // delete table rows
    // foreach data row
    // create row with data


});

