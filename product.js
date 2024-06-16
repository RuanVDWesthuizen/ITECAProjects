$(document).ready(function () {
    $(document).on('click', 'button#add-product', function (event) {
        event.preventDefault();

        //do db shit
        window.location.href = '../main';
    });
});
