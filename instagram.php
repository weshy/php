<?php 
if (isPost()) {

	pre_print_r($_FILES);

	$fileError = $_FILES['filename']['error'];
	if (0 == $fileError) {

		$remoteFileName = $_FILES['filename']['tmp_name'];
		$fileName = 'images/' . time() . '_' . $_FILES['filename']['name'];

		$allowedExtension = ['jpg','jpeg','png','gif'];
		$ext = pathinfo($fileName,PATHINFO_EXTENSION);

		if (in_array($ext, $allowedExtension)) move_uploaded_file($remoteFileName, $fileName);
		else echo " Загружайте только картинки ..." . implode(', ', $allowedExtension);
	}
	
}
?>
<div class="instagram-form">
	<form action="/index.php?page=instagram" method="POST" enctype="multipart/form-data">
		<input type="file" name="filename">
		<input type="submit"><br>
		<textarea class="form-control" name="description" rows="5"></textarea>
	</form>
</div>