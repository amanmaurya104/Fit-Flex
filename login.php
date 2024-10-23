<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ensure email and password are received
    if (empty($email) || empty($password)) {
        echo "Email or Password is empty!";
    } else {
        require_once 'database.php';

        // Fetch the user from the database using the email
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $storedPassword = $user['password']; // Plain text password from the database

            // Compare the plain text passwords directly
            if ($password === $storedPassword) {
                $_SESSION['user'] = $user['firstName']; // Set session variable
                header("Location: home.php"); // Redirect to index.html after successful login
                exit();
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "No user found with that email.";
        }

        $stmt->close();
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit & Flex | Login</title>    
    <link rel="stylesheet" href="login&register.css">
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
        <li><a href="login.php" class="login-btn">Login</a></li>
        <li><a href="singup.php" class="register-btn">Register</a></li>
    </ul>
</nav>

<div class="form-container">
    <img src="images/logo.png" alt="Fit N' Flex Logo" class="logo">
    <h1>Login to Fit N' Flex</h1>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="login" class="btn">Login</button>
        <p>Don't have an account? <a href="register.html">Sign Up</a></p>
    </form>
</div>

<!-- Footer -->
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
