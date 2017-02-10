<?php

$str_test = ' - ';
$str_test = isset($_GET['page']) ? $_GET['page'] : 'index';

switch ($str_test) {
    case 'about':
        $inner_page = 'about.php';
        break;
    case 'version'  :
       $inner_page = 'version.php';
       break;
    case 'table'    :
       $inner_page = 'table.php';
       break;
    case 'ToDo.list':
       $inner_page = 'while.php';
       break;
    case 'ending'   :
       $inner_page = 'ending.php';
       break;
    case 'index06'  :
       $inner_page = 'index06.php';
       break;
    case 'index07'  :
       $inner_page = 'index07.php';
       break;
    case 'display'  :
       $inner_page = 'display.php';
       break;
    default         :
        $inner_page = 'main.php';
        break;
}
?>
