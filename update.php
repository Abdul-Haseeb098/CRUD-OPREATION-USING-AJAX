<?php
include "database.php";
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the current data of the record
$query = "SELECT * FROM haseeb WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Record not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">Update Record</div>
        <form method="POST" id="form" autocomplete="off">
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Full Name</span>
                    <input type="text" name="fname" id="fname" placeholder="E.g: John Smith" value="<?= htmlspecialchars($row['fname']) ?>" oninput="hideError('fnameError')">
                    <span id="fnameError" class="error"></span>
                </div>
                <div class="input__box">
                    <span class="details">Username</span>
                    <input type="text" name="uname" id="uname" placeholder="johnWC98" value="<?= htmlspecialchars($row['uname']) ?>" oninput="hideError('unameError')">
                    <span id="unameError" class="error"></span>
                </div>
                <div class="input__box">
                    <span class="details">Email</span>
                    <input type="email" name="email" id="email" placeholder="johnsmith@hotmail.com" value="<?= htmlspecialchars($row['email']) ?>" oninput="hideError('emailError')">
                    <span id="emailError" class="error"></span>
                </div>
                <div class="input__box">
                    <span class="details">Phone Number</span>
                    <input type="number" name="number" id="number" placeholder="012-345-6789" value="<?= htmlspecialchars($row['number']) ?>" oninput="hideError('numberError')">
                    <span id="numberError" class="error"></span>
                </div>
                <div class="input__box">
                    <span class="details">Password</span>
                    <input type="password" name="password" id="password" value="<?= htmlspecialchars($row['password']) ?>"  placeholder="********" oninput="hideError('passwordError')">
                    <span id="passwordError" class="error"></span>
                </div>
                <div class="input__box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="cpassword" id="cpassword" value="<?= htmlspecialchars($row['cpassword']) ?>" placeholder="********" oninput="hideError('cpasswordError')">
                    <span id="cpasswordError" class="error"></span>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $row['id'] ?>"> <!-- Hidden input for ID -->
            <div class="button">
                <input type="submit" value="Update">
            </div>
            <div class="msg"></div>
            <div class="records"><a href="table.php" id="records">See Records</a></div>
        </form>
    </div>
    <div class="loader" style="display: none;">
        <img src="loader.gif" alt="Loading...">
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById("records").style.display = "none";

        function hideError(id) {
            document.getElementById(id).innerHTML = "";
        }

        // Show and hide loader
        function showLoader() {
            $(".loader").show();
        }

        function hideLoader() {
            $(".loader").hide();
        }

        function clearErrors() {
            $(".error").html("");
        }

        function addRecord(event) {
            event.preventDefault();

            var fname = $("#fname").val();
            var uname = $("#uname").val();
            var email = $("#email").val();
            var number = $("#number").val();
            var password = $("#password").val();
            var cpassword = $("#cpassword").val();
            var id = $("input[name='id']").val(); 
            var isValid = true;
            clearErrors();

            if (fname.length < 3) {
                document.getElementById("fnameError").innerHTML = "Full Name must be at least 3 characters!";
                isValid = false;
            }
            if (uname.length < 3) {
                document.getElementById("unameError").innerHTML = "Username must be at least 3 characters!";
                isValid = false;
            }

            // Validate email
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === "" || !emailPattern.test(email)) {
                document.getElementById("emailError").innerHTML = "Please enter a valid email address!";
                isValid = false;
            }

            // Validate phone number
            var phonePattern = /^\d{10,}$/;
            if (number === "" || !phonePattern.test(number)) {
                document.getElementById("numberError").innerHTML =
                    "Please enter a valid phone number with at least 10 digits!";
                isValid = false;
            }

            // Validate password
            if (password.length < 6) {
                document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters!";
                isValid = false;
            }
            if (cpassword.length < 6) {
                document.getElementById("cpasswordError").innerHTML = "Password must be at least 6 characters!";
                isValid = false;
            }

            // Validate confirm password
            if (cpassword !== password) {
                document.getElementById("cpasswordError").innerHTML = "Passwords do not match!";
                isValid = false;
            }

            if (isValid) {
                showLoader();
                setTimeout(function() {
                    $.ajax({
                        type: "POST",
                        url: "update_backend.php",
                        data: {
                            id: id,
                            fname: fname,
                            uname: uname,
                            email: email,
                            number: number,
                            password: password,
                            cpassword: cpassword
                        },
                        success: function(data, status) {
                            clearErrors();
                            $(".msg").html("Your record is updated successfully!").css("color", "green");
                            document.getElementById("records").style.display = "block";

                            // Reset form after successful submission
                            $("#form")[0].reset();
                        },
                        complete: function() {
                            
                            hideLoader();
                        }
                    });
                }, 2000);
            }
        }

        $(document).ready(function() {
            // Handle form submission
            $("#form").on('submit', addRecord);
        });
    </script>
</body>
</html>
