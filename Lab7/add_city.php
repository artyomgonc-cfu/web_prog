<?php

$conn = new mysqli("localhost", "id20461457_artyomgonc", "Db-password-1", "id20461457_main_db");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO cities (id, name, state, continent, population) VALUES (NULL, \"".$_POST["name"]."\", \"".$_POST["state"]."\", \"".$_POST["continent"]."\", \"".$_POST["population"]."\")";
if ($conn->query($sql) === FALSE) 
	die("Insertion failed");

header("Location: ./cities.php");
?>