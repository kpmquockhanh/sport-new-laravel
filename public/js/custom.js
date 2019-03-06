$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#vote-this-post').click(function (e) {
    e.preventDefault();
    let id = $(this).attr('data-id');

    $.post('/user/vote/'+id, {
            id: id,
        },
        function (data, status) {
            if (data.status)
            {
                alert('Vote successful!');
            }
        }
    );

});