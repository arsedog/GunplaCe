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
    <title>GunplaCe</title>
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


<div class="container px-4 text-center">
    <h4 id="title">Most recent Gunpla added:</h4>
    <div class="row gy-5 gx-5" id="items">
        <?php
        $i = 1;
        $rows = mysqli_query($conn, "SELECT * FROM manga ORDER BY id DESC");
        ?>
        <?php foreach($rows as $row) : ?>
        <div class="col border border-success border-opacity-75" style="margin: 20px">
            <a class="" data-bs-toggle="offcanvas" href="#offcanvas-<?php echo $row['id']; ?>" role="button" aria-controls="offcanvas">
                <img src="../img/<?php echo $row['image_url']; ?>" title="<?php echo $row['image_url']; ?>" class="img" width="200px" style="align-self: center; padding: 10px;" alt="">
            </a>
                <label for='img' class='form-label' ><?php echo $row['name']?></label>
                <label for='img' class='form-label price-label' >¥<?php echo $row['price']?></label>
                <label for='img' class='form-label series-label' ><?php echo $row['series']?></label>
                <?php
                echo "<form method='POST' style='padding: 5px;' action='".wishlist($conn, $row['id'], 1)."'><button type='submit'  name='addWishlist-".$row['id']."' class='btn btn-outline-secondary'>Wishlist</button></form>"
                ?>
                <?php
                echo "<form method='POST' style='padding: 5px;' action='".owned($conn, $row['id'], 1)."'><button type='submit'  name='addOwned-".$row['id']."' class='btn btn-outline-secondary'>Add to Library</button></form>"
                ?>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas-<?php echo $row['id']; ?>" aria-labelledby="offcanvas-<?php echo $row['id']; ?>">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php echo $row['name']?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            <?php echo $row['info']?>
                        </div>
                        <div>
                            <?php
                            echo "<form method='POST' style='padding: 5px;' action='".addToShoppingCart($conn, $row['id'])."'><button type='submit'  name='addToShoppingCart-".$row['id']."' class='btn btn-outline-warning'>Add to shopping cart</button></form>"
                            ?>
                        </div>
                    </div>
                </div>

        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>