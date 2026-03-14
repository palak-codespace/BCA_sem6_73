<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Productivity Heatmap</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="main-layout">

<!-- LEFT SIDE -->
<div class="left-side">

<h1>🔥 Productivity Heatmap</h1>
<p>Track your daily productivity and visualize your progress just like GitHub.</p>

<?php if (isset($_SESSION['user_id'])) { ?>

<p>You are logged in!</p>
<a href="dashboard.php" class="main-btn">Go to Dashboard</a>

<?php } else { ?>

<div class="form-box">

<div class="form-section">

<h2>Login</h2>

<form action="login.php" method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>

</div>


<div class="form-section">

<h2>Register</h2>

<form action="register.php" method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Register</button>
</form>

</div>

</div>

<?php } ?>

</div>


<!-- RIGHT SIDE IMAGE -->
<div class="right-side">

<img src="calendar-illustration.png" alt="Calendar Illustration">

</div>

</div>

</div>

</body>
</html>