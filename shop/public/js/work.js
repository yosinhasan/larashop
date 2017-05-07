$(function () {
    $('select[name="orderStatus"]').change(function () {
        var url = $('input[name="url"]').val();
        var id = $(this).val();
        url += '?status_id=' + id;
        document.location = url;
    });
    $('select[name="userAction"]').change(function () {
        var url = $('input[name="userUrl"]').val();
        var id = $(this).val();
        url += '?action=' + id;
        document.location = url;
    });

});
setTimeout(function () {
    $('.alert').hide(1000);
}, 1000)