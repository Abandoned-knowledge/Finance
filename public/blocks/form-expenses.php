<?php
require_once "../vendor/connect.php";
$curUser = unserialize($_COOKIE['user']); 

$stmt = $pdo->prepare("SELECT * FROM `category_expenses` WHERE `id_user` = :id");
$stmt->execute(["id" => $curUser["id_user"]]);

$categories = $stmt->fetchAll();
?>

<form action="../vendor/add-expenses.php" method="POST" class="form-finance shadowBorder">
    <h1 class="h1-title">Добавление статьи расходов</h1>
    <section class="form-finance__rows">
        <section class="input">
            <span class="input__title">Дата</span>
            <input type="date" class="input__content input__content--date" name="form-date" placeholder="Дата">
        </section>
        <script src="../js/input-date.js"></script>

        <section class="dropdown">
            <span class="dropdown__title">Категория</span>
            <input type="text" class="dropdown__input" value="" name="form-category-id" hidden>
            <section class="dropdown__container">
                <div class="dropdown__button">
                    <span class="dropdown__text">Выберите категорию</span>
                    <svg class="dropdown__icon" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="12" height="9"><path d="M0.5 2.37868L1.91421 0.964462L7.57107 6.62132L6.15685 8.03553L0.5 2.37868Z" /><path d="M10.3995 0.964462L11.8137 2.37868L6.15685 8.03553L4.74264 6.62132L10.3995 0.964462Z" /></svg>
                </div>
                
                <div class="dropdown__content">
                    <?php
                    foreach ($categories as $item) {
                        echo '<span class="dropdown__item"> <span class="dropdown__item--id">' . $item["id_category_ex"] . '</span>' . $item["name"] . '</span>';
                    }
                    ?>
                </div>
            </section>
        </section>

        <section class="input">
            <span class="input__title">Описание</span>
            <input type="text" class="input__content" name="form-description" placeholder="Описание">
        </section>

        <section class="input">
            <span class="input__title">Сумма</span>
            <input type="text" class="input__content" name="form-sum" placeholder="Сумма" required>
        </section>
    </section>


    <button class="button-finance button-expenses">Добавить</button>
</form>
<script src="../js/dropdown.js"></script>