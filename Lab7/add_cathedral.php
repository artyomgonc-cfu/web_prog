<?php

$conn = new mysqli("localhost", "id20461457_artyomgonc", "Db-password-1", "id20461457_main_db");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$resultcity = $conn->query("Select id from cities where name=\"".$_POST['city']."\"");
if ($resultcity->num_rows == 0) die("City ".$_POST['city']." does not exist in the database");

$sql = "INSERT INTO cathedrals (id, name, city, style, century) VALUES (NULL, \"".$_POST["name"]."\", \"".$resultcity->fetch_assoc()["id"]."\", \"".$_POST["style"]."\", \"".$_POST["century"]."\")";
if ($conn->query($sql) === FALSE) 
	die("Insertion failed");

header("Location: ./index.php");
?>