$(document).ready(function() {

    $('.delete-product-btn').click(function() {
        var id = $(this).val();
        $('#delete-modal').modal('show');
        $('#delete-id').val(id);
    });
    $('.inc-button').click(function() {
        var qty = $('.cart-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            $('.cart-qty').val(value);
        }
    });
    $('.dec-button').click(function() {
        var qty = $('.cart-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $('.cart-qty').val(value);
        }
    });
    $('.onlyone').on('change', function() {
        $('.onlyone').not(this).prop('checked', false);  
    });
    $('.bkash-payment-btn').click(function() {
        $('#bkash-popup').modal('show');
    });
    $('.payment-guide').click(function() {
        $('#guideline').modal('show');
    });
});