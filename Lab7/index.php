<html>
<head>
	<title>Cathedrals</title>
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
		div{
			margin-bottom:1rem;
		}
	</style>
</head>
<body>
	<h1>Notable cathedrals</h1>

	<div>
		<form method="post" action="./search_by_city.php">
			<span>City: </span>
			<input type="text" name="city">
			<button type="submit">Search cathedrals</button>
		</form>
	</div>

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th><a href="./cities.php">City</a></th>
				<th>Architectural style</th>
				<th>Century built</th>
			</tr>
		</thead>
<?php
$conn = new mysqli("localhost", "id20461457_artyomgonc", "Db-password-1", "id20461457_main_db");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("Select * from cathedrals");

while($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>".$row['name']."</td>";

	$resultcity = $conn->query("Select name from cities where id=".$row['city']);
	$city = $resultcity->fetch_assoc()['name'];

	echo "<td>".$city."</td>";
	echo "<td>".$row['style']."</td>";
	echo "<td>".$row['century']."</td>";
	echo "</tr>";
}

$conn->close();
?>
	<tr>
		<form method="post" action="./add_cathedral.php">
			<td><input name="name" type="text"></td>
			<td><input name="city" type="text"></td>
			<td><input name="style" type="text"></td>
			<td><input name="century" type="number"></td>
			<td><button type="submit">Add</button></td>
		</form>
	</tr>
	</table>
</body>
</html>