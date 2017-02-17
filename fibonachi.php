<?php
function fibonachi(int $n):int{
	if ($n > 2)
	 	return fibonachi($n - 1) + fibonachi($n - 2);
	return 1;
}
?>
<ul>
	<?php for ($i=0; $i < 42; $i++): ?>
		<li><?= " {$i} = " . fibonachi($i); ?></li>
	<?php  endfor; ?>
</ul>