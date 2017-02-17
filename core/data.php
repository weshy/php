<?php

define('MAIN_MENU',[
    'main'      => ['item' => '⌂',          'title' => ''],
    'ending'    => ['item' => 'Окончания',  'title' => 'Корзина товаров'],
    'display'   => ['item' => 'Фибоначи',   'title' => 'Число Фибоначи'],
    'table'     => ['item' => 'Таблица',    'title' => 'Таблица умножения'],
    'instagram' => ['item' => 'instagram',  'title' => 'Инстаграм'],
    'about'     => ['item' => 'folder tree','title' => 'Дерево папок'],
    'version'   => ['item' => '⚙',          'title' => 'Служебная информация'],
    ]);

define('INSTAGRAM_DATA_BASE_FILE', 'data/instagram.csv');

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