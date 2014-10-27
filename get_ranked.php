<?php

$user = 'root';
$pass = '';
$db = 'kamusi';

$con = mysqli_connect('localhost', $user, $pass, $db);

if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

$sql =	"SELECT * FROM  (" . 
		"SELECT * FROM rankedwords " . 
		"WHERE Rank BETWEEN 1 and 20 " .
		"ORDER BY RAND() LIMIT 1" .
		") As sq " .
		"LEFT JOIN " . 
		"definitions As d " .
		"ON sq.ID = d.WordID;";

$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

$jsonData = json_encode($row);

echo $jsonData;

?>