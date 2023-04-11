<html>
<head>
	<title>Search results</title>
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
	<h1>Search results</h1>

<?php
$conn = new mysqli("localhost", "id20461457_artyomgonc", "Db-password-1", "id20461457_main_db");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$resultcity = $conn->query("Select id from cities where name=\"".$_POST['city']."\"");
$city = $resultcity->fetch_assoc()['id'];


$result = $conn->query("Select * from cathedrals where city=\"".$city."\"");
?>

	<h2><?php echo $result->num_rows; ?> rows found</h2>

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

	</table>

	<h2><a href="./index.php">Go back</a></h2>
</body>
</html>