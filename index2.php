<?php
// PHP script to generate the web page with graphs

// Data for the Population Table: Malaysia 2024
$data = [
    "Johor" => 3780000,
    "Kedah" => 2290000,
    "Kelantan" => 2040000,
    "Melaka" => 1000000,
    "Negeri Sembilan" => 1180000,
    "Pahang" => 1710000,
    "Perak" => 2470000,
    "Perlis" => 257000,
    "Pulau Pinang" => 1770000,
    "Sabah" => 3830000,
    "Sarawak" => 2910000,
    "Selangor" => 7150000,
    "Terengganu" => 1280000,
    "Kuala Lumpur" => 1800000,
    "Labuan" => 99000,
    "Putrajaya" => 120000
];

// Encode data to be used in JavaScript
$states = json_encode(array_keys($data));
$populations = json_encode(array_values($data));
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
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
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
        const states = <?php echo $states; ?>;
        const populations = <?php echo $populations; ?>;

        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: states,
                datasets: [{
                    label: 'Population',
                    data: populations,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    title: { display: true, text: 'Bar Chart: Population of Malaysian States (2024)' }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
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
                    backgroundColor: 'rgba(153, 102, 255, 0.4)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    title: { display: true, text: 'Line Chart: Population of Malaysian States (2024)' }
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
