<?php 
?>
<!doctype html>
<head>
<title>PHP. lesson 03</title>
</head>
<body>
<script src="php/index.php">
</script>
<!-- <?php
$str='Hellow world !!! Again.';
$i=-1;
while($i++ <= strlen($str)) echo '' . $str{$i} . '<br>';
?>
 -->
<?php
$numbers = 50;

for ($i=1; $i < $numbers ; $i+=2)  {
	echo ''. $i;
	if ($i < $numbers-1) echo ', ';
}
?>
 </body>