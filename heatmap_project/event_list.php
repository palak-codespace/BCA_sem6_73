<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
header("Location: index.php");
exit;
}

$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT * FROM events WHERE user_id=$user_id ORDER BY event_date");
?>

<!DOCTYPE html>
<html>
<head>
<title>Your Events</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>Your Scheduled Events</h1>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>Title</th>
<th>Date</th>
<th>Description</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['event_date']; ?></td>
<td><?php echo $row['description']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
