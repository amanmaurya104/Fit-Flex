<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biceps & Triceps Workouts | Fit N' Flex</title>
    <link rel="stylesheet" href="workout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
    <!-- Biceps & Triceps Workouts Section -->
    <section>
        <div class="workout-section">
            <h2>Biceps Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Barbell Curl</strong> - 4 sets of 12 reps</p>
                <p>The barbell curl is one of the most effective exercises for building overall bicep mass. It targets the biceps brachii and helps in building strength and definition.</p>
                <video autoplay loop controls >
                    <source src="videos/1.mp4" type="video/mp4">
                <!--   <source src="videos/1.webm" type="video/webm"> -->
                    Your browser does not support the video tag.
                </video>
                

                <p><strong>Exercise 2: Hammer Curl</strong> - 4 sets of 10 reps</p>
                <p>The hammer curl focuses on the brachialis and brachioradialis muscles, which helps improve overall arm thickness and strength.</p>
                <video autoplay loop controls >
                    <source src="videos/2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Concentration Curl</strong> - 3 sets of 15 reps</p>
                <p>This isolation exercise targets the biceps peak, allowing for maximum contraction and control. It's great for defining the shape of your biceps.</p>
                <video autoplay loop controls>
                    <source src="videos/3.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <div class="workout-section">
            <h2>Triceps Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Tricep Dips</strong> - 4 sets of 12 reps</p>
                <p>Tricep dips are a compound exercise that works the entire tricep muscle as well as your chest and shoulders. It’s great for building upper body strength.</p>
                <video autoplay loop controls>
                    <source src="videos/4.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: Overhead Tricep Extension</strong> - 3 sets of 10 reps</p>
                <p>This isolation exercise targets the long head of the triceps, helping build both strength and size. It's ideal for creating well-rounded triceps.</p>
                <video autoplay loop controls>
                    <source src="videos/5.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Skull Crushers</strong> - 3 sets of 12 reps</p>
                <p>Skull crushers isolate the triceps, especially the long head, and are excellent for adding definition and size. It's a go-to move for tricep strength.</p>
                <video autoplay loop controls>
                    <source src="videos/6.mp4" type="video/mp4">
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
