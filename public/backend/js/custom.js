$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.btn-remove-user').click(function (e) {
    e.preventDefault();
    let dom = $(e.target);
    let id = dom.parent().attr('data-id');
    console.log(id);
    $.post('/admin/users/destroy', {
        id: id,
        _method: 'DELETE',
        success: res => {
            console.log(res);
            dom.parent('tr').remove();
        },
    })
});