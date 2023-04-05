<?php
  header('content-type: image/png');
 
  $image = imagecreate(1800, 800);

  $green = imagecolorallocate($image, 0, 255, 0);
  $white = imagecolorallocate($image, 255, 255, 255);
  $red = imagecolorallocate($image, 255, 0, 0);
  $black = imagecolorallocate($image, 0, 0, 0);
  $yellow = imagecolorallocate($image, 255, 255, 0);

  for ($n = 300; $n < 1800; $n+=600) {
	  ImageFilledEllipse($image, $n, 400, 100, 100, $yellow);
	for ($i = 0; $i < 360; $i+=45) {
		ImageFilledEllipse($image, $n+150*cos(deg2rad($i)), 400+150*sin(deg2rad($i)), 200, 200, $white);
	}
  }

	$file = fopen("./coord.txt", "r");
	$arr = array();
	while(!feof($file)) {
		$line = fgets($file);
		preg_match('/(-?\d+);\s*(-?\d+)/',$line,$m);
		array_push($arr, $m[1], $m[2]);
	}
	fclose($file);

	imagesetthickness($image, 5);
	for ($n = 0; $n < 5; $n++) {
		$points = array();
		$angle = rand(0, 359);
		$coeff = rand(3, 10);
		$x_st = rand(100, 1700);
		$y_st = rand(100, 700);
		for ($i = 0; $i < count($arr); $i+=2) {
			$x = $arr[$i]*cos(deg2rad($angle)) + $arr[$i+1]*sin(deg2rad($angle));
			$y = -$arr[$i]*sin(deg2rad($angle)) + $arr[$i+1]*cos(deg2rad($angle));

			array_push($points, $x_st + $coeff * $x, $y_st + $coeff * $y);
		}
		imagepolygon($image, $points, count($points)/2, $black);
	}
 
  imagepng($image);
  imagedestroy($image);
  ?>
