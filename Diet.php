<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit & Flex | Home</title>    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div id="header"></div>

<div class="container">
    <!-- Add the Personal Details form here -->
    <section id="personal-details">
        <h2>Enter Your Personal Details</h2>
        <form id="fitness-form">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
    
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
    
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" required>
    
            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" required>
    
            <label for="goal">Fitness Goal:</label>
            <select id="goal" name="goal" required>
                <option value="lose_weight">Lose Weight</option>
                <option value="gain_muscle">Gain Muscle</option>
                <option value="maintain_fitness">Maintain Fitness</option>
            </select>
    
            <button type="button" onclick="generateRecommendations()">Get Recommendations</button>
        </form>
        <div id="recommendations"></div>
    </section>
    
</div>



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
        function generateRecommendations() {
            // Get user input values
            const age = parseInt(document.getElementById('age').value);
            const gender = document.getElementById('gender').value;
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            const goal = document.getElementById('goal').value;
        
            let exerciseRecommendation = "";
            let dietRecommendation = "";
        
            // Calculate BMI to factor into recommendations
            const heightInMeters = height / 100;
            const bmi = weight / (heightInMeters * heightInMeters);
        
            // Logic based on fitness goal, age, BMI, and gender
            if (goal === 'lose_weight') {
                exerciseRecommendation = `
                    <p>1. Cardio: Focus on moderate-intensity exercises like jogging, cycling, or swimming 4-5 times a week.</p>
                    <p>2. Strength Training: Incorporate full-body workouts with light weights or resistance bands 2-3 times a week.</p>
                    <p>3. HIIT: Add High-Intensity Interval Training 1-2 times a week for fat burning.</p>
                `;
                dietRecommendation = `
                    <p>1. Calorie Deficit: Eat around 500 calories below your maintenance level.</p>
                    <p>2. Protein: Include lean protein sources like chicken, fish, tofu, and beans.</p>
                    <p>3. Complex Carbs: Focus on whole grains like brown rice, oats, and quinoa.</p>
                    <p>4. Healthy Fats: Include avocados, olive oil, and nuts in moderation.</p>
                `;
        
                if (bmi >= 25) {
                    exerciseRecommendation += `
                        <p>4. Special Tip: Focus more on cardio and light strength training to reduce body fat effectively.</p>
                    `;
                    dietRecommendation += `
                        <p>5. Special Diet Tip: Increase fiber intake to help with satiety and control hunger.</p>
                    `;
                }
            } else if (goal === 'gain_muscle') {
                exerciseRecommendation = `
                    <p>1. Weightlifting: Focus on compound exercises like squats, deadlifts, and bench press with progressive overload 4-5 times a week.</p>
                    <p>2. Rest Days: Take 1-2 rest days to allow muscle recovery.</p>
                    <p>3. Cardio: Limit to 1-2 times a week with moderate intensity.</p>
                `;
                dietRecommendation = `
                    <p>1. Caloric Surplus: Eat 300-500 calories more than your maintenance level.</p>
                    <p>2. Protein: Aim for 1.6-2.2 grams of protein per kg of body weight. Include eggs, dairy, lean meats, and plant-based protein sources.</p>
                    <p>3. Carbs: Focus on complex carbohydrates like oats, sweet potatoes, and whole wheat for sustained energy.</p>
                    <p>4. Fats: Include healthy fats like nuts, seeds, and fatty fish (salmon).</p>
                `;
        
                if (gender === 'female') {
                    dietRecommendation += `
                        <p>5. Special Tip for Women: Ensure adequate intake of iron-rich foods like spinach and legumes, especially if exercising intensely.</p>
                    `;
                }
            } else if (goal === 'maintain_fitness') {
                exerciseRecommendation = `
                    <p>1. Balanced Workouts: Incorporate 3-4 days of strength training with 2-3 days of moderate cardio.</p>
                    <p>2. Flexibility and Mobility: Include yoga or stretching 2-3 times a week to improve flexibility and prevent injuries.</p>
                    <p>3. Active Lifestyle: Stay active with daily walks or physical activities.</p>
                `;
                dietRecommendation = `
                    <p>1. Balanced Diet: Ensure a good mix of carbohydrates, proteins, and fats in each meal.</p>
                    <p>2. Protein: Include lean meats, legumes, and dairy products for muscle maintenance.</p>
                    <p>3. Carbs: Focus on whole grains, fruits, and vegetables for micronutrients.</p>
                    <p>4. Hydration: Drink plenty of water to stay hydrated throughout the day.</p>
                `;
            }
        
            // Age-based adjustments
            if (age > 50) {
                exerciseRecommendation += `
                    <p>4. Special Note: Focus on low-impact exercises like swimming, walking, or cycling to protect joints.</p>
                `;
                dietRecommendation += `
                    <p>5. Special Note: Include calcium-rich foods like dairy or fortified plant-based milk for bone health.</p>
                `;
            }
        
            // BMI-based adjustments
            if (bmi < 18.5) {
                dietRecommendation += `
                    <p>6. Special Tip: Increase caloric intake with healthy, nutrient-dense foods like nuts, seeds, and avocados to reach a healthier weight.</p>
                `;
            }
        
            // Display the recommendations
            const recommendationsDiv = document.getElementById('recommendations');
            recommendationsDiv.innerHTML = `
                <h3>Your Recommendations</h3>
                <p><strong>Exercise Plan:</strong></p>
                ${exerciseRecommendation}
                <p><strong>Diet Plan:</strong></p>
                ${dietRecommendation}
            `;
        
            // Scroll to the recommendations section with smooth behavior
            recommendationsDiv.scrollIntoView({ behavior: 'smooth' });
        
            // Add animation class to the recommendations section
            recommendationsDiv.classList.add('visible');
        }
        </script>
        
        
        
</body>
</html>

