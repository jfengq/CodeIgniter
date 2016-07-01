$('#prev').on('click', function () {
    var currentPage = window.location.href.split('/').pop();

    if (currentPage > 0) {
        currentPage = currentPage - 1;
    }
    window.location.href = currentPage + '';
});

$('#next').on('click', function () {
    var currentPage = window.location.href.split('/').pop();

    currentPage = +currentPage + 1;
    window.location.href = currentPage + '';
});

