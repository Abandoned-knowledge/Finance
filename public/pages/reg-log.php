<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css" />
  </head>
  <body>
    <section class="main-container">
      <header class="header">
    <nav class="menu">
        <a href="../pages/expenses.php" class="menu__link nav__link">Расходы</a>
        <a href="../pages/income.php" class="menu__link nav__link">Доходы</a>
        <span class="menu__link menu__dropdown">
            Отчёты
            <svg class="menu__link--icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
            
            <section class="menu__reports">
                <a href="../pages/report-expenses.php" class="menu__link menu__link--selected nav__link">
                    Отчёты расходов
                    <svg class="menu__link--icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
                </a>

                <a href="../pages/report-income.php" class="menu__link menu__link--selected nav__link">
                    Отчёты доходов
                    <svg class="menu__link--icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
                </a>
            </section>
        </span>
    </nav>


    <?php
        if (isset($_COOKIE['user'])) {
            echo 
            ('
            <article class="nav-profile">
            <section class="nav-profile__main">
                <div class="nav-profile__avatar">
                    <img class="nav-profile__image" src="../img/avatar-empty.png" alt="profile-avatar">
                </div>
                <svg class="nav-profile--icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
            </section>

            <section class="nav-profile__additional">
                <div class="nav-profile__name">
                    <div class="nav-profile__avatar">
                        <img class="nav-profile__image" src="../img/avatar-empty.png" alt="profile-avatar">
                    </div>
                    Илья Прусикин
                </div>
                <a href="../pages/profile.php" class="menu__link menu__link--selected">
                    Редактировать профиль
                    <svg class="menu__link--icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
                </a>
                <a href="../vendor/logout.php" class="menu__link menu__link--selected">
                    Выйти
                </a>
            </section>
            </article>
            ');
            
        } else {
            echo
            ('
            <form action="../pages/reg-log.php" class="nav-btns">
                <button class="nav-btns__button nav-btns__login">Войти</button>
                <button class="nav-btns__button nav-btns__register">Регистрация</button>
            </form>
            ');
        }
    ?>
    <script src="../js/header.js"></script>
</header>

      <main class="main">
        

<article class="reg-auth-forms">
    <form action="../vendor/registration.php" method="post" class="register-form shadowBorder">
        <h1 class="h1-title">Создание аккаунта</h1>
        <section class="input">
            <span class="input__title">Имя</span>
            <input type="text" class="input__content" name="form-name" placeholder="Имя" required>
        </section>

        <section class="input">
            <span class="input__title">Фамилия</span>
            <input type="text" class="input__content" name="form-second-name" placeholder="Фамилия" required>
        </section>

        <section class="input">
            <span class="input__title">Логин</span>
            <input type="text" class="input__content" name="form-login" placeholder="Логин" required>
        </section>

        <section class="input">
            <span class="input__title">Пароль</span>
            <input type="password" class="input__content" name="form-password" placeholder="Пароль" required>
        </section>

        <section class="input">
            <span class="input__title">Повторите пароль</span>
            <input type="password" class="input__content" name="form-repeat-password" placeholder="Пароль" required>
        </section>
    
        <button type="submit" class="profile-settings__button">Создать</button>
    </form>
    
    <form action="../vendor/auto.php" method="post" class="auth-form shadowBorder">
        <h1 class="h1-title">Авторизация в аккаунт</h1>
        <section class="input">
            <span class="input__title">Логин</span>
            <input type="text" class="input__content" name="form-login" placeholder="Логин" required>
        </section>
        <section class="input">
            <span class="input__title">Пароль</span>
            <input type="password" class="input__content" name="form-password" placeholder="Пароль" required>
        </section>
    
        <button type="submit" class="profile-settings__button">Войти</button>
    </form>
</article>
      </main>

      <footer class="footer">
    <span class="footer__copyright">© 2023</span>
    <span class="footer__rights">Все права защищены</span>
</footer>
    </section>
  </body>
</html>
`