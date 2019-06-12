/**
 * Created by Mlak on 5/31/2019.
 */
(function () {
    var options = {
        url_list: $('#url-list').attr('href'),
        url_get: $('#url-get').attr('href'),
        otherOptions: {
            minimumInputLength: 2,
            theme: 'boostrap',
            formatNoMatches: 'No records found.',
            formatSearching: 'Searching ...',
            formatInputTooShort: 'Insert at least 2 character'
        }
    };
    $('#appbundle_bordereausalle_film').autocompleter(options);
    // following lines are only for "add new" feature. See README.
    // modalForm('book');
    // var $addNew = $('<a>').text('insert new').attr('class', 'btn btn-xs btn-success ajax-modal').attr('href', $('#url-new').attr('href'));
    // $('label[for="book_author"]').after($addNew).after(' ');
}());
