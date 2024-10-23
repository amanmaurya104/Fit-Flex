<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core & Abs Workouts | Fit N' Flex</title>
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

    <!-- Core & Abs Workouts Section -->
    <section>
        <div class="workout-section">
            <h2>Core Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Plank</strong> - 3 sets of 30-60 seconds</p>
                <p>The plank is an isometric exercise that strengthens the entire core, promoting stability and endurance.</p>
                <video controls>
                    <source src="videos/23.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: Russian Twists</strong> - 3 sets of 15 reps per side</p>
                <p>This exercise targets the obliques and helps improve rotational strength.</p>
                <video controls>
                    <source src="videos/24.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Bicycle Crunches</strong> - 3 sets of 15-20 reps</p>
                <p>Bicycle crunches engage the rectus abdominis and obliques for a comprehensive core workout.</p>
                <video controls>
                    <source src="videos/25.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 4: Mountain Climbers</strong> - 3 sets of 30 seconds</p>
                <p>This dynamic exercise targets the core while also elevating your heart rate for a cardio boost.</p>
                <video controls>
                    <source src="videos/26.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 5: Leg Raises</strong> - 3 sets of 12-15 reps</p>
                <p>Leg raises effectively target the lower abdominal muscles and enhance overall core strength.</p>
                <video controls>
                    <source src="videos/27.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <div class="workout-section">
            <h2>Abs Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Crunches</strong> - 3 sets of 15-20 reps</p>
                <p>Crunches are a classic abdominal exercise that primarily targets the rectus abdominis.</p>
                <video autoplay loop controls>
                    <source src="videos/28.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: Flutter Kicks</strong> - 3 sets of 15-20 reps</p>
                <p>This exercise targets the lower abs and helps in building core endurance.</p>
                <video autoplay loop controls>
                    <source src="videos/29.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Plank Shoulder Taps</strong> - 3 sets of 10 reps per side</p>
                <p>This variation of the plank engages the core while improving shoulder stability.</p>
                <video autoplay loop controls>
                    <source src="videos/30.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 4: Side Planks</strong> - 3 sets of 30 seconds per side</p>
                <p>Side planks are excellent for targeting the obliques and enhancing lateral core stability.</p>
                <video autoplay loop controls>
                    <source src="videos/31.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 5: V-Ups</strong> - 3 sets of 10-12 reps</p>
                <p>This exercise works both the upper and lower abs simultaneously for a comprehensive core workout.</p>
                <video autoplay loop controls>
                    <source src="videos/32.mp4" type="video/mp4">
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
