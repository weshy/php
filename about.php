	<p>Изучение основ PHP в компании tc.belhard.com под руководством Дорошевича Юрия Михайловича.</p>
	<p>Основная аудитория 312.</p>
	<p> февраль - март 2017 года.</p>
<?php
listWholeDirectory('.');
if ($file_to_show = getRequestVariable('path_to_show')){
	echo "<div class=\"file-content\"><h4>{$file_to_show}</h4><pre>"
		. str_replace('&lt;br&gt;','<br>',htmlspecialchars(str_replace(PHP_EOL,"<br>",file_get_contents(rawurldecode($file_to_show)))))
		. "</pre></div>";
}