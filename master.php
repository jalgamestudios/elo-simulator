<?php

function createHead($pageName) {
	session_start();
	echo "<!DOCTYPE html>\n";
	echo "<html>\n";
	echo "<head>\n";
	echo "<title>".$pageName." - Elo System</title>\n";
	echo "</head>\n";
}
function createBodyStart($title) {
	echo "<body>\n";
	echo "<h1>".$title."</h1>\n";
}

function createBodyEnd() {
	echo "</body>\n";
	echo "</html>\n";
}

function isSignedIn() {
	if (!array_key_exists("signedin", $_SESSION))
		return false;
	return ($_SESSION["signedin"] == true);
}

function createUser($name, $score) {
	
	if (!is_dir("users")) 
		mkdir("users");
	
	$username = str_replace(" ", "-", strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $name)));
	
	if (file_exists("users/".$username))
		return 1;
	
	file_put_contents("users/".$username, $name."\n".$score);
	
}

function createUserGetErrorString($errorCode) {
	if (errorCode == 0)
		return "User created successfully";
	if (errorCode == 1)
		return "User already exists";
}

function getUserRealName($username){
	$content = file("users/". $username);
	return $content[0];
}
function getUserScore($username){
	$content = file("users/". $username);
	return intval($content[1]);
}

function getUsers() {
	$users = array();
	$dir = new DirectoryIterator("users/");
	foreach ($dir as $fileinfo)
	{
		if (!$fileinfo->isDot())
		{
			$username = $fileinfo->getFilename();
			$users[] = $username;
		}
	}
	return $users;
}

?>