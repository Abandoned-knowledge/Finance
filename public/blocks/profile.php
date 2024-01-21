<?php
$curUser = unserialize($_COOKIE['user']); 
?>

<article class="profile-settings">
    <form action="#" class="profile-settings__change-image shadowBorder">
        <h1 class="h1-title">Изменение Фотографии</h1>
        <div class="profile-settings__avatar">
            <img src="../img/avatar-empty.png" class="profile-settings__image" alt="profile-avatar">
        </div>
        <input id="profile-settings__file" type="file" accept=".jpg, .jpeg, .png" class="profile-settings__file">
        <label for="profile-settings__file" class="profile-settings__button">Выбрать фото</label>
        <button type="submit" class="profile-settings__button">Изменить фотографию</button>
    </form>

    <form action="../vendor/change-profile-info.php" class="profile-settings__change-name shadowBorder">
        
        <h1 class="h1-title">Редактирование Профиля</h1>
        
        <section class="input">
            <span class="input__title">Имя</span>
            <input type="text" class="input__content" name="form-name" placeholder="<?php echo $curUser['name']; ?>">
        </section>
        
        <section class="input">
            <span class="input__title">Фамилия</span>
            <input type="text" class="input__content" name="form-second-name" placeholder="<?php echo $curUser['surname']; ?>">
        </section>
        
        <button type="submit" class="profile-settings__button">Сохранить изменения</button>
    </form>

    <form action="../vendor/change-profile-password.php" class="profile-settings__change-password shadowBorder">

        <h1 class="h1-title">Изменение пароля</h1>
        
        <section class="input">
            <span class="input__title">Старый пароль</span>
            <input type="password" class="input__content" name="form-old-password" placeholder="Старый пароль">
        </section>
        
        <section class="input">
            <span class="input__title">Новый пароль</span>
            <input type="password" class="input__content" name="form-new-password" placeholder="Новый пароль">
        </section>
        
        <section class="input">
            <span class="input__title">Повторите новый пароль</span>
            <input type="password" class="input__content" name="form-new-repeat-password" placeholder="Новый пароль">
        </section>
        <button type="submit" class="profile-settings__button">Изменить пароль</button>

    </form>
</article>