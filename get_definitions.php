<?php

$wordID = $_GET['wordID'];

$user = 'root';
$pass = '';
$db = 'kamusi';

$con = mysqli_connect('localhost', $user, $pass, $db);

if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

$sql = "SELECT * FROM definitions WHERE WordID=" . $wordID . " LIMIT 1;";

$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

$jsonData = json_encode($row);

echo $jsonData;

?>