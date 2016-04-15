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
                    var urls = '';

                    for (var index = 0; index < item.urls.length; index++) {
                        urls = urls + item.urls[index]+ '<br/>';
                    }

                    var fund = $('<tr>').append(
                        $('<td>').text(i + 1).data('rowspan', 3),
                        $('<td>').text('Title'),
                        $('<td>').text(item.title),
                        $('<td>').text('Description'),
                        $('<td>').text(item.content),
                        $('<td>').text('Urls'),
                        $('<td>').append(urls)
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

