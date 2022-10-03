// Update Action
function updateAction(event) {
    event.preventDefault();
    let urlUpdateCart = $(this).data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('tr').find('input.quantity').val();
    //alert(quantity);
    $.ajax({
        type: 'GET',
        url: urlUpdateCart,
        data: {id: id, quantity: quantity },
        success: function (data){
            if(data.code === 200){
                alert('Update cart successfully !')
            }
        },
        error: function () {

        }
    })
}

// Delete Action:
function deleteAction(event) {
    event.preventDefault();
    let urlDeleteCart = $(this).data('url');
    let id = $(this).data('id');
    let that = $(this);
    $.ajax({
        type: 'GET',
        url: urlDeleteCart,
        data: {id: id},
        success: function (data){
            if(data.code === 200){
                that.parent().parent().remove();
                //$('.total_price').html(""); // Still ok
                //$('.total_price').text(""); // ok
                location.reload();
                alert('Delete the product successfully !')
            }
        },
        error: function () {

        }
    })
}
// Clear All Card Action
function deleteAllCartAction(event) {
    event.preventDefault();
    let urlDeleteAllCart = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: urlDeleteAllCart,
        success: function (data){
            if(data.code === 200){
                alert('Clear all cart the product successfully !')
                location.reload();
            }
        },
        error: function () {

        }
    })
}

$(function (){
    $(document).on('click', '.card_update', updateAction);
    $(document).on('click', '.card_delete', deleteAction);
    $(document).on('click', '.delete_all_cart', deleteAllCartAction);
});
