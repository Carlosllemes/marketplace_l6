$('.btn-danger').on('click', function (e){
    e.preventDefault();
    let el = $(this);

    el.children().toggleClass('fa-trash fa-spinner').addClass('fa-spin');


    $.ajax({
        url: window.location.origin + '/admin/products/delete/' +  el.data('name'),
        type:'GET',
        success: function(result){

            el.parent().fadeOut('slow', function (){
                $(this).remove()
            });
        },
        error: function(){console.log('error')},
    })
})
