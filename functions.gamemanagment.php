<?php

function createGame($white, $black, $pointsForWhite, $k) {
	
	if (!is_dir("games")) 
		mkdir("games");
	
	$gameID = 1;
	while (file_exists("games/game". str_pad($gameID, 9, '0', STR_PAD_LEFT)))
		$gameID++;
	$filename = "game". str_pad($gameID, 9, '0', STR_PAD_LEFT);
	
	if (file_exists("games/".$filename))
		return 1;
	
	
	
	file_put_contents("games/".$filename, 
	$white."\n".
	$black."\n".
	$pointsForWhite."\n".
	$k);
	
	$whiteScore = getUserScore($white);
	$blackScore = getUserScore($black);
	
	$estimate = gameEstimate($whiteScore, $blackScore);
	
	$changeWhite = gameScoreChange($estimate, $pointsForWhite, $k);
	
	$file = $white. "\n". $black. "\n";
	$file = $file. $pointsForWhite. "\n";
	$file = $file. $k. "\n";
	$file = $file. $whiteScore. "\n";
	$file = $file. $blackScore. "";
	
	setUserScore($white, $whiteScore + $changeWhite);
	setUserScore($black, $blackScore - $changeWhite);
	
	file_put_contents("games/".$filename, $file);
	
	return $filename;
}

function createGameGetErrorString($errorCode) {
	if (errorCode == 0)
		return "Game created successfully";
	if (errorCode == 1)
		return "Game already exists. This should never be the case. Something must have gone wrong.";
	return "Unknown error";
}

function gameEstimate($eloA, $eloB){
	return 1 / (1 + pow(10, ($eloB - $eloA) / 400));
}

function gameScoreChange($estimate, $actualPoints, $k){
	return $k * ($actualPoints - $estimate);
}

function gameGetWhite($gameID){
	$content = file("games/". $gameID);
	return str_replace("\n", "", $content[0]);
}
function gameGetBlack($gameID){
	$content = file("games/". $gameID);
	return str_replace("\n", "", $content[1]);
}
function gameGetPointsForWhite($gameID){
	$content = file("games/". $gameID);
	return floatval($content[2]);
}
function gameGetK($gameID){
	$content = file("games/". $gameID);
	return intval($content[3]);
}
function gameGetWhiteScore($gameID){
	$content = file("games/". $gameID);
	return floatval($content[4]);
}
function gameGetBlackScore($gameID){
	$content = file("games/". $gameID);
	return floatval($content[5]);
}
function gameGetDate($gameID){
	return filemtime("games/". $gameID);
}

function textGetScoreChangeWhite($scoreChange, $precision){
	if ($scoreChange > 0)
		return "+".floatval(round($scoreChange, $precision));
	if ($scoreChange < 0)
		return  floatval(round($scoreChange, $precision));
	return "±0";
}
function textGetScoreChangeBlack($scoreChange, $precision){
	if ($scoreChange > 0)
		return floatval(round(-$scoreChange, $precision));
	if ($scoreChange < 0)
		return  "+".floatval(round(-$scoreChange, $precision));
	return "±0";
}

function getGames() {
	$games = array();
	if (!is_dir("games"))
		return $games;
	$dir = new DirectoryIterator("games/");
	foreach ($dir as $fileinfo)
	{
		if (!$fileinfo->isDot())
		{
			$game = $fileinfo->getFilename();
			$games[] = $game;
		}
	}
	return array_reverse($games);
}

?>