<?php
echo '
<html>
<head>
	<meta charset="utf-8">
	<title>Задача о площади</title>
	<style>
		form{text-align:center;}
		div{margin:1rem};
	</style>
</head>

<body>
	<form method="post" action="./solve.php">
		<div>
			<label>Длина стороны 1:</label>
			<input type="number" name="len1" value="';

if (isset($_GET["len1"]))
	echo $_GET["len1"];
			
echo
			'">
		</div>
		<div>
			<label>Длина стороны 2:</label>
			<input type="number" name="len2" value="';
		
if (isset($_GET["len2"]))
	echo $_GET["len2"];

echo
			'">
		</div>
		<div>
			<label>Острый угол:</label>
			<input type="number" name="angle" value="';
			
if (isset($_GET["angle"]))
	echo $_GET["angle"];			
			
echo		'">
		</div>
		<div>
			<button type="submit">Вычислить площадь</button>
		</div>
	</form>';
	
if (isset($_GET["ans"]))
	echo "<h1 style='text-align:center'>Результат вычислений: ".trim($_GET["ans"])."</h1>";

echo '
</body>

</html>';

?>