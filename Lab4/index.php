<?php

$trees = array(
	"one" => "red alder",
	"two" => "oak",
	"three" => "sycamore",
	"four" => "pine",
	"five" => "fir",
	"six" => "elm",
	"seven" => "willow",
	"eight" => "magnolia",
	"nine" => "birch",
	"ten" => "maple",
);

echo '<html>
<head>
<title>Trees</title>
<style>
.green {
	color:green;
}
td {
	border: solid 1px black;
    padding: .5rem;
    text-align: center
}
</style>
</head>

<body>
<h1>Trees</h1>';

$maxlen = -1; $minlen = 1e9;
$maxval = ""; $minval = "";
foreach ($trees as $key=>$value) {
	echo "<div>Tree number $key is <span class='green'>$value</span></div>";
    if (strlen($key) < $minlen) {
    	$minval = $key;
        $minlen = strlen($key);
    }
    
    if (strlen($key) > $maxlen) {
    	$maxval = $key;
        $maxlen = strlen($key);
    }
}

echo "<br><div>The longest key is <span class='green'>$maxval</span></div>";
echo "<div>The shortest key is <span class='green'>$minval</span></div><br><table>";

$sz = htmlspecialchars($_GET["sz"]);
$curlen = 1;
for ($val = 1; $val <= 10; $val++) {
	if ($val > sqrt($sz)) break;
	if ($sz % $val == 0) $curlen = $val;
}

for ($i = 0; $i < $sz/$curlen; $i++) {
	echo "<tr>";
    for ($j = 0; $j < $curlen; $j++) {
    	$val = array_shift($trees);
    	echo "<td>$val</td>";
    }
    echo "</tr>";
}

echo "</table></body></html>";

?>
