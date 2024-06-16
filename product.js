$(document).ready(function () {
    $(document).on('click', 'button#add-product', function (event) {
        event.preventDefault();

        var productId = $('form.container.product').attr('id');
        var userID = "<?php echo $userID; ?>";

        if (userID == undefined || userID == null)
            window.location.href = '../login.php';
        // Make POST request to insertOrder.php
        var formData = new FormData();
        formData.append('productId', productId);
        formData.append('userid', userID);

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
                    alert(data.success); // Replace with your UI logic
                } else if (data.error) {
                    alert(data.error); // Replace with your UI logic
                }
            })
            .catch(error => {
                console.error('Error inserting order:', error);
                // Handle error condition
            });

        window.location.href = '../main.php';
    });
});
