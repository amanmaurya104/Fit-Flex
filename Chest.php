<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chest Workouts | Fit N' Flex</title>
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
    <!-- Chest Workouts Section -->
    <section>
        <div class="workout-section">
            <h2>Chest Workout</h2>
            <div class="workout-content">
                <p><strong>Exercise 1: Bench Press</strong> - 4 sets of 8-10 reps</p>
                <p>The bench press is a fundamental exercise for building overall chest strength and mass.</p>
                <video autoplay loop controls>
                    <source src="videos/18.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 2: Push-Ups</strong> - 4 sets of 12-15 reps</p>
                <p>Push-ups are a bodyweight exercise that engages the chest, shoulders, and triceps.</p>
                <video autoplay loop controls>
                    <source src="videos/19.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 3: Dumbbell Flyes</strong> - 3 sets of 12 reps</p>
                <p>This isolation exercise targets the chest muscles, enhancing definition and shape.</p>
                <video autoplay loop controls>
                    <source src="videos/20.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 4: Incline Dumbbell Press</strong> - 4 sets of 10 reps</p>
                <p>The incline dumbbell press focuses on the upper chest and helps in achieving a balanced chest development.</p>
                <video autoplay loop controls>
                    <source src="videos/21.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Exercise 5: Chest Dips</strong> - 3 sets of 8-10 reps</p>
                <p>Chest dips are a great compound exercise that targets the lower chest while also engaging the triceps.</p>
                <video autoplay loop controls>
                    <source src="videos/22.mp4" type="video/mp4">
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
