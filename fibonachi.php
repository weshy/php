<?php
function fibonachi(int $n):int{
	if ($n > 2)
	 	return fibonachi($n - 1) + fibonachi($n - 2);
	return 1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>числа Фибоначчи</title>
	<link rel="stylesheet" type="text/css" href="css/fibonachi.css">
</head>
<body>
	<ul>
		<?php for ($i=0; $i < 42; $i++): ?>
			<li><?= " {$i} = " . fibonachi($i); ?></li>
		<?php  endfor; ?>
	</ul>
</body>
</html>