<?php  

function menu($menu, $direction='line'){
    $menuStyle = ' style="display: inline;">';
    if ('line' !== $direction ) $menuStyle = ' style="display: block;">';

    echo '<ul class="nav navbar-nav"' . $menuStyle;
        foreach ($menu as $key => $value) {
            if ($direction=='line') {echo '<li><a href="' . $value['href'] . '">'. $value['text'].'</a></li>';}
            else {echo '<li><a href="' . $value['href'] . '" class = "noUnderLine">'. $value['text'].' v </a></li>';}
        }
    echo '</ul>';
}

function isPost(){
	return ($_SERVER['REQUEST_METHOD'] == 'POST');
}

function getRequestVariable($key,$value){
    return (!empty($_REQUEST[$key])) ? $_REQUEST[$key] : $value;
}

function table($rows,$columns,$color=''){

    echo "<table style=\"border: 1px solid #369;\">";
    if ('' == $color) $color = $GLOBALS['red'];
    else $color = 'background: '. $color .'; color: white; font-weight: bold;';
    
    for ($i=1; $i <= $rows ; $i++) {
        echo "<tr>";
        for ($j=1; $j <= $columns ; $j++) {
            echo '<td style="' . $GLOBALS['all'];
            echo ($i==1 || $j==1) ? $color : '' ;
            echo '">' . $i*$j . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function historyShow ($cookieHistory){
    echo "<table><tr><td>Колонок</td><td>Рядов</td><td>Цвет</td><td>Отметка времени</td></tr>";
    foreach ($cookieHistory as $val) {
        echo "<tr><td>" . $val['col'] . "</td><td>" . $val['row'] . '</td><td><div style="background:' . $val['color'] . ';"">&nbsp;</div></td><td>' . date("d-m-Y H:i:s", $val['date']) . "</td> </tr>";
    }
    echo "</table>";

}

if(isPost()) {
    $columns = getRequestVariable('columns',10);
    $rows = getRequestVariable('rows',10);
    $color = getRequestVariable('color','#369');
}

$m_table_cookie = [];
if (!empty($_COOKIE['m_table'])) {
    $m_table_cookie = unserialize($_COOKIE['m_table']);
}
array_unshift($m_table_cookie, ['col' => $columns, 'row' => $rows, 'color' => $color, 'date' => time()]);
setcookie('m_table',serialize($m_table_cookie));