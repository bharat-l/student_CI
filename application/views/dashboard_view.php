<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard_view.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- For graph -->
</head>
<body>
<div class="sidebar">
        <h4 class="text-center">Students Portal</h4>
        <hr style="background-color: #555;">
        <a href="<?= base_url('DashboardController'); ?>" class="<?= (uri_string() == 'DashboardController') ? 'active' : ''; ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="<?= base_url('StudentController/profiles'); ?>" class="<?= (uri_string() == 'StudentController/profiles') ? 'active' : ''; ?>"><i class="fas fa-user-graduate"></i> Student Information</a>
        <a href="<?= base_url('StudentController/results'); ?>" class="<?= (uri_string() == 'StudentController/results') ? 'active' : ''; ?>"><i class="fas fa-file-alt"></i> Results</a>
        <a href="<?= base_url('LibraryController'); ?>" class="<?= (uri_string() == 'StudentController/library') ? 'active' : ''; ?>"><i class="fas fa-book"></i> Library</a>
        <a href="<?= base_url('StudentController/attendance'); ?>" class="<?= (uri_string() == 'StudentController/attendance') ? 'active' : ''; ?>"><i class="fas fa-calendar-check"></i> Attendance</a>
    </div>
    <div class="dashboard-container">
        <!-- Banner Section -->
        <div class="banner">
            <div class="banner-item">
                <h2>Welcome to the Students Portal</h2>
                <p>Manage your courses, view your progress, and stay updated!</p>
            </div>
        </div>

        <!-- Student Stats Section -->
        <div class="student-stats">
            <div class="stats-item">
                <h3>Total Students</h3>
                <p class="stats-number">1,254</p>
            </div>
            <div class="stats-item">
                <h3>Male Students</h3>
                <p class="stats-number">620</p>
            </div>
            <div class="stats-item">
                <h3>Female Students</h3>
                <p class="stats-number">634</p>
            </div>
        </div>

        <!-- Attendance Graph Section -->
        <div class="attendance-graph">
            <h3>Attendance Overview</h3>
            <canvas id="attendanceChart" width="400" height="200"></canvas>
        </div>

    </div>

    <script>
        // Attendance chart data (static sample data)
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'line', // Line chart type
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'], // Time intervals
                datasets: [{
                    label: 'Attendance Percentage',
                    data: [95, 90, 85, 92, 96, 89], // Attendance data (e.g., percentage)
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
