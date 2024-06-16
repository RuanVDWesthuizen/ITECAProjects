<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    // Include the header
    include 'header.php';
?>
<div class="text-center">
        <div class="row">
            <div class="company-logo col-md-2">
                <a class="navbar-brand" href="../main.php">
                    <img src="Resources\images\stunningBrands.jpeg" alt="Logo" width="100%" height="38" class="d-inline-block align-top">
                </a>
            </div>
            <div class="col-md-4 btn-group dropdown">
                <button name="categories" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../404.php">CPU's</a></li>
                    <li><a class="dropdown-item" href="../404.php">GPU's</a></li>
                    <li><a class="dropdown-item" href="../404.php">Motherboards</a></li>
                </ul>
            </div>

            <div class="col-md-5 search-bar-and-button">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button id="search-all" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </div>
            <div class="col-md-1 dropdown btn-group">
                <button name="personal" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </button>
                <ul class="dropdown-menu" id="side-menu">
                    <li>
                        <a class="dropdown-item" href="../404.php">Shopping Cart</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="../register.php">Register</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="../login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    <h1> This page is not yet ready for devlopment. </h1>

    <?php
    // Include the footer
    include 'footer.php';
?>
</body>
</html>
