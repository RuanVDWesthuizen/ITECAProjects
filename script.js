$(document).ready(function () {
    $(document).on('click', 'button#search-all', function (event) {
        event.preventDefault();
        window.location.href = '../main';
    });
});


function callProcedure() {
    var param1 = 'value1'; // Example parameter value
    // Adjust parameters as needed

    // AJAX request
    var xhr = new XMLHttpRequest();
    var url = 'callProcedure.php';
    var params = 'param1=' + encodeURIComponent(param1); // Encode parameters

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
}
