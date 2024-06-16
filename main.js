$(document).ready(function () {
    $(document).on('click', 'section.main-page div.product', function (event) {
        event.preventDefault();

        var $product = $(this);
        var productID = $product.attr('data-id');

        window.location.href = `../product.php?id=${productID}`;
        
    });
});