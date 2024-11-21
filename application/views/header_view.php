<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/phps.png'); ?>">
    <title>Students Data</title>
    <script src="<?= base_url('assets\bootstrap\bootstrap.bundle.min.js'); ?>" ></script>
    <link href="<?= base_url('assets\bootstrap\bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Student Portal</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('studentController'); ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Results</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('loginController'); ?>">Logout</a></li>
        </ul>
    </nav>
