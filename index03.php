<?php

$menu = [
	['href' => ' https://bjatta.ru', 'text' => ' About'],
	['href' => ' https://ya.ru', 'text' => ' @ '],
	['href' => ' https://vk.com', 'text' => ' ... '],
	['href' => ' https://tut.by', 'text' => ' ? '],
	['href' => ' https://onliner.by', 'text' => ' ! '],
	['href' => ' https://grin.photo', 'text' => ' ### '],
];
?>

<!doctype html>
<head>

</head>
<body>
<?php
	echo '<div>';
foreach ($menu as $key => $value) {
	echo '<a href="' . $value['href'] . '"> '. $value['text'] . '</a> &nbsp&nbsp&nbsp&nbsp|';
}
	echo '</div>';
?>
</body>
