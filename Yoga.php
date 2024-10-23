<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yoga & Flexibility Workouts | Fit N' Flex</title>
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
    <!-- Yoga & Flexibility Workouts Section -->
    <section>
        <div class="workout-section">
            <h2>Yoga & Flexibility Workout</h2>
            <div class="workout-content">
                <p><strong>Pose 1: Downward Dog</strong> - Hold for 30 seconds</p>
                <p>Downward Dog stretches the back, hamstrings, and calves while strengthening the arms and legs.</p>
                <video autoplay controls>
                    <source src="videos/47.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Pose 2: Warrior I</strong> - Hold for 30 seconds each side</p>
                <p>This pose strengthens the legs, opens the hips and chest, and stretches the arms and legs.</p>
                <video autoplay controls>
                    <source src="videos/48.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Pose 3: Child’s Pose</strong> - Hold for 1 minute</p>
                <p>A resting pose that stretches the back and shoulders, promoting relaxation and flexibility.</p>
                <video autoplay loop controls>
                    <source src="videos/49.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Pose 4: Cat-Cow Stretch</strong> - 10 rounds</p>
                <p>This dynamic stretch warms up the spine and improves flexibility and posture.</p>
                <video autoplay loop controls>
                    <source src="videos/50.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Pose 5: Seated Forward Bend</strong> - Hold for 30 seconds</p>
                <p>This pose stretches the spine and hamstrings, promoting relaxation and flexibility.</p>
                <video autoplay loop controls>
                    <source src="videos/51.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Pose 6: Pigeon Pose</strong> - Hold for 30 seconds each side</p>
                <p>Pigeon Pose deeply stretches the hips and glutes, helping to release tension in these areas.</p>
                <video autoplay loop controls>
                    <source src="videos/52.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                <p><strong>Pose 7: Corpse Pose</strong> - Hold for 5 minutes</p>
                <p>A restorative pose that encourages deep relaxation and mindfulness, perfect for ending a yoga session.</p>
                <video autoplay loop controls>
                    <source src="videos/53.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <div class="container">
            <a href="home.php#workout-plans" class="cta-btn">View More Workouts</a>
        </div> 
    </section>

    <!-- Footer -->
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
