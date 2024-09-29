<?php
include "database.php";
$query = "SELECT * FROM haseeb";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Table</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            font-family: sans-serif;
        }
        body {
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }
        .table-container {
            max-height: 600px; /* Set the height you want */
            overflow-y: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            height: 1200px;
            border-collapse: collapse;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            margin: 0 auto;
            background-color: #f5f5f5;
            padding: 20px;
        }
        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        .back {
            position: absolute;
            right: 20px;
            top: 25px;
            text-decoration: none;
            color: #fff;
            padding: 5px 25px;
            background-color: #007bff;
            border-radius: 20px;
        }
        .delete-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: red;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .update-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4CAF50;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            line-height: 100vh;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Records</h1>
        <a href="index.php" class="back" onclick="showLoader_1()">Back to Registration</a>
        <div class="table-container">
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Password</th>
                        <th>Confirm Password</th>
                        <th>Action</th> <!-- New column for delete button -->
                    </tr>
                </thead>
                <tbody id="recordTable">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr id="row_<?= $row['id'] ?>">
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['fname']) ?></td>
                                <td><?= htmlspecialchars($row['uname']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['number']) ?></td>
                                <td><?= htmlspecialchars($row['password']) ?></td>
                                <td><?= htmlspecialchars($row['cpassword']) ?></td>
                                <td>
                                    <!-- AJAX Delete button -->
                                    <button class="delete-btn" data-id="<?= $row['id'] ?>"><i class="fa-solid fa-trash"></i></button>
                                   <!-- update btn -->
                                     <button class="update-btn" data-id="<?= $row['id']?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                   <!-- end update btn -->
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Loader -->
    <div class="loader">
        <img src="loader.gif" alt="Loading...">
    </div>

    <script>

function showLoader_1() {
            $(".loader").show();
        }

        function hideLoader_1() {
            setTimeout(function() {
                $(".loader").hide();
            }, 2000); // Hide loader after 1 second
        }

        // Show and hide loader
        function showLoader() {
            $(".loader").show();
        }

        function hideLoader() {
            setTimeout(function() {
                $(".loader").hide();
            }, 1000); // Hide loader after 1 second
        }

        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id'); // Get the ID from the data-id attribute
            var confirmation = confirm("Are you sure you want to delete this record?");
        
            if (confirmation) {
                showLoader();
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: { id: id }, 
                    success: function(data) {
                        if (data == 'success') {
                            // Remove the table row
                            $('#row_' + id).remove();
                        } else {
                            alert('Failed to delete the record.');
                        }
                        hideLoader(); // Ensure loader is hidden after 1 second
                    },
                    error: function() {
                        alert('An error occurred.');
                        hideLoader(); // Ensure loader is hidden after 1 second
                    }
                });
            }
        });
        $(document).on('click', '.update-btn', function() {
            var id = $(this).data('id');
            window.location.href = 'update.php?id=' + id; // Redirect to update form
        });
    </script>
</body>
</html>
