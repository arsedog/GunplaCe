<?php

function getLogin($conn) {
    if (isset($_POST['loginSubmit'])) {
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];


        $sql = "SELECT * FROM user WHERE uid='$uid' and pwd='$pwd'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0){
            if ($row = $result->fetch_assoc()){
                $_SESSION['id'] = $row['id'];
                header("Refresh:0");
                exit();
            }
        } else {
            header("Refresh:0");
            exit();
        }
    }
}

function userSignUp($conn){
    if (isset($_POST['signUpSubmit'])) {
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];

        $sql = "SELECT id FROM user WHERE uid = '$uid' OR email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0){
            $sql = "INSERT INTO user (uid, pwd, email) VALUES ('$uid', '$pwd', '$email')";
            $result = $conn->query($sql);
            header("Refresh:0");
            exit();
        } else {
            header("Refresh:0");
            exit();
        }
    }
}

function userLogout() {
    if (isset($_POST['logoutSubmit'])) {
        session_start();
        session_destroy();
        header("Refresh:0");
        exit();
    }
}