<!doctype html>
<html>
<head>
    <title>Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>
<body>

    <h1></h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand"><?= esc($title) ?></span>
            <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('home'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('about'); ?>">About</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('tests'); ?>">Tests</a></li>
            </ul>
            </div>
        </div>
    </nav>