<?php

$myfile = fopen("example.txt", "r") or die("Unable to open file!");

$file_data = fread($myfile, filesize("example.txt"));

fclose($myfile);

$regex = '/https?\:\/\/[^\" ]+/i';
preg_match_all($regex, $file_data, $matches);

foreach ($matches as $key => $value) {

	foreach ($value as $key1 => $value1) {

		echo '<a href="' . $value1 . '"' . '>' . $value1 . '</a>';

		echo "<br><br>";
	}

}

?>