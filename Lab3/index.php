<html>
<head>
	<title>Cutlery</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<style>
		body {
			text-align: center;
		}
		img{
			height:auto;
			margin-bottom: 1rem;
		}
		table {
			text-align: center;
			width: 100%;
		}
	</style>
</head>
<body>
	<h1>Cutlery</h1>
	<table>
		<?php
			$image1 = rand(1, 4);
			$image2 = "";
			do {
				$image2 = rand(1, 4);
			} while ($image1 == $image2);
			$img_sz = 512;

			while($img_sz >= 100) {
				$out = "<tr><td>".round($img_sz, 0)."x".round($img_sz,0)."</td>";
				$out .= "<td><img src='./".$image1.".png' style='width:".$img_sz."px;'></td>";
				$out .= "<td><img src='./".$image2.".png' style='width:".$img_sz."px;'></td></tr>";
				$img_sz *= 0.8;
				echo $out;
			}
		?>
	</table>
</body>
</html>
