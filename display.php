<?php function factotial ($number){
if ($number > 1) return ($number*factotial($number-1));
return 1;
}
function average():float {
	$total_args = func_num_args();
	$total_sum=0;
	if ($total_args>0)
	{
		for ($i=0; $i < $total_args ; $i++) { 
			$total_sum += func_get_arg($i);
		}
		return $total_sum/$total_args;
	}
	return 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/display.css">
	<title>display: inline-block</title>
</head>
<body>
	<div id="position"> <?= factotial(5); ?> </div>
	<div id="position"> <?= factotial(6); ?> </div>
	<div id="position"> <?= factotial(7); ?> </div>
	<div id="position"> <?= factotial(8); ?> </div>
	<div id="position"> <?= factotial(9); ?> </div>
	<div id="position"> Average </div>
	<div id="position"> <?= average(1,2,3); ?> </div>
</body>
</html>