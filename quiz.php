<?php
// quiz.php - Quiz Page
session_start();
require_once 'db.php'; // Include database connection

// Fetch questions
$sql = "SELECT * FROM questions ORDER BY id";
$result = $conn->query($sql);
$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}
$conn->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['answers'] = $_POST['answers'];
    header('Location: results.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQ Quiz</title>
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
        <h1 class="text-center">Emotional Intelligence Quiz</h1>
        <form method="POST" action="quiz.php">
            <?php foreach ($questions as $index => $q): ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Question <?php echo $index + 1; ?>: <?php echo $q['question']; ?></h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?php echo $q['id']; ?>]" value="a" required>
                            <label class="form-check-label"><?php echo $q['option_a']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?php echo $q['id']; ?>]" value="b" required>
                            <label class="form-check-label"><?php echo $q['option_b']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?php echo $q['id']; ?>]" value="c" required>
                            <label class="form-check-label"><?php echo $q['option_c']; ?></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[<?php echo $q['id']; ?>]" value="d" required>
                            <label class="form-check-label"><?php echo $q['option_d']; ?></label>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Submit Answers</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
