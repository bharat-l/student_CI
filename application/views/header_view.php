<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    <link href="<?= base_url('assets\bootstrap\bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('assets\bootstrap\bootstrap.bundle.min.js'); ?>" ></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Student Portal</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('StudentController'); ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('logout'); ?>">Logout</a></li>
        </ul>
    </nav>
