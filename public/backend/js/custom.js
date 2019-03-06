$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.btn-remove-user').click(function (e) {
    e.preventDefault();
    let tr = $(e.target).parents('tr');
    let id = tr.attr('data-id');
    $.post("/admin/users/" + id,
    {
        id: id,
        _method: 'DELETE'
    },
    function(data, status){
        if (data.status)
            tr.remove();
        else
            console.log(data);
    });
});

$('.btn-remove-comment').click(function (e) {
    e.preventDefault();
    let tr = $(e.target).parents('tr');
    let id = tr.attr('data-id');
    $.post("/admin/comments/" + id,
        {
            id: id,
            _method: 'DELETE'
        },
        function(data, status){
            if (data.status)
                tr.remove();
            else
                console.log(data);
        });
});

$('.btn-remove-new').click(function (e) {
    e.preventDefault();
    let tr = $(e.target).parents('tr');
    let id = tr.attr('data-id');
    $.post("/admin/news/" + id,
        {
            id: id,
            _method: 'DELETE'
        },
        function(data, status){
            if (data.status)
                tr.remove();
            else
                console.log(data);
        });
});

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.preview-img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$('#thumbnail').change(function () {
    readURL(this);
});

$('#triggerUpload').click(function (e) {
    e.preventDefault();
    $('#thumbnail').trigger('click');
});
