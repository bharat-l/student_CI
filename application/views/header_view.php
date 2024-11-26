<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/phps.png'); ?>">
    <title>Students Portal</title>
    <script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <link href="<?= base_url('assets/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/header_view.css') ?>" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <i class="fas fa-user-graduate"></i> Student Portal
        </a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('studentController'); ?>">Home</a></li>
            <li class="nav-item dropdown" id="studentsCorner">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Students Corner
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-item dropdown" id="results">
                        <a href="#" class="dropdown-toggle">Results</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">SSC Results</a></li>
                            <li><a class="dropdown-item" href="#">Inter Results</a></li>
                            <li><a class="dropdown-item" href="#">B.Tech Results</a></li>
                            <li><a class="dropdown-item" href="#">Competitive Results</a></li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item" href="#">Library</a></li>
                    <li><a class="dropdown-item" href="#">Attendance</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('LoginController/logout'); ?>">Logout</a></li>
            <li class="nav-item dropdown" id="uname">
                <?php
                $username = $_SESSION['user_name'];
                $initials = strtoupper($username[0]); // Get the first letter as initials
                echo "<a href='#' class='nav-link dropdown-toggle'>$initials</a>";
                ?>
                <ul class="dropdown-menu">
                    <li><p class="dropdown-item"><?php echo htmlspecialchars($username); ?></p></li>
                </ul>
            </li>
        </ul>
    </nav>
    
</body>

</html>
