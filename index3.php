<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "PopulationData";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT state_name, population FROM Population2024";
$result = $conn->query($sql);

// Store data in arrays
$states = [];
$populations = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $states[] = $row['state_name'];
        $populations[] = $row['population'];
    }
} else {
    echo "No data found";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Population Graph: Malaysia 2024</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        canvas {
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <h1>Population Graph: Malaysia 2024</h1>
    <canvas id="barChart"></canvas>
    <canvas id="lineChart"></canvas>

    <script>
        // Data from PHP
        const states = <?php echo json_encode($states); ?>;
        const populations = <?php echo json_encode($populations); ?>;

        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: states,
                datasets: [{
                    label: 'Population',
                    data: populations,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    title: { display: true, text: 'Bar Chart: Population by State (2024)' }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: states,
                datasets: [{
                    label: 'Population',
                    data: populations,
                    backgroundColor: 'rgba(75, 192, 192, 0.4)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    title: { display: true, text: 'Line Chart: Population by State (2024)' }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
