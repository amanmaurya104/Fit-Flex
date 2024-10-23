<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIIT Cardio Workouts | Fit N' Flex</title>
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

    <!-- HIIT Cardio Workouts Section -->
    <section>
        <div class="workout-section">
            <h2>HIIT Cardio Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Jumping Jacks</strong> - 30 seconds on, 15 seconds rest (4 rounds)</p>
                <p>Jumping jacks are a classic cardio move that elevates heart rate while engaging multiple muscle groups.</p>

                <video autoplay loop controls>
                    <source src="videos/40.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: High Knees</strong> - 30 seconds on, 15 seconds rest (4 rounds)</p>
                <p>High knees are great for boosting heart rate and improving agility while targeting the core and legs.</p>
                <video autoplay loop controls>
                    <source src="videos/41.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Burpees</strong> - 30 seconds on, 15 seconds rest (4 rounds)</p>
                <p>Burpees are a full-body exercise that combines strength and cardio for a high-intensity workout.</p>
                <video autoplay loop controls>
                    <source src="videos/42.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 4: Mountain Climbers</strong> - 30 seconds on, 15 seconds rest (4 rounds)</p>
                <p>This exercise engages the core and builds endurance, making it an excellent choice for HIIT.</p>
                <video autoplay loop controls>
                    <source src="videos/43.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 5: Squat Jumps</strong> - 30 seconds on, 15 seconds rest (4 rounds)</p>
                <p>Squat jumps are a powerful lower-body exercise that also elevates heart rate and boosts explosive strength.</p>
                <video autoplay loop controls>
                    <source src="videos/44.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 6: Plank Jacks</strong> - 30 seconds on, 15 seconds rest (4 rounds)</p>
                <p>This variation of the plank adds a cardio element while targeting the core, shoulders, and legs.</p>
                <video autoplay loop controls>
                    <source src="videos/45.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 7: Skaters</strong> - 30 seconds on, 15 seconds rest (4 rounds)</p>
                <p>Skaters improve lateral movement and agility, targeting the legs and core while elevating heart rate.</p>
                <video autoplay loop controls>
                    <source src="videos/46.mp4" type="video/mp4">
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
