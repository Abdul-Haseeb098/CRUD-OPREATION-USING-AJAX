<?php
include "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Simple validation
    if ($password !== $cpassword) {
        echo 'Passwords do not match';
        exit;
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE haseeb SET fname=?, uname=?, email=?, number=?, password=? WHERE id=?");
    $stmt->bind_param("sssssi", $fname, $uname, $email, $number, $password, $id);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
}
?>
