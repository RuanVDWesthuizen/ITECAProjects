<?php
    $page = $_GET['page'];
    if (isset($page)) {
        $pagePHP = $page . '.php';
        include $pagePHP;
    } else {
        // Default content or homepage
        echo '<h1>Welcome to the Homepage</h1>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="bootstrap.min.css" rel="stylesheet">-->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <nav>
        <a href="login.php"> Proceed to login </a> 
    </nav>
    <title>Home</title>

    <script src="jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>
</html>
