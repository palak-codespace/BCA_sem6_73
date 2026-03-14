<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Handle logging today's activity
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = isset($_POST['score']) ? (int)$_POST['score'] : -1;

    if ($score >= 0 && $score <= 5) {
        $today = date('Y-m-d');

        $check = $conn->query("SELECT id FROM activities WHERE user_id = $user_id AND date = '$today'");

        if ($check->num_rows > 0) {
            $conn->query("UPDATE activities SET score = $score WHERE user_id = $user_id AND date = '$today'");
        } else {
            $conn->query("INSERT INTO activities (user_id, date, score) VALUES ($user_id, '$today', $score)");
        }

        header("Location: calendar.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Hello, <?php echo htmlspecialchars($username); ?>!</h1>

<a href="logout.php" class="logout">Logout</a>

<h2>Log Today's Productivity</h2>

<form method="post">

<label>How productive were you today?</label>

<select name="score" required>
<option value="">Choose...</option>
<option value="0">0 – Rest day</option>
<option value="1">1 – Light effort</option>
<option value="2">2 – Average</option>
<option value="3">3 – Good</option>
<option value="4">4 – Very good</option>
<option value="5">5 – Excellent 🔥</option>
</select>

<button type="submit">Save Productivity</button>

</form>

<br>

<a href="calendar.php" class="view-calendar">View Your Heatmap</a>

<br><br>

<a href="event_add.php" class="view-calendar">Schedule Event</a>

</div>

</body>
</html>