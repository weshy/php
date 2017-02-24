<?php
class Task {
	
	protected $complete;
	protected $title;
	protected $date_complete;
	protected $date_creation;

	public function setComplete($title){		
		$this->complete 	 = true;
		$this->date_complete = time();
	}

	public function __construct($title){
		$this->title = $title;
		$this->date_creation = time();
	}
}

class TaskList extends task{
	protected $list = [];

	public function addtask($title){

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action=""><input type="text" name="task"><button>+</button></form>
</body>
</html>
