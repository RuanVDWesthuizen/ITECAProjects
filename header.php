<!DOCTYPE html>
<?php
    // Access the session variable
    $userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Project Title</title>
	<!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">

    <!-- general css -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
