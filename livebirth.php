<?php
// PHP: Annual Live Births Data for 2024
$births_data = [
    "Johor" => 45000,
    "Kedah" => 32000,
    "Kelantan" => 28000,
    "Melaka" => 15000,
    "Negeri Sembilan" => 17000,
    "Pahang" => 25000,
    "Perak" => 30000,
    "Perlis" => 5000,
    "Pulau Pinang" => 22000,
    "Sabah" => 54000,
    "Sarawak" => 40000,
    "Selangor" => 95000,
    "Terengganu" => 20000,
    "Kuala Lumpur" => 30000,
    "Labuan" => 3000,
    "Putrajaya" => 5000
];

// Convert data to JSON for use in JavaScript
$states = json_encode(array_keys($births_data));
$births = json_encode(array_values($births_data));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annual Live Births: Malaysia 2024</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        h1 {
            color: #444;
        }
        canvas {
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <h1>Annual Live Births: Malaysia 2024</h1>
    <canvas id="pieChart"></canvas>
    <canvas id="barChart"></canvas>

    <script>
        // Get the data from PHP
        const states = <?php echo $states; ?>;
        const births = <?php echo $births; ?>;

        // Create a Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: states,
                datasets: [{
                    label: 'Live Births',
                    data: births,
                    backgroundColor: [
                        '#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0', '#9966ff',
                        '#ff9f40', '#c9cbcf', '#ab47bc', '#8d6e63', '#26a69a',
                        '#ff7043', '#7e57c2', '#66bb6a', '#5c6bc0', '#ffca28', '#8e24aa'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' },
                    title: { display: true, text: 'Pie Chart: Distribution of Live Births by State (2024)' }
                }
            }
        });

        // Create a Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: states,
                datasets: [{
                    label: 'Live Births',
                    data: births,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    title: { display: true, text: 'Bar Chart: Annual Live Births by State (2024)' }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
