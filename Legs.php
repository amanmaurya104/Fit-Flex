<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legs Workouts | Fit N' Flex</title>
    <link rel="stylesheet" href="workout.css">
</head>
<body>

    <?php
    session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
} else {
    echo "<h1>Welcome, " . htmlspecialchars($_SESSION['user']) . "!</h1>";
}
    ?>

    <div id="header"></div>

    <!-- Legs Workouts Section -->
    <section>
        <div class="workout-section">
            <h2>Legs Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Squats</strong> - 4 sets of 10 reps</p>
                <p>Squats are a fundamental exercise for building strength in the legs and glutes.</p>
                <video autoplay loop controls>
                    <source src="videos/7.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: Lunges</strong> - 4 sets of 12 reps</p>
                <p>Lunges target the quads, glutes, and hamstrings while improving balance.</p>
                <video autoplay loop controls>
                    <source src="videos/8.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Leg Press</strong> - 3 sets of 10 reps</p>
                <p>The leg press effectively targets the quads, hamstrings, and glutes.</p>
                <video autoplay loop controls>
                    <source src="videos/9.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 4: Deadlifts</strong> - 3 sets of 10 reps</p>
                <p>Deadlifts are excellent for working the hamstrings, glutes, and lower back.</p>
                <video autoplay loop controls>
                    <source src="videos/10.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 5: Calf Raises</strong> - 4 sets of 15 reps</p>
                <p>Calf raises specifically target the calf muscles for improved strength and definition.</p>
                <video autoplay loop controls>
                    <source src="videos/11.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <div class="container">
            <a href="home.php#workout-plans" class="cta-btn">View More Workouts</a>
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
        const workoutSections = document.querySelectorAll('.workout-section');

        workoutSections.forEach(section => {
            section.querySelector('h2').addEventListener('click', () => {
                section.classList.toggle('active');
            });
        });
    </script>

</body>
</html>
