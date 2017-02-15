<?php
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

$color = '#336699';
$red = 'background: '. $color .'; color: white; font-weight: bold;';
$all = 'width: 2.5em; text-align: right; padding-right: .3em;';
$columns=11;
$rows   =11;