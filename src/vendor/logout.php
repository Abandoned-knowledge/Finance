<?php
$cookie_name = "user";

setcookie($cookie_name, "", time() - (10 * 365 * 24 * 60 * 60), "/");

if (isset($_COOKIE[$cookie_name])) {
    unset($_COOKIE[$cookie_name]);
}

header("Location: ../index.php");
