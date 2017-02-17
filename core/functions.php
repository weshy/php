<?php  

function pre_print_r($array_value){
    return '<pre><p style="font-family: Helvetica, sans-serif; font-size: 6pt; font-weight: noramal;line-height: 1.1;">'
            . print_r($array_value,true) . '</p></pre>';
}

function menu($menu, $direction='line'){
    $menuStyle = ' style="display: inline;">';
    if ('line' !== $direction ) $menuStyle = ' style="display: block;">';

    echo '<ul class="nav navbar-nav"' . $menuStyle;
        $tempClass = 'noUnderLine';
        if ($direction=='line') $tempClass = '';
        foreach ($menu as $key => $value) {
            echo '<li><a href="/index.php?page=' . $key . '" class = "{$tempClass}">'. $value['item'].'</a></li>';
        }
    echo '</ul>';
}

function isPost(){
	return ($_SERVER['REQUEST_METHOD'] == 'POST');
}

function getRequestVariable($key,$value=''){
    return (!empty($_REQUEST[$key])) ? $_REQUEST[$key] : $value;
}

function table($rows,$columns,$color=''){

    echo '<table style="border-right: .1em solid '. $color .'; border-bottom: .1em solid '. $color .';">';
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
    if (count($cookieHistory)) {
        echo '<div style="float:right;"><p>История вывода таблиц:</p><table><tr>';
        foreach ($cookieHistory as $val) {
            echo '<tr><td class="number-format">'
                            . $val[0] . '</td><td><span class="multiple-sign">&#215;</span></td><td class="number-format">'
                            . $val[1] . '</td><td><div class="history-show-color" style="background:'
                            . $val[2] . ';">' . '<a href="/index.php?page=table&columns='
                            . $val[0] .'&rows='. $val[1] .'&color=' . str_replace('#','',$val[2]) . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div></td><td>'
                            . date("d-m-Y H:i:s", $val[3]) . "</td> </tr>";
        }
        echo "</table></div>";
    }
}

$m_table_cookie = [];

if (!empty($_COOKIE['m_table'])) {
    $m_table_cookie = unserialize($_COOKIE['m_table']);
}

if(isPost()) {
    $columns = getRequestVariable('columns',10);
    $rows = getRequestVariable('rows',10);
    $color = getRequestVariable('color','#369');
    $date = time();
    global $m_table_cookie;
    array_unshift($m_table_cookie, [$columns,$rows,$color,time()]);
    $m_table_cookie = array_slice($m_table_cookie,0,30);
    setcookie('m_table',serialize($m_table_cookie));
    $f = fopen('table.history.csv', 'a');
    fputcsv($f, [$columns,$rows,$color,time()]);
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $columns = getRequestVariable('columns',10);
    $rows = getRequestVariable('rows',10);
    $color = '#' . str_replace('#','',getRequestVariable('color','#336699'));
    $date = time();
}

function listWholeDirectory($directoryName,$delimeter=''){
    echo "<div class=\"folder-tree\"> ";
    $d = opendir($directoryName);
    while ($item = readdir($d)) {
        if ('.' == $item || '..' == $item) continue;
        if (is_dir($item)) {
           echo "{$delimeter} &#128449; <strong>$item</strong><br>";
           listWholeDirectory($directoryName . '/' . $item,$delimeter . '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;');
        } else {
            echo "<a href=\"index.php?page=about&path_to_show=" . rawurlencode($directoryName . '/' . $item) . "\">$delimeter &#128441; $item </a><br>";
        }
    }
    closedir($d);
    echo '</div>';
}
