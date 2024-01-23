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
      <?php
$curUser = unserialize($_COOKIE['user']); 
?>

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
                    <img class="nav-profile__image" src="' . $curUser["avatar"] . '" alt="profile-avatar">
                </div>
                <svg class="nav-profile--icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
            </section>

            <section class="nav-profile__additional">
                <div class="nav-profile__name">
                    <div class="nav-profile__avatar">
                        <img class="nav-profile__image" src="' . $curUser["avatar"] . '" alt="profile-avatar">
                    </div>
                    ' . $curUser["name"] . " " . $curUser["surname"] . '
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
        <form action="#" class="form-finance shadowBorder">
    <h1 class="h1-title">Добавление статьи расходов</h1>
    <section class="form-finance__rows">
        <section class="input">
            <span class="input__title">Дата</span>
            <input type="date" class="input__content" name="form-date" placeholder="Дата">
        </section>

        <section class="dropdown">
            <span class="dropdown__title">Категория</span>
            <input type="text" class="dropdown__input" value="" disabled hidden>
            <section class="dropdown__container">
                <div class="dropdown__button">
                    <span class="dropdown__text">Выберите категорию</span>
                    <svg class="dropdown__icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
                </div>
                
                <div class="dropdown__content">
                    <span class="dropdown__item" data-value="Маркетплейс">Маркетплейс</span>
                    <span class="dropdown__item" data-value="Продукты">Продукты</span>
                    <span class="dropdown__item" data-value="Проезд">Проезд</span>
                </div>
            </section>
        </section>


        <section class="input">
            <span class="input__title">Описание</span>
            <input type="text" class="input__content" name="form-description" placeholder="Описание">
        </section>

        <section class="input">
            <span class="input__title">Сумма</span>
            <input type="text" class="input__content" name="form-sum" placeholder="Сумма">
        </section>
    </section>


    <button class="button-finance button-expenses">Добавить</button>
</form>
<script src="../js/dropdown.js"></script>
        <div class="charts">
  <div class="charts__item shadowBorder">
    <canvas id="first-chart-expenses"></canvas>
  </div>
  <div class="charts__item shadowBorder">
    <canvas id="second-chart-expenses"></canvas>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../js/charts-expenses.js"></script>

        <form action="#" class="form-finance shadowBorder">
    <h1 class="h1-title">Изменение категории расходов</h1>
    <section class="category-dropdown">
        <div class="category-dropdown__button">
            <span class="category-dropdown__text--show">Показать список категорий</span>
            <span class="category-dropdown__text--close category-dropdown__text--hidden ">Скрыть список категорий</span>
            <svg class="category-dropdown__icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
        </div>

        <ul class="category-dropdown__list">

            <li class="category-dropdown__item">
                Маркетплейс
                <div class="table-expenses__actions">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="currentcolor"><path d="M3 21.75V17.5L16.2 4.325C16.4 4.14167 16.621 4 16.863 3.9C17.105 3.8 17.359 3.75 17.625 3.75C17.8917 3.75 18.15 3.8 18.4 3.9C18.65 4 18.8667 4.15 19.05 4.35L20.425 5.75C20.625 5.93333 20.771 6.15 20.863 6.4C20.955 6.65 21.0007 6.9 21 7.15C21 7.41667 20.9543 7.671 20.863 7.913C20.7717 8.155 20.6257 8.37567 20.425 8.575L7.25 21.75H3ZM17.6 8.55L19 7.15L17.6 5.75L16.2 7.15L17.6 8.55Z"/></svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="currentcolor"><path d="M7 21.75C6.45 21.75 5.97933 21.5543 5.588 21.163C5.19667 20.7717 5.00067 20.3007 5 19.75V6.75H4V4.75H9V3.75H15V4.75H20V6.75H19V19.75C19 20.3 18.8043 20.771 18.413 21.163C18.0217 21.555 17.5507 21.7507 17 21.75H7ZM9 17.75H11V8.75H9V17.75ZM13 17.75H15V8.75H13V17.75Z"/></svg>
                    </a>
                </div>
            </li>

            <li class="category-dropdown__item">
                Продукты
                <div class="table-expenses__actions">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="currentcolor"><path d="M3 21.75V17.5L16.2 4.325C16.4 4.14167 16.621 4 16.863 3.9C17.105 3.8 17.359 3.75 17.625 3.75C17.8917 3.75 18.15 3.8 18.4 3.9C18.65 4 18.8667 4.15 19.05 4.35L20.425 5.75C20.625 5.93333 20.771 6.15 20.863 6.4C20.955 6.65 21.0007 6.9 21 7.15C21 7.41667 20.9543 7.671 20.863 7.913C20.7717 8.155 20.6257 8.37567 20.425 8.575L7.25 21.75H3ZM17.6 8.55L19 7.15L17.6 5.75L16.2 7.15L17.6 8.55Z"/></svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="currentcolor"><path d="M7 21.75C6.45 21.75 5.97933 21.5543 5.588 21.163C5.19667 20.7717 5.00067 20.3007 5 19.75V6.75H4V4.75H9V3.75H15V4.75H20V6.75H19V19.75C19 20.3 18.8043 20.771 18.413 21.163C18.0217 21.555 17.5507 21.7507 17 21.75H7ZM9 17.75H11V8.75H9V17.75ZM13 17.75H15V8.75H13V17.75Z"/></svg>
                    </a>
                </div>
            </li>

        </ul>
    </section>

    <button class="button-finance button-expenses">Добавить</button>
</form>

<script>
    const dropdownCategory = document.querySelector(".category-dropdown");
    const dropdownCategoryBtn = dropdownCategory.querySelector(".category-dropdown__button");
    const dropdownList = dropdownCategory.querySelector(".category-dropdown__list");
    const dropdownTextShow = dropdownCategory.querySelector(".category-dropdown__text--show");
    const dropdownTextClose = dropdownCategory.querySelector(".category-dropdown__text--close");

    dropdownCategoryBtn.addEventListener("click", function () {
        dropdownCategory.classList.toggle("category-dropdown_open");

        if (dropdownCategory.classList.contains("category-dropdown_open")) {
            dropdownTextShow.classList.add("category-dropdown__text--hidden");
            dropdownTextClose.classList.remove("category-dropdown__text--hidden");
        } else {
            dropdownTextShow.classList.remove("category-dropdown__text--hidden");
            dropdownTextClose.classList.add("category-dropdown__text--hidden");
        }
    })


</script>
      </main>

      <footer class="footer">
    <span class="footer__copyright">© 2023</span>
    <span class="footer__rights">Все права защищены</span>
</footer>
    </section>
  </body>
</html>
