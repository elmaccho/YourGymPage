$(document).ready(function() {
    $('.cart-update').on('click', function() {
        var productId = $(this).data('product-id');
        // Wykonaj dowolne działania związane z aktualizacją koszyka na podstawie productId
        console.log('Zaktualizuj koszyk dla produktu o ID: ' + productId);
    });
});