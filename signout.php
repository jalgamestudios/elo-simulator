<?php
include 'master.php';

setUpContentless();

if (isSignedIn())
	signOut();

header("Location: index.php");
die();
createBodyEnd();
?>