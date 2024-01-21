<?php
//Получение данных из БД
function getUserData($userId)
{
    $pdo = new PDO('mysql:host=localhost;dbname=finance', 'root', '');
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id_user = :id_user');
    $stmt->execute(['id_user' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function displayProfile($userId)
{
    $user = getUserData($userId);
    echo '<img src="' . $user['avatar'] . '" alt="Аватар">';
    echo '<p>Имя: ' . $user['name'] . '</p>';
    echo '<p>Фамилия: ' . $user['surname'] . '</p>';
    echo '<p>Логин: ' . $user['login'] . '</p>';
    echo '<form method="post">
            <input type="text" name="name" value="' . $user['name'] . '"><br><br>
            <input type="text" name="surname" value="' . $user['surname'] . '"><br><br>
            <input type="text" name="login" value="' . $user['login'] . '"><br> <br>
            <input type="text" name="avatar" value="' . $user['avatar'] . '"> <br> <br>
            <button type="submit" name="edit">Редактировать</button>
          </form>';
    
}

function editUserData($userId, $name, $surname, $login, $password, $avatar)
{
    $pdo = new PDO('mysql:host=localhost;dbname=finance', 'root', '');
    $stmt = $pdo->prepare('UPDATE users SET name = :name, surname = :surname, login = :login, password = :password, avatar = :avatar WHERE id_user = :id_user');
    $stmt->execute(['name' => $name, 'surname' => $surname, 'login' => $login, 'password' => $password, 'avatar' => $avatar, 'id_user' => $userId]);
}
if (isset($_POST['edit'])) {
    editUserData($_COOKIE['id_user'], $_POST['name'], $_POST['surname'], $_POST['login'], $_POST['password'], $_POST['avatar']);
    header("Refresh:0");
} else {
    displayProfile($_COOKIE['id_user']);
}

//Код формы изменения пароля
function displayChangePasswordForm()
{
    echo '<form method="post">
            <input type="text" name="old_password" placeholder="Старый пароль">
            <input type="text" name="new_password" placeholder="Новый пароль">
            <input type="text" name="confirm_password" placeholder="Подтвердите новый пароль">
            <button type="submit" name="change_password">Изменить пароль</button>
          </form>';
}

function changePassword($userId, $oldPassword, $newPassword, $confirmPassword)
{
    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        echo 'Все поля должны быть заполнены';
        return;
    }

    $user = getUserData($userId);

    if (!password_verify($oldPassword, $user['password'])) {
        echo 'Неверный старый пароль';
        return;
    }

    if ($newPassword !== $confirmPassword) {
        echo 'Новый пароль и подтверждение не совпадают';
        return;
    }

    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    editUserData($userId, $user['name'], $user['surname'], $user['login'], $hashedNewPassword, $user['avatar']);
    echo 'Пароль успешно изменен';
}

if (isset($_POST['change_password'])) {
    changePassword($_COOKIE['id_user'], $_POST['old_password'], $_POST['new_password'], $_POST['confirm_password']);
} else {
    displayChangePasswordForm($_COOKIE['id_user']);
}


?>