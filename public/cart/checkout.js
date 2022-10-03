// Check out Form::
function checkOutAction() {
    let urlRequest = $(this).data('url');
    alert('123');
}

$(function (){
    $(document).on('click', '.check-out-click', checkOutAction);
});
