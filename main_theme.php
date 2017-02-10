<?php 

error_reporting(E_ALL);

$time_of_day    = (int) date('H');
$greetings      = 'Доброй ночи!';

if ($time_of_day > 6) {
    if ($time_of_day < 12) {
        $greetings = ' Добрейший утречёк!';
    }
    elseif ($time_of_day < 18) {
        $greetings = ' Добрейший денёчек вам однако!';
    }
    elseif ($time_of_day < 24) {
        $greetings = ' Добрейший вечерок.';
    }
}

$menu = [
    ['href' => '/index.php?page=about', 'text' => 'обо мне'],
    ['href' => '/index.php?page=version', 'text' => 'версия php'],
    ['href' => '/index.php?page=ToDo.list', 'text' => 'дела...'],
    ['href' => '/index.php?page=table', 'text' => 'Таблица'],
    ['href' => '/index.php?page=ending', 'text' => 'Окончания'],
    ['href' => '/index.php?page=display', 'text' => 'Фибоначи'],
    ['href' => '/index.php?page=index06', 'text' => 'Занятие 06'],
    ['href' => '/index.php?page=index07', 'text' => 'Занятие 07']
];

function menu($menu, $direction='line'){
    echo '<ul class="nav navbar-nav">';
        foreach ($menu as $key => $value) {
            if ($direction=='line') {echo '<li><a href="' . $value['href'] . '">'. $value['text'].'</a></li>';}
            else {echo '<li><a href="' . $value['href'] . '">'. $value['text'].' v </a></li>';}
        }
    echo '</ul>';
}

function isPost(){
    return ($_SERVER['REQUEST_METHOD'] == 'POST');
}

function getRequestVariable($key,$value){
    echo empty($_REQUEST[$key]);
    return (empty($_REQUEST[$key])) ? $_REQUEST[$key] : $value;
}

?>