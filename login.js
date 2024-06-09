$(document).ready(function () {
    $(document).on('click', 'button#categories', function (event) {
        event.preventDefault();
        window.location.href = '../main';
    });

    $(document).on('click', 'form.login button#submit_user', function (event) {
        event.preventDefault();
        console.log('Button Register clicked!');
        // check if exists, if yes, then go ahead

        //Go to main menu
        window.location.href = '../main';
    });

    $(document).on('click', 'form.login button#register', function (event) {
        event.preventDefault();
        console.log('Button Register clicked!');
        window.location.href = '../register';
    });
});
