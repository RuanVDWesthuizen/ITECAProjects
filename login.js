$(document).ready(function () {
    $(document).on('click', 'form.login button#submit_user', function (event) {
        event.preventDefault();
        console.log('Button login, moving to main page clicked!');
        window.location.href = '../main';

    });

    $(document).on('click', 'form.login button#register', function (event) {
        event.preventDefault();
        console.log('Button Register clicked!');
        window.location.href = '../register';
    });
});
