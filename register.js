$(document).ready(function () {
    $(document).on('click', 'button#login', function (event) {
        event.preventDefault();
        window.location.href = '../login';
    });

    $(document).on('click', 'form.register button#sign_up', function (event) {
        event.preventDefault();

        $form = $('form.register');
        var userName = $form.find('input#user_name').val();
        var firstName = $form.find('input#first_name').val();
        var lastName = $form.find('input#last_name').val();
        var email = $form.find('input#email_address').val();
        var cellNum = $form.find('input#cell_num').val();
        var password = $form.find('input#password').val();
        var confirmPassword = $form.find('input#confirm_password').val();


        if (password != confirmPassword) {
            $.ajax({
                url: 'error.php',
                method: 'GET',
                success: function(response) {
                    $('#output').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });

        } else {
            const dbInsertData = [userName, firstName, lastName, email, cellNum, password];
            callProcedure(dbInsertData);
        }

        //window.location.href = '../login/login.html';
    });
});

function callProcedure(dbInsertData) {
    var xhr = new XMLHttpRequest();
    var url = 'db.php';
    var params = '';
    for (let i = 0; i < dbInsertData.length; i++) {
        params += 'param' + i + '=' + encodeURIComponent(dbInsertData[i]);
    }

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            console.log('Procedure result:', response);
            // Process response data as needed
        } else {
            console.error('Error calling procedure:', xhr.statusText);
            // Handle error scenario
        }
    };

    xhr.onerror = function () {
        console.error('Network error.');
        // Handle network errors
    };

    xhr.send(params);
};