// JavaScript source code
$(document).ready(function () {
    console.log("jQuery is working!");
});

document.addEventListener("DOMContentLoaded", function () {
    // Get references to the button and the new page div
    const showPageButton = document.getElementById("showPageButton");
    const newPage = document.getElementById("newPage");

    // Add a click event listener to the button
    showPageButton.addEventListener("click", function () {
        // Show the new page by changing its display style
        newPage.style.display = "block";
    });
});