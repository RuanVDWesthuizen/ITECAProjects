$(document).ready(function () {
    $(document).on('click', 'button#categories', function (event) {
        event.preventDefault();
        window.location.href = '../main';
    });

    $(document).on('click', 'form.login button#register', function (event) {
        event.preventDefault();
        console.log('Button Register clicked!');
        window.location.href = '../register.php';
    });

    $(document).on('click', 'form.login button#submit_user', function (event) {
        event.preventDefault();
        // check if exists, if yes, then go ahead

        fetch('addorder.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                // Handle response from server
                console.log(data); // Log the response for debugging

                // Example: Display success message to user
                if (data.success) {
                    var userID = data.userID

                    fetch('setSession.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ userID: userID })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                console.log('Session variable set successfully');
                            } else {
                                console.error('Error setting session variable:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            })
            .catch(error => {
                console.error('Error inserting order:', error);
                // Handle error condition
            });
        //Go to main menu
        window.location.href = '../main';
    });

});
