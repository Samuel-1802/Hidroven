$($document).ready(function() {

    $('#bitacora-pagination').twbsPagination({
        visiblePages: 7,
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
        }
    });

});