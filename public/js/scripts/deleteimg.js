
function deleteAjax (selector, path, dataType){
$(selector).on('click', function (e){
    e.preventDefault();
    let el = $(this);

    el.children().toggleClass('fa-trash fa-spinner').addClass('fa-spin');


    $.ajax({
        url: window.location.origin + path +  el.data(dataType),
        type:'GET',
        success: function(){
            el.parent().fadeOut('slow', function (){
                $(this).remove()
            });
        },
        error: function(e){console.log(e)},
    })
})
}

deleteAjax('.btn-danger', '/admin/products/delete/', 'name');
