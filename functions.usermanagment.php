<?php

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
	if (!file_exists("users/". $username))
		echo "<p>Error: Unknown User: ". $username. "</p>";
	$content = file("users/". $username);
	return str_replace("\n", "", $content[0]);
}
function getUserScore($username){
	$content = file("users/". $username);
	return floatval($content[1]);
}
function setUserScore($username, $score){
	file_put_contents("users/". $username,
		getUserRealName($username). "\n".
		$score);
}

function getUsers() {
	$users = array();
	if (!is_dir("users"))
		return $users;
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