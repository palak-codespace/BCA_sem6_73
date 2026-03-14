<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
header("Location: index.php");
exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$title = $_POST['title'];
$date = $_POST['event_date'];
$desc = $_POST['description'];

$conn->query("INSERT INTO events (user_id,title,event_date,description)
VALUES ('$user_id','$title','$date','$desc')");

header("Location: event_list.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Schedule Event</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>Schedule Important Event</h1>

<form method="post">

<label>Event Title</label>
<input type="text" name="title" required>

<label>Date</label>
<input type="date" name="event_date" required>

<label>Description</label>
<textarea name="description"></textarea>

<button type="submit">Save Event</button>

</form>

<a href="event_list.php">View Events</a>

</div>

</body>
</html>