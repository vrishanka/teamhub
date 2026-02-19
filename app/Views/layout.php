<!DOCTYPE html>
<html>
<head>
    <title>TeamHub</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        body {
            background-color: #f4f6f9;
        }

        .kanban-column {
            min-height: 400px;
            background: #ffffff;
            border-radius: 8px;
            padding: 15px;
        }

        .task-card {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">TeamHub</a>
        <div class="ms-auto">
            <a href="/dashboard" class="btn btn-sm btn-light">Dashboard</a>
            <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>

