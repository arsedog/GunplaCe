<?php

$conn = mysqli_connect('localhost', 'root', '', 'mangalogger');

if (!$conn){
    die("Connection failed! ".mysqli_connect_error());
}