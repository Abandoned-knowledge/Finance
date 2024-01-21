<?php
function login($login, $password)
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

    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch();

    // print_r($user);

    if (password_verify($password, $user['password'])) {

        $cookie_name = "user";
        $cookie_value = serialize($user);
        $expiration_time = time() + (10 * 365 * 24 * 60 * 60);

        setcookie($cookie_name, $cookie_value, $expiration_time, "/");

        header("Location: ../pages/profile.php");
        exit;
    }
}

$login = $_POST['form-login'];
$password = $_POST['form-password'];

$result = login($login, $password);
?>