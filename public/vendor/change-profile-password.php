<?php
$name = $_POST["form-name"];
$surname = $_POST["form-second-name"];
$oldPass = $_POST['form-old-password'];
$newPass = $_POST['form-new-password'];
$newRepeatPass = $_POST['form-new-repeat-password'];

$curUser = unserialize($_COOKIE['user']);

if (!password_verify($oldPass, $curUser['password'])) {
    echo "что-то пошло не так...";
} else {
    if ($newPass === $newRepeatPass) {
        $hashedNewPass = password_hash($newPass, PASSWORD_DEFAULT);

        $pdo = new PDO('mysql:host=localhost;dbname=finance', 'root', '');

        $stmt = $pdo->prepare('UPDATE `users` SET password = :password WHERE `id_user` = :id');
        $stmt->execute(['password' => $hashedNewPass, 'id' => $curUser["id_user"]]);

        // Получаем данные пользователя после обновления пароля
        $stmt2 = $pdo->prepare("SELECT * FROM users WHERE id_user = ?");
        $stmt2->execute([$curUser["id_user"]]);
        $user = $stmt2->fetch();

        $cookie_value = serialize($user);
        $expiration_time = time() + (10 * 365 * 24 * 60 * 60);
        setcookie('user', $cookie_value, $expiration_time, "/");

        header("location: ../pages/profile.php");
        exit;
    } else {
        echo "пароли не совпадают";
    }
}