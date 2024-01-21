<?php
function register($name, $surname, $login, $password)
{
    $host = "localhost";
    $db = "finance";
    $user = "root";
    $pass = "";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Вставка данных в базу данных
    $stmt = $pdo->prepare("INSERT INTO users (name, surname, login, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $surname, $login, $hash]);

    header("Location: ../index.html");
    exit;
}

// Получение значений из полей для ввода
$name = $_POST['form-name'];
$surname = $_POST['form-second-name'];
$login = $_POST['form-login'];
$password = $_POST['form-password'];
$repeatPassword = $_POST['form-repeat-password'];

print_r($name);
print_r($surname);
print_r($login);
print_r($password);
print_r($repeatPassword);

if ($password !== $repeatPassword) {
    header("Location: ../pages/reg-log.html");
} else if ($password === $repeatPassword) {
    $result = register($name, $surname, $login, $password);
}