<?php
include 'functions.php';
session_start();

$dbh = init_db();

if (!isset($_SESSION['logged_in'])) {
    header('Location: sign_in.php');
    exit;
}

$email = $_SESSION['email'];
$result = get_user($dbh, $email);

// handle logout
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['logged_in'] = NULL;
    header('Location: /sign_in.php');
    exit;
}
?>

<html>
<head>
    <title>Main Page</title>
</head>
<body>

<p>E-mail: <?php print($result[0]['email']) ?></p>
<p>Name: <?php print($result[0]['real_name']) ?></p>

<form action="index.php" method="POST">
    <input type="submit" value="Logout">
</form>
<pre>
</pre>
</body>
</html>