<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

/* Get activity data */
$activities = [];

$result = $conn->query("SELECT date, score FROM activities 
WHERE user_id = $user_id 
AND date >= DATE_SUB(CURDATE(), INTERVAL 365 DAY)");

while ($row = $result->fetch_assoc()) {
    $activities[$row['date']] = (int)$row['score'];
}

/* Current streak */
$streak = 0;
$check_date = date('Y-m-d');

while (true) {

$res = $conn->query("SELECT score FROM activities 
WHERE user_id = $user_id 
AND date = '$check_date'
AND score > 0");

if ($res->num_rows == 0) break;

$streak++;

$check_date = date('Y-m-d', strtotime("$check_date -1 day"));
}

/* Total productive days */

$total_result = $conn->query("SELECT COUNT(*) as count 
FROM activities 
WHERE user_id = $user_id AND score > 0");

$total_days = $total_result->fetch_assoc()['count'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Heatmap</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1><?php echo htmlspecialchars($username); ?>'s Productivity Heatmap</h1>

<a href="dashboard.php">← Log Productivity</a>

<br><br>

<a href="logout.php" class="logout">Logout</a>

<h2>Your Heatmap (Last 1 Year)</h2>

<div class="stats">

<p>Current Streak: <strong><?php echo $streak; ?> days</strong> 🔥</p>

<p>Total Productive Days: <strong><?php echo $total_days; ?></strong></p>

</div>


<div class="legend">

<div class="square empty"></div> 0 &nbsp;

<div class="square level1"></div> 1 &nbsp;

<div class="square level2"></div> 2 &nbsp;

<div class="square level3"></div> 3 &nbsp;

<div class="square level4"></div> 4 &nbsp;

<div class="square level5"></div> 5

</div>


<div class="heatmap">

<?php

for ($i = 364; $i >= 0; $i--) {

$date = date('Y-m-d', strtotime("-$i days"));

$score = $activities[$date] ?? 0;

$class = '';

if ($score == 1) $class = 'level1';
elseif ($score == 2) $class = 'level2';
elseif ($score == 3) $class = 'level3';
elseif ($score >= 4) $class = 'level4';

$today_class = ($date == date('Y-m-d')) ? 'today' : '';

echo "<div class='square $class $today_class' title='$date – Score: $score'></div>";

}

?>

</div>

</div>

</body>
</html>
