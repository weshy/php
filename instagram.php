<?php 
if (isPost()) {
	$fileError = $_FILES['filename']['error'];
	if (0 == $fileError) {

		$remoteFileName = $_FILES['filename']['tmp_name'];
		$fileName = 'images/' . time() . '_' . $_FILES['filename']['name'];

		$allowedExtension = ['jpg','jpeg','png','gif'];
		$ext = pathinfo($fileName,PATHINFO_EXTENSION);

		if (in_array($ext, $allowedExtension)){
			move_uploaded_file($remoteFileName, $fileName);
			$descr = str_replace(PHP_EOL,"<br>",getRequestVariable('description'));
    		$f = fopen(INSTAGRAM_DATA_BASE_FILE, 'a');
		    fputcsv($f, [$fileName,$descr,time()],';');
		    fclose($f);
		}
		else echo " Загружайте только картинки ..." . implode(', ', $allowedExtension);
	}
}
?>
<div class="instagram-form">
	<form action="/index.php?page=instagram" method="POST" enctype="multipart/form-data">
		<input type="file" name="filename"><br>
		<textarea class="form-control" name="description" rows="5"></textarea><br>
		<input type="submit">
	</form>
</div>

<?php
	$f = fopen(INSTAGRAM_DATA_BASE_FILE, 'r');
	while ($s = fgetcsv($f,0,';')) {
		echo '<div class="instagram-photo">';
		echo "<img src=\"{$s[0]}\" class=\"instagram-photo\"/>" . date("d-m-Y H:i:s", $s[2]);
		echo "<br>{$s[1]}</div>";
	}
	fclose($f);
?>