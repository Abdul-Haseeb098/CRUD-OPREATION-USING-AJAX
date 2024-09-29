<?php
$conn = mysqli_connect("localhost","root","","haseeb");
extract($_POST);
if (isset($fname) &&isset($uname) && isset($number) && isset($email) && isset($password) && isset($cpassword)) {
    $query = "INSERT INTO `haseeb` (`fname`,`uname`,`email`,`number`, `password`,`cpassword`) VALUES ('$fname','$uname','$email','$number', '$password','$cpassword')";
    mysqli_query($conn,$query);
}

mysqli_close($conn);

