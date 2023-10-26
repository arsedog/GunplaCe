<?php

function addItem($conn){
    if (isset($_POST['addItem'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $series = $_POST['series'];
        $info = $_POST['info'];

        if ($_FILES["image"]["error"] === 4){
            echo
            "<script>alert('Image does not exist');</script>";
        } else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));


            if(!in_array($imageExtension, $validImageExtension)){
                echo
                "<script>alert('Invalid image extension');</script>";
            }
            else if($fileSize > 1000000){
                echo
                "<script>alert('Invalid image size');</script>";
            }
            else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpName, '../img/' . $newImageName);

                $sql = "SELECT * FROM manga WHERE name = '$name'";
                $result = $conn->query($sql);

                if ($result->num_rows == 0){
                    $sql = "INSERT INTO manga (name, price, series, info, image_url) VALUES ('$name', '$price', '$series', '$info', '$newImageName')";
                    mysqli_query($conn, $sql);
                    header("Refresh:0");
                    exit();
                } else {
                    header("Refresh:0");
                    exit();
                }
            }
        }
    }
}

function wishlist($conn, $mangaid, $what){
    if (isset($_POST['addWishlist-'.$mangaid])) {
        $sql = "SELECT * FROM collected WHERE userid = '".$_SESSION['id']."' AND mangaid = '$mangaid'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0){
            $sql = "INSERT INTO collected (userid, mangaid, wishlist) VALUES ('".$_SESSION['id']."', '$mangaid', $what)";
            mysqli_query($conn, $sql);
            header("Refresh:0");
            exit();
        } else {
            $sql = "UPDATE collected SET wishlist = '$what' WHERE collected.mangaid = '$mangaid' AND collected.userid = '".$_SESSION['id']."'";
            mysqli_query($conn, $sql);
            header("Refresh:0");
            exit();
        }
    }
}

function owned($conn, $mangaid, $what){
    if (isset($_POST['addOwned-'.$mangaid])) {
        $sql = "SELECT * FROM collected WHERE userid = '".$_SESSION['id']."' AND mangaid = '$mangaid'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0){
            $sql = "INSERT INTO collected (userid, mangaid, owned) VALUES ('".$_SESSION['id']."', '$mangaid', $what)";
            mysqli_query($conn, $sql);
            header("Refresh:0");
            exit();
        } else {
            $sql = "UPDATE collected SET owned = '$what' WHERE collected.mangaid = '$mangaid' AND collected.userid = '".$_SESSION['id']."'";
            mysqli_query($conn, $sql);
            header("Refresh:0");
            exit();
        }
    }
}

function addToShoppingCart($conn, $mangaid){
    if (isset($_POST['addToShoppingCart-'.$mangaid])) {

    }
}