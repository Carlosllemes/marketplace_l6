$('.btn-danger').on('click', function (e){
    e.preventDefault();
    let el = $(this);

    $.ajax({
        url: window.location.origin + '/admin/products/delete/' +  el.data('name'),
        type:'GET',
        success: function(result){
            el.parent().remove();
        },
        error: function(){console.log('error')},
    })
})
