<?php

include 'functions.php';

session_start();

$errors = [];
$dbh = init_db();

//handle form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = get_user($dbh, $_POST['email']);
    if (empty($result)) {
        $errors[] = 'No this email';
    } else {
        if (password_verify($_POST['password'], $result[0]['password'])) {
            $_SESSION['logged_in'] = 1;
            $_SESSION['email'] = $result[0]['email'];
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Wrong password';
        }
    }
}
?>
<html>
<head>
    <title>Sign In Page</title>
</head>
<body>

<?php
foreach ($errors as $error) {
    ?>
    <p>
        <?php print($error); ?>
    </p>
<?php } ?>

<form action="sign_in.php" method="POST">
    <p>Put Login or E-mail: </p>
    <p><input type="text" name="email"></p>
    <p>Password: </p>
    <p><input type="text" name="password"></p>

    <input type="submit" value="Sign In">
    <a href="sign_up.php">Sign Up</a>
</body>
</html>