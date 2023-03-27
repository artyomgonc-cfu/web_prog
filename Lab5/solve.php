<?php

$ans = $_POST["len1"]*$_POST["len2"]*sin(deg2rad($_POST["angle"]));
header("Location: ./index.php?len1=".trim($_POST['len1'])."&len2="
.trim($_POST['len2'])."&angle=".trim($_POST['angle'])."&ans=$ans");
?>