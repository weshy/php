<?php
    error_reporting(E_ALL);
    require_once "core/bootstrap.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP. Задания...</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav id="topNavBar">
        <div class="container">
            <div class="navbar-header">
                <a class="noUnderLine navbar-brand" href="/">Основы php</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
            <?php menu($menu); ?>
            </div>
        </div>
    </nav>

    <div id="leftNavBar">
        <?php menu($menu,'in_column'); ?>
    </div>

    <div id="mainPageBlock">
        <?php include $inner_page; ?>
    </div>

<!-- <?= pre_print_r($_SERVER); ?>
<?= pre_print_r($_SESSION); ?>
<?= pre_print_r($_COOKIE); ?>
 -->
    <footer id="footer">
        <div class="container">
            <p class="text-muted">© bj bjatta ® 2016 — <?= date('Y'); ?> at tc.belhard.com &#10004;</p>
        </div>
    </footer>
</body>
</html>
