<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
// set variabel $_SESSION['id'] dan $_SESSION['user_name']

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
// validasi data yang dikirimkan melalui form sebelum disimpan ke database

    if (empty($uname)) {
        header("Location: login.php?error=Username is required");
        exit();
    }else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
    }else {
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);
// Jika jumlah baris dari hasil query adalah 1, maka akan melakukan validasi data yang dikirimkan.
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // mengambil baris hasil query dan mengembalikannya
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: admin.php");
                exit();
            }else{
                header("Location: login.php?error=Incorrect Username or Password");
                exit();
            }
        }else{
            header("Location: login.php?error=Incorrect Username or Password");
            exit();
        }
    }
}else {
    header("Location: login.php");
    exit();
}