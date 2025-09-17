<?php
// index.php - Homepage
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emotional Intelligence Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }
        .btn {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to the Emotional Intelligence (EQ) Test</h1>
        <p class="text-center mt-4">
            Emotional Intelligence (EQ) is the ability to understand, use, and manage your own emotions in positive ways to relieve stress, communicate effectively, empathize with others, overcome challenges, and defuse conflict. This test will help you assess your EQ and provide personalized feedback.
        </p>
        <div class="text-center mt-4">
            <a href="quiz.php" class="btn btn-primary btn-lg">Start Test</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
