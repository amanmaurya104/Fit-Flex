<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit & Flex | Home</title>    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<!--

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
} else {
    echo "<h1>Welcome, " . htmlspecialchars($_SESSION['user']) . "!</h1>";
}
-->

<nav>
    <div class="logo">
        <img src="images/logo.png" alt="Fit N' Flex Logo">
    </div>
    <div class="menu-button" id="menu-button">
        <i class="fas fa-bars"></i>
    </div>
    <ul class="navbar" id="navbar">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#workout-plans">Workout Plans</a></li>
        <li><a href="login.php">Nutrition & Diet</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <button id="start-recognition">Start Voice Assistant</button>
        <li><a href="login.php" class="login-btn">Login</a></li>
        <li><a href="singup.php" class="register-btn">Register</a></li>
    </ul>
</nav>

<!-- Hero Section -->
<section id="home" class="hero">
    <div class="hero-text">
        <h1>Unleash Your Potential with Fit & Flex</h1>
        <p>Custom Workout Plans and Nutritional Guidance</p>
        <a href="#workout-plans" class="cta-btn">Start Your Journey</a>
    </div>
</section>

<!-- Workout Categories -->
<section id="workout-plans" class="workout-categories">
    <h2>Workout Categories</h2>
    <div class="categories-grid">
        <div class="category">
            <div class="icon">
                <img src="images/bicep-tricep.png" alt="Biceps & Triceps">
            </div>
            <h3><a href="biceps-triceps.php">Biceps & Triceps</a></h3>
            <p>Strengthen your arms with targeted workouts</p>
        </div>
        <div class="category">
            <div class="icon">
                <img src="images/legs.png" alt="Legs">
            </div>
            <h3><a href="Legs.php">Legs</a></h3>
            <p>Develop strength and mobility for your lower body</p>
        </div>
        <div class="category">
            <div class="icon">
                <img src="images/back-shoulders.png" alt="Back & Shoulders">
            </div>
            <h3><a href="Back.php">Back & Shoulders</a></h3>
            <p>Build a powerful upper body</p>
        </div>
        <div class="category">
            <div class="icon">
                <img src="images/chest.png" alt="Chest">
            </div>
            <h3><a href="Chest.php">Chest</a></h3>
            <p>Work your pectorals and upper body strength</p>
        </div>
        <div class="category">
            <div class="icon">
                <img src="images/core-abs.png" alt="Core & Abs">
            </div>
            <h3><a href="Core.php">Core & Abs</a></h3>
            <p>Sculpt and tone your midsection</p>
        </div>
        <div class="category">
            <div class="icon">
                <img src="images/full-body.png" alt="Full-Body Workouts">
            </div>
            <h3><a href="Full Body.php">Full-Body Workouts</a></h3>
            <p>Engage multiple muscle groups</p>
        </div>
        <div class="category">
            <div class="icon">
                <img src="images/cardio-hiit.png" alt="HIIT & Cardio">
            </div>
            <h3><a href="Hiit.php">HIIT & Cardio</a></h3>
            <p>Burn fat and improve endurance</p>
        </div>
        <div class="category">
            <div class="icon">
                <img src="images/yoga-flexibility.png" alt="Yoga & Flexibility">
            </div>
            <h3><a href="Yoga.php">Yoga & Flexibility</a></h3>
            <p>Increase flexibility and mental clarity</p>
        </div>
        <div class="category">
            <div class="icon">
                <img src="images/custom-plans.png" alt="Custom Plans">
            </div>
            <h3><a href="Plan.php">Custom Plans</a></h3>
            <p>Personalized plans for your fitness goals</p>
        </div>
    </div>
</section>

<!-- Nutrition Section -->
<section id="nutrition" class="nutrition-section">
    <h2>Nutrition & Diet</h2>
    <div class="nutrition-content">
        <div class="icon">🍎</div>
        <p>Fuel your body with the right nutrition to maximize workout results. Explore personalized diet plans tailored to your goals.</p>
    </div>
</section>

<div id="footer"></div>

<script>
    document.getElementById("header").innerHTML = fetch('header.html')
      .then(response => response.text())
      .then(data => document.getElementById("header").innerHTML = data);
  
    document.getElementById("footer").innerHTML = fetch('footer.html')
      .then(response => response.text())
      .then(data => document.getElementById("footer").innerHTML = data);
</script>

<script>
    const menuButton = document.getElementById('menu-button');
    const navbar = document.getElementById('navbar');

    menuButton.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });

    // Check if the browser supports SpeechRecognition
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (SpeechRecognition) {
        const recognition = new SpeechRecognition();
        recognition.lang = 'en-US';
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;

        // Start recognition on page load
        recognition.start();

        recognition.onresult = function(event) {
            const voiceCommand = event.results[0][0].transcript.toLowerCase();
            console.log('Voice Command:', voiceCommand);

            // Redirect to the respective pages based on the voice command
            if (voiceCommand.includes('chest')) {
                window.location.href = 'Chest.php';
            } else if (voiceCommand.includes('biceps') || voiceCommand.includes('triceps')) {
                window.location.href = 'biceps-triceps.php';
            } else if (voiceCommand.includes('legs')) {
                window.location.href = 'Legs.html';
            } else if (voiceCommand.includes('back') || voiceCommand.includes('shoulders')) {
                window.location.href = 'Back.php';
            } else if (voiceCommand.includes('core') || voiceCommand.includes('abs')) {
                window.location.href = 'Core.php';
            } else if (voiceCommand.includes('full body')) {
                window.location.href = 'Full Body.php';
            } else if (voiceCommand.includes('cardio') || voiceCommand.includes('hiit')) {
                window.location.href = 'Hiit.php';
            } else if (voiceCommand.includes('yoga') || voiceCommand.includes('flexibility')) {
                window.location.href = 'Yoga.php';
            } else if (voiceCommand.includes('custom plans') || voiceCommand.includes('plans')) {
                window.location.href = 'Plan.php';
            } else {
                console.log('No matching page for the command:', voiceCommand);
            }
        };

        recognition.onspeechend = function() {
            recognition.stop();
        };

        recognition.onerror = function(event) {
            console.log('Error occurred in recognition:', event.error);
        };
    } else {
        console.log("Your browser does not support voice recognition.");
    }
</script>

</body>
</html>
