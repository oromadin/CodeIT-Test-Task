<?php

function init_db()
{
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=world', 'root', 'root');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

function get_user($dbh, $email)
{
    $sql = 'SELECT * FROM users WHERE email = :email';
    $statement = $dbh->prepare($sql);
    $statement->execute([
        ':email' => $email
    ]);
    $result = $statement->fetchAll();
    return $result;
}

function create_user($dbh, $data)
{

    $sql = 'INSERT INTO users(email, login, real_name, `password`, birth_date, country_code, ts) 
            VALUES(:email, :login, :real_name, :password, :birth_date, :country_code, :ts)';
    $statement2 = $dbh->prepare($sql);
    $statement2->execute([
        ':email' => $data['email'],
        ':login' => $data['login'],
        ':real_name' => $data['real_name'],
        ':password' => $data['password'],
        ':birth_date' => $data['birth_date'],
        ':country_code' => $data['country_code'],
        ':ts' => time()
    ]);
    $_SESSION['logged_in'] = 1;
}

function get_countries($dbh)
{
    $statement = $dbh->query('SELECT Code, Name FROM country');
    $result = $statement->fetchAll();
    return $result;
}

function validate_form($data)
{
    $errors = [];
    if (strlen($data['email']) < 3) {
        $errors[] = 'To short email';
    }
    if (strlen($data['login']) < 3) {
        $errors[] = 'To short login';
    }
    if (strlen($data['real_name']) < 3) {
        $errors[] = 'To short real_name';
    }
    if (strlen($data['birth_date']) < 3) {
        $errors[] = 'To short birth_date';
    }
    if ($data['terms'] != 'on') {
        $errors[] = 'Accept terms';
    }
    return $errors;
}	