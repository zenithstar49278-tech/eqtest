<?php
// results.php - Results Page
session_start();
if (!isset($_SESSION['answers'])) {
    header('Location: quiz.php');
    exit;
}

require_once 'db.php'; // Include database connection

// Fetch questions with scores
$sql = "SELECT id, score_a, score_b, score_c, score_d FROM questions ORDER BY id";
$result = $conn->query($sql);
$scores = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $scores[$row['id']] = [
            'a' => $row['score_a'],
            'b' => $row['score_b'],
            'c' => $row['score_c'],
            'd' => $row['score_d']
        ];
    }
}
$conn->close();

$total_score = 0;
$answers = $_SESSION['answers'];
foreach ($answers as $qid => $choice) {
    if (isset($scores[$qid][$choice])) {
        $total_score += $scores[$qid][$choice];
    }
}
unset($_SESSION['answers']); // Clear session

$max_score = count($scores) * 4; // Assuming 4 is max per question
$percentage = ($total_score / $max_score) * 100;

if ($percentage >= 80) {
    $feedback = "High EQ: You have excellent emotional intelligence. You are great at understanding and managing emotions.";
    $improvement = "Continue practicing empathy and self-awareness to maintain your strengths.";
} elseif ($percentage >= 50) {
    $feedback = "Medium EQ: You have a good grasp of emotional intelligence but there's room for improvement.";
    $improvement = "Focus on areas like emotional regulation and building stronger relationships.";
} else {
    $feedback = "Low EQ: You may benefit from developing your emotional skills.";
    $improvement = "Start with self-reflection exercises and seek feedback from others.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQ Results</title>
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
        <h1 class="text-center">Your EQ Results</h1>
        <div class="text-center mt-4">
            <h3>Score: <?php echo $total_score; ?> out of <?php echo $max_score; ?> (<?php echo round($percentage); ?>%)</h3>
            <p><?php echo $feedback; ?></p>
            <p>Recommendations: <?php echo $improvement; ?></p>
        </div>
        <div class="text-center mt-4">
            <a href="quiz.php" class="btn btn-primary">Retake Test</a>
            <button class="btn btn-secondary" onclick="alert('Share your results on social media! Score: <?php echo $total_score; ?>/<?php echo $max_score; ?>')">Share Results</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
