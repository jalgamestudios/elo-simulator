<?php

function isSignedIn() {
	if (!array_key_exists("signedin", $_SESSION))
		return false;
	return ($_SESSION["signedin"] == true);
}

function signOut(){
	$_SESSION["signedin"] = false;
}

?>