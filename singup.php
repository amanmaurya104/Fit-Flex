<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit & Flex | Home</title>    
    <link rel="stylesheet" href="login&register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<nav>
    <div class="logo">
        <img src="images/logo.png" alt="Fit N' Flex Logo">
    </div>
    <div class="menu-button" id="menu-button">
        <i class="fas fa-bars"></i>
    </div>
    <ul class="navbar" id="navbar">
        <li><a href="index.html">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#workout-plans">Workout Plans</a></li>
        <li><a href="Diet.html">Nutrition & Diet</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <!-- Add Login and Signup buttons 
        <li><a href="login.html" class="login-btn">Login</a></li>
        <li><a href="register.html" class="Register-btn">Register</a></li> -->
    </ul>
</nav>

<div class="form-container">
<?php
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        // Split name into first and last names
        $fullName = $_POST['name'];
        $nameParts = explode(" ", $fullName);
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) ? $nameParts[1] : '';  // If no last name is given, set it as an empty string
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        // Removed password hashing
        $errors = array();

        // Validate form fields
        if (empty($firstName) || empty($email) || empty($password) || empty($confirm_password)) {
            array_push($errors, "All fields are required");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email format");
        }

        if (strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 characters long");
        }

        if ($password !== $confirm_password) {
            array_push($errors, "Passwords do not match");
        }

        require_once 'database.php';

        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            array_push($errors, "Email already exists");
        }

        // Display errors if any exist
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            // Include database connection

            // Check if the connection was successful
            if ($conn->connect_error) {
                die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
            }

            // Prepare the SQL statement (now using 'user' table)
            $sql = "INSERT INTO user (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Check if the statement preparation was successful
            if ($stmt === false) {
                die("<div class='alert alert-danger'>Error preparing statement: " . $conn->error . "</div>");
            }

            // Bind the parameters (firstName, lastName, email, password)
            $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);  // No more password_hash

            // Execute the statement
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Registration successful! You can now <a href='login.php'>login</a>.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }

            // Close the statement
            $stmt->close();
        }
    }
?>

    <img src="images\logo.png" alt="Fit N' Flex Logo" class="logo">
    <h1>Create Your Account</h1>
    <form action="singup.php" method="POST">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn">Sign Up</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
    
</div>    <!-- Footer -->
    <footer>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">FAQ</a>
            <a href="#">Contact Us</a>
        </div>
        <p>© 2024 Fit & Flex. All rights reserved.</p>
    </footer>

    <script>
        const menuButton = document.getElementById('menu-button');
        const navbar = document.getElementById('navbar');

        menuButton.addEventListener('click', () => {
            navbar.classList.toggle('active');
        });
    </script>

</body>
</html>
