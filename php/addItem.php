<?php
date_default_timezone_set('Europe/Stockholm');
include 'connect.php';
include 'login.inc.php';
include 'addItem.inc.php';
session_start();

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add item - GunplaCe</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">GunplaCe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="addItem.php">Add Gundam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="itemPage.php">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profilePage.php">View profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="accountPage.php">Log in/Sign up</a></li>
                        <?php
                        echo "<form method='POST' action='".userLogout()."'><li><button type='submit' style='margin-left: 9%;' name='logoutSubmit' class='btn btn-outline-danger'>Log out</button></li></form>"
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shoppingCart.php">Shopping Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<h1>Add an item</h1>
<?php
    echo "<form id='addItem' method='POST' enctype='multipart/form-data' action='".addItem($conn)."'>
        <div class='mb-3'>
            <label for='gunplaname' class='form-label' >Gunpla Model:</label>
            <input type='text' id='gunplaname' class='form-control' name='name' style='width: 30%'>
        </div>
        <div class='mb-3'>
            <label for='price' class='form-label' >Model avg. price:</label>
            <input type='text' name='price' id='price' class='form-control' style='width: 30%'>
        </div>
        <div class='mb-3'>
            <label for='series' class='form-label' >Gunpla series:</label>
            <input type='text' id='series' name='series' class='form-control' style='width: 30%'>
        </div>
        <div class='mb-3'>
            <label for='info' class='form-label' >A short description:</label>
            <input type='text' name='info' id='info' class='form-control' style='width: 30%'>
        </div>
        <label for='image' class='form-label' >An image:</label>
        <div class='input-group mb-3' style='width: 30%'>
          <input type='file' name='image' id='image' class='form-control' accept='.jpg, .jpeg, .png, .webp' value=''>
          <label class='input-group-text' for='inputGroupFile02'>Upload</label>
        </div>
        <button type='submit' class='btn btn-outline-primary' name='addItem'>Submit</button>
    </form>";
    ?>
</body>
</html>
