<?php
include "database.php";

// Check if 'id' is set in the POST request
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the DELETE query
    $query = "DELETE FROM haseeb WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind the 'id' parameter to the statement
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            // Check if any rows were affected
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo 'success'; // Return success message
            } else {
                echo 'error'; // Record not found or couldn't be deleted
            }
        } else {
            echo 'error'; // Query execution failed
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo 'error'; // Failed to prepare the statement
    }
} else {
    echo 'error'; // ID not set in POST request
}

// Close the database connection
mysqli_close($conn);
?>
