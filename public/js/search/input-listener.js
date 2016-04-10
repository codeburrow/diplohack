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
                    var urls = $.each(item.urls, function (i, item) {
                        console.log(item);
                        urls += $('<tr>').append(
                            $('<td>').text('Link'),
                            $('<td>').append("<a href='#' id='RemoveTier'>Delete tier</a>")
                        );
                    });

                    console.log(urls);


                    var fund = $('<tr>').append(
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

