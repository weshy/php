<?php
session_start();

function setFlash($key, $name){
	if (isset($_SESSION)) {
		$_SESSION[$key] = $name;
	}
}

function hasFlash($key){
	return isset($_SESSION[$key]);
}

function getFlash($key){
	if (hasFlash($key)) {
		$_temp = $_SESSION[$key];
		unset($_SESSION[$key]);
		return $_temp;
	}
	return '';
}

setFlash('my_session',"it's work");
var_dump($_SESSION);
echo '<br>' . hasFlash('my_session') . '<br>';
echo getFlash('my_session') . '<br>';
var_dump($_SESSION);
echo '<br>' . hasFlash('my_session') . '<br>';
var_dump(hasFlash('my_session'));