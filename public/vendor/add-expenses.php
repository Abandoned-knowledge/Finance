<?php
require_once "../vendor/connect.php";
$curUser = unserialize($_COOKIE['user']);
$curUserId = $curUser["id_user"];

$date = $_POST["form-date"];
$category = $_POST["form-category-id"];
$description = $_POST["form-description"];
$sum = $_POST["form-sum"];

list($year, $month, $day) = explode("-", $date);

try {
$stmt = $pdo->prepare("INSERT INTO `expenses`(`id_user`, `id_category_ex`, `year`, `id_month`, `day`, `sum`, `description`)
                            VALUES (:id, :category, :year, :month, :day, :sum, :description)");
$stmt->execute(["id" => $curUserId, "category" => $category, "year" => $year, "month" => $month, "day" => $day, "sum" => $sum, "description" => $description,]);
} catch (\Throwable $th) {
    echo "не вышло" . "<br>" . $th;
}