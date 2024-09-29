<?php
$conn = mysqli_connect('localhost', 'root', '', 'haseeb');

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
