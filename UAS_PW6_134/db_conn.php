<?php

$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "tsuki";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}

// melakukan koneksi ke server MySQL dan membuat koneksi ke basis data.