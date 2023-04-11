<html>
<head>
	<title>Cities</title>
	<style>
		body {
			text-align:-webkit-center;
		}
		th {
			border: 1px solid green;
			padding: 1rem;
		}
		td {
			border: 1px solid black;
			padding: 1rem;
		}
	</style>
</head>
<body>
	<h1>Major cities</h1>
	<h2><a href="./index.php">Go to cathedrals</a></h2>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>State</th>
				<th>Continent</th>
				<th>Population (thousands)</th>
			</tr>
		</thead>
<?php
$conn = new mysqli("localhost", "id20461457_artyomgonc", "Db-password-1", "id20461457_main_db");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("Select * from cities");

while($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['state']."</td>";
	echo "<td>".$row['continent']."</td>";
	echo "<td>".$row['population']."</td>";
	echo "</tr>";
}

$conn->close();
?>
	<tr>
		<form method="post" action="./add_city.php">
			<td><input name="name" type="text"></td>
			<td><input name="state" type="text"></td>
			<td><input name="continent" type="text"></td>
			<td><input name="population" type="number"></td>
			<td><button type="submit">Add</button></td>
		</form>
	</tr>
	</table>
</body>
</html>