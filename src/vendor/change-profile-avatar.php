<?php

$img = $_POST['form-avatar'];

print_r($img);

$curUser = unserialize($_COOKIE['user']);

$pdo = new PDO('mysql:host=localhost;dbname=finance', 'root', '');

$stmt = $pdo->prepare('UPDATE `users` SET `avatar` = :avatar WHERE `id_user` = :id');
$stmt->execute(['avatar' => $img, 'id' => $curUser["id_user"]]);

$stmt2 = $pdo->prepare("SELECT * FROM users WHERE id_user = ?");
$stmt2->execute([$curUser["id_user"]]);
$user = $stmt2->fetch();

$cookie_value = serialize($user);
$expiration_time = time() + (10 * 365 * 24 * 60 * 60);
setcookie('user', $cookie_value, $expiration_time, "/");

header("location: ../pages/profile.php");
exit;

