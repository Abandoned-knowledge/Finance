<?php
$name = $_POST["form-name"];
$surname = $_POST["form-second-name"];

$curUser = unserialize($_COOKIE['user']);

if (empty($name)) {
    $name = $curUser["name"];
}

if (empty($surname)) {
    $surname = $curUser["surname"];
}

$pdo = new PDO('mysql:host=localhost;dbname=finance', 'root', '');
$stmt = $pdo->prepare('UPDATE users SET name = :name, surname = :surname WHERE id_user = :id_user');
$stmt->execute(['name' => $name, 'surname' => $surname, 'id_user' => $curUser["id_user"]]);

$stmt2 = $pdo->prepare("SELECT * FROM users WHERE id_user = ?");
$stmt2->execute([$curUser["id_user"]]);
$user = $stmt2->fetch();

$cookie_value = serialize($user);
$expiration_time = time() + (10 * 365 * 24 * 60 * 60);
setcookie('user', $cookie_value, $expiration_time, "/");

header("location: ../pages/profile.php");
exit;

