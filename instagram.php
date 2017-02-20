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
			if ($db = mysqli_connect('localhost','root','','bjatta')) {
				$sql_str = mysqli_real_escape_string($db, $descr);
				$sql = "INSERT INTO instagram (image, comment, user_session_id) VALUES ('$fileName', '$sql_str','')";
				$result = mysqli_query($db,$sql);
				pre_print_r(mysqli_error($db));
				mysqli_close($db);
			}
			else {
	    		$f = fopen(INSTAGRAM_DATA_BASE_FILE, 'a');
			    fputcsv($f, [$fileName,$descr,time()],';');
			    fclose($f);
			}
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
	$comments_number = 0;
	if ($db = mysqli_connect('localhost','root','','bjatta')) {
		$sql = "SELECT image,comment,time FROM instagram";
		$result = mysqli_query($db,$sql);
		$images = mysqli_fetch_all($result);
		foreach ($images as $s) {
			echo '<div class="instagram-photo">';
			echo '<a href="">';
			echo "<img src=\"{$s[0]}\" class=\"instagram-photo\"/>" . $s[2];
			echo "<br>{$s[1]} <br> coments {$comments_number}</a></div>";
		}
		mysqli_close($db);
	} else{
	$f = fopen(INSTAGRAM_DATA_BASE_FILE, 'r');
		while ($s = fgetcsv($f,0,';')) {
			echo '<div class="instagram-photo">';
			echo "<img src=\"{$s[0]}\" class=\"instagram-photo\"/>" . date("d-m-Y H:i:s", $s[2]);
			echo "<br>{$s[1]}</div>";
		}
		fclose($f);
	}
?>
