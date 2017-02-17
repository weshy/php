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
            <div id="navbar" class="collapse navbar-collapse">
            <?php menu(MAIN_MENU); ?>
            </div>
        </div>
    </nav>

    <div id="leftNavBar">
        <?php menu(MAIN_MENU,'in_column'); ?>
    </div>

    <div id="mainPageBlock">
     <div class="page-header">
       <?= "<h1>" . MAIN_MENU[CURRENT_PAGE_INDEX]['title'] . "</h1>"?>
    </div>
        <?php include CURRENT_PAGE_INDEX . '.php'; ?>
    </div>

    <footer id="footer">
        <div class="container">
            <p class="text-muted">© bj bjatta ® 2016 — <?= date('Y'); ?> at tc.belhard.com &#10004;</p>
        </div>
    </footer>
</body>
</html>
