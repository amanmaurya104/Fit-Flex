<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Body Workouts | Fit N' Flex</title>
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
    <!-- Full Body Workouts Section -->
    <section>
        <div class="workout-section">
            <h2>Full Body Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Squats</strong> - 4 sets of 10-15 reps</p>
                <p>Squats engage multiple muscle groups, making them an excellent compound exercise for the lower body and core.</p>
                <video autoplay loop controls>
                    <source src="videos/33.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: Deadlifts</strong> - 4 sets of 8-10 reps</p>
                <p>Deadlifts target the posterior chain, including the hamstrings, glutes, and lower back, promoting overall strength.</p>
                <video autoplay loop controls>
                    <source src="videos/34.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Push-Ups</strong> - 3 sets of 10-15 reps</p>
                <p>Push-ups are a versatile bodyweight exercise that targets the chest, shoulders, and triceps.</p>
                <video autoplay loop controls>
                    <source src="videos/35.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 4: Bent-Over Rows</strong> - 4 sets of 10 reps</p>
                <p>This exercise effectively works the upper back and biceps, contributing to upper body strength.</p>
                <video autoplay loop controls>
                    <source src="videos/36.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 5: Plank</strong> - 3 sets of 30-60 seconds</p>
                <p>The plank engages the entire core, helping to improve stability and strength throughout the body.</p>
                <video autoplay loop controls>
                    <source src="videos/37.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 6: Lunges</strong> - 4 sets of 10 reps per leg</p>
                <p>Lunges are excellent for building leg strength and improving balance and coordination.</p>
                <video autoplay loop controls>
                    <source src="videos/38.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 7: Burpees</strong> - 3 sets of 8-12 reps</p>
                <p>Burpees are a high-intensity full-body exercise that increases strength and endurance.</p>
                <video autoplay loop controls>
                    <source src="videos/39.mp4" type="video/mp4">
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
