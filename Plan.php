<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legs Workouts | Fit N' Flex</title>
    <link rel="stylesheet" href="a.css">
</head>
<body>

    <div id="header"></div>
    <div class="container">
        <h1>Workout Planner</h1>

        <h2>Select Example Schedule</h2>
        <select id="example-schedule">
            <option value="">--Choose an example--</option>
            <option value="example1">Beginner Full-Body</option>
            <option value="example2">Intermediate Split Routine</option>
            <option value="example3">Advanced Push-Pull-Legs</option>
        </select>
        <button id="load-schedule">Load Example Schedule</button>

        <div class="partition"></div> <!-- Visual partition -->

        <div class="card">
            <h2>Weekly Workout Schedule</h2>
            <table id="schedule">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Workout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3" class="placeholder">Dynamic content will be injected here</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Move the form below the Weekly Workout Schedule -->
        <form id="workout-form">
            <label for="workout-name">Workout Name:</label>
            <input type="text" id="workout-name" required>

            <label for="day">Select Day:</label>
            <select id="day">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>

            <button type="submit">Add Workout</button>
        </form>
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
        // Predefined workout schedule
const schedule = {
    Monday: [{ name: "Chest Workout" }],
    Tuesday: [{ name: "Leg Day" }],
    Wednesday: [{ name: "Back and Biceps" }],
    Thursday: [{ name: "Shoulders and Abs" }],
    Friday: [{ name: "Full Body Workout" }],
    Saturday: [],
    Sunday: [],
};

// Example schedules
const exampleSchedules = {
    example1: {
        Monday: [{ name: "Bodyweight Squats" }, { name: "Push-Ups" }],
        Tuesday: [{ name: "Walking" }],
        Wednesday: [{ name: "Plank" }, { name: "Lunges" }],
        Thursday: [{ name: "Rest" }],
        Friday: [{ name: "Jumping Jacks" }],
        Saturday: [{ name: "Yoga" }],
        Sunday: [],
    },
    example2: {
        Monday: [{ name: "Bench Press" }, { name: "Deadlifts" }],
        Tuesday: [{ name: "Pull-Ups" }, { name: "Rows" }],
        Wednesday: [{ name: "Leg Press" }, { name: "Calf Raises" }],
        Thursday: [{ name: "Shoulder Press" }, { name: "Tricep Dips" }],
        Friday: [{ name: "Cardio" }],
        Saturday: [],
        Sunday: [],
    },
    example3: {
        Monday: [{ name: "Bench Press" }, { name: "Shoulder Press" }],
        Tuesday: [{ name: "Deadlifts" }, { name: "Pull-Ups" }],
        Wednesday: [{ name: "Leg Press" }, { name: "Squats" }],
        Thursday: [{ name: "Cardio" }],
        Friday: [{ name: "Bicep Curls" }, { name: "Tricep Extensions" }],
        Saturday: [],
        Sunday: [],
    },
};

// Function to render the workout schedule
function renderSchedule() {
    const scheduleDiv = document.getElementById('schedule');
    scheduleDiv.innerHTML = '';

    for (const day in schedule) {
        const dayDiv = document.createElement('div');
        dayDiv.innerHTML = `<strong>${day}:</strong>`;
        
        schedule[day].forEach((workout, index) => {
            const workoutEntry = document.createElement('div');
            workoutEntry.className = 'workout-entry';
            workoutEntry.innerHTML = `
                <span>${workout.name}</span>
                <div>
                    <button class="edit-button" onclick="editWorkout('${day}', ${index})">Edit</button>
                    <button class="remove-button" onclick="removeWorkout('${day}', ${index})">Remove</button>
                </div>
            `;
            dayDiv.appendChild(workoutEntry);
        });

        scheduleDiv.appendChild(dayDiv);
    }
}

// Function to save the current schedule to local storage
function saveSchedule() {
    localStorage.setItem('schedule', JSON.stringify(schedule));
}

// Event listener for form submission to add a workout
document.getElementById('workout-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const workoutName = document.getElementById('workout-name').value.trim();
    const selectedDay = document.getElementById('day').value;

    if (!schedule[selectedDay]) {
        schedule[selectedDay] = [];
    }
    
    schedule[selectedDay].push({ name: workoutName });
    saveSchedule();
    renderSchedule();
    document.getElementById('workout-form').reset();
});

// Function to remove a workout from the schedule
function removeWorkout(day, index) {
    schedule[day].splice(index, 1);
    if (schedule[day].length === 0) {
        delete schedule[day];
    }
    saveSchedule();
    renderSchedule();
}

// Function to edit an existing workout
function editWorkout(day, index) {
    const newWorkoutName = prompt("Edit Workout Name:", schedule[day][index].name);
    if (newWorkoutName) {
        schedule[day][index].name = newWorkoutName.trim();
        saveSchedule();
        renderSchedule();
    }
}

// Load example schedule
document.getElementById('load-schedule').addEventListener('click', function() {
    const selectedExample = document.getElementById('example-schedule').value;
    if (selectedExample) {
        Object.assign(schedule, exampleSchedules[selectedExample]);
        saveSchedule();
        renderSchedule();
    }
});

// Initial rendering of the schedule when the page loads
renderSchedule();

</script>
</body>
</html>
