$('.btndelete').click(function(ev) {
    ev.preventDefault();
    var _href = $(this).attr('href');
    $('form#form-delete').attr('action', _href);
    if (confirm('Bạn Có Chắc Muốn Xóa Không ?')) {
        $('form#form-delete').submit();
    }
})