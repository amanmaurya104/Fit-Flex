<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back & Shoulders Workouts | Fit N' Flex</title>
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
    <!-- Back & Shoulders Workouts Section -->
    <section>
        <div class="workout-section">
            <h2>Back Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Pull-Ups</strong> - 4 sets of 8-10 reps</p>
                <p>Pull-ups are a classic exercise that targets the upper back and biceps, building overall strength.</p>
                <video autoplay loop controls>
                    <source src="videos/12.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: Bent-Over Rows</strong> - 4 sets of 10 reps</p>
                <p>This exercise targets the middle back and helps improve posture and back strength.</p>
                <video autoplay loop controls>
                    <source src="videos/13.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Deadlifts</strong> - 4 sets of 8 reps</p>
                <p>Deadlifts engage multiple muscle groups, primarily focusing on the lower back, glutes, and hamstrings.</p>
                <video autoplay loop controls>
                    <source src="videos/14.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <div class="workout-section">
            <h2>Shoulders Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Overhead Press</strong> - 4 sets of 10 reps</p>
                <p>The overhead press targets the deltoids and is essential for shoulder strength.</p>
                <video autoplay loop controls>
                    <source src="videos/15.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: Lateral Raises</strong> - 3 sets of 12 reps</p>
                <p>Lateral raises focus on the medial deltoids, helping to widen the shoulders.</p>
                <video autoplay loop controls>
                    <source src="videos/16.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Face Pulls</strong> - 3 sets of 12 reps</p>
                <p>Face pulls are great for improving shoulder stability and targeting the rear deltoids.</p>
                <video autoplay loop controls>
                    <source src="videos/17.mp4" type="video/mp4">
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
