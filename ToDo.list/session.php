<?php
session_start();

function setFlash($key, $name){
	$_SESSION[$key] = $name;
}

function hasFlash($key){
	return isset($key);
}

function getFlash($key){
	if (isset($key)) {
		$_temp = $_SESSION[$key];
		unset($_SESSION[$key]);
		return $_temp;
	}
	return '';
}


setFlash('my_session',"it's work");

echo hasFlash('my_session');

echo getFlash('my_session');

echo hasFlash('my_session');