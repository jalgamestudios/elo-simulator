<?php

function getWinnerBar($whiteChance)
{
	echo "<div style='height: 24px; background-color: black; width: 90%; padding: 3px'>";
	echo "<div style='height: 24px; float: left; background-color: white; width: ".round($whiteChance * 100, 1) ."%'>";
	echo round($whiteChance * 100, 1). "%";
	echo "</div>";
	echo "<div style='height: 24px; float: right; background-color: black; text-align: right; font-color: white; width: ".round(100 -$whiteChance * 100, 1) ."%'><a style='color: white;'>";
	echo round(100 - $whiteChance * 100, 1) ."%";
	echo "</a></div>";
	echo "</div>";
}

?>