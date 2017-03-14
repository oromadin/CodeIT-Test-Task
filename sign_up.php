<?php

include 'functions.php';

session_start();

$dbh = init_db();
$result = get_countries($dbh);

// handle form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'email' => isset($_POST['email']) ? $_POST['email'] : NULL,
        'login' => isset($_POST['login']) ? $_POST['login'] : NULL,
        'real_name' => isset($_POST['real_name']) ? $_POST['real_name'] : NULL,
        'birth_date' => isset($_POST['birth_date']) ? $_POST['birth_date'] : NULL,
        'country_code' => isset($_POST['country_code']) ? $_POST['country_code'] : NULL,
        'terms' => isset($_POST['terms']) ? $_POST['terms'] : NULL
    ];
    $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $errors = validate_form($data);
    if (empty($errors)) {
        try {
            create_user($dbh, $data);
            $_SESSION['email'] = $data['email'];
            header('Location: index.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = $e->getMessage();
        }
    }
}
?>

<html>
<head>
    <title>Sing Up Page</title>
</head>
<body>

<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        ?>
        <p>
            <?php print($error); ?>
        </p>
    <?php }
} ?>

<form action="sign_up.php" method="POST">
    <p>E-mail:</p>
    <p>
        <?php $email = isset($data) ? $data['email'] : ''; ?>
        <input type="text"
               name="email"
               value="<?php print($email) ?>">
    </p>
    <p>Login:</p>
    <p>
        <?php $login = isset($data) ? $data['login'] : ''; ?>
        <input type="text"
               name="login"
               value="<?php print($login) ?>">
    </p>
    <p>Name:</p>
    <p>
        <?php $real_name = isset($data) ? $data['real_name'] : ''; ?>
        <input type="text"
               name="real_name"
               value="<?php print($real_name) ?>">
    </p>
    <p>Password:</p>
    <p>
        <input type="password"
               name="password">
    </p>
    <p>DOB:</p>
    <p>
        <?php $birth_date = isset($data) ? $data['birth_date'] : ''; ?>
        <input type="date"
               name="birth_date"
               value="<?php print($birth_date) ?>">
    </p>
    <p>
        <select name="country_code">
            <?php foreach ($result as $row) { ?>
                <option value="<?php print($row['Code']) ?>">
                    <?php print($row['Name']) ?>
                </option>
            <?php } ?>
        </select>
    </p>
    <p>
        <?php
        if (empty($data)) {
            $terms = 'checked';
        } else if (isset($data['terms']) && $data['terms'] = 'on') {
            $terms = 'checked';
        } else {
            $terms = '';
        }
        ?>
        <input name="terms"
               type="checkbox"
            <?php print($terms) ?> >I agree with terms and conditions
    </p>
    <input type="submit" value="Sign Up">
    <a href="sign_in.php">Sign In</a>
</form>
</body>
</html>