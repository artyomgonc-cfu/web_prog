<?php
  header('content-type: image/png');
 
  $image = imagecreate(500, 500);

  $white = imagecolorallocate($image, 255, 255, 255);
  $red = imagecolorallocate($image, 255, 0, 0);
  $black = imagecolorallocate($image, 0, 0, 0);
 
  imagesetthickness($image, 5);

  imagearc($image, 250, -50, 500, 500, 40, 140, $black);
  imagearc($image, 250, 550, 500, 500, -140, -40, $black);
  imagearc($image, 250, 0, 1200, 500, 70, 110, $black);

  ImageFilledRectangle($image, 250-30, 250-150-30, 250+30, 250-50, $black);
  ImageFilledEllipse($image, 250, 250-150-30, 60, 30, $black);
  ImageFilledEllipse($image, 250, 250, 300, 300, $red);

  ImageEllipse($image, 250, 250, 300, 300, $black);
  ImageLine($image, 250, 250-150, 250, 250, $black);

  $n = 0;
  $speckle_sz = 20;
  while ($n < 18) {
	  $coord_x = rand(-150+$speckle_sz/2, 150-$speckle_sz/2);
	  $coord_y = rand(-150+$speckle_sz/2, 150-$speckle_sz/2);

	  if ($coord_x*$coord_x + $coord_y*$coord_y >= (150-$speckle_sz)*(150-$speckle_sz))
		 continue;

	  ImageFilledEllipse($image, 250+$coord_x, 250+$coord_y, $speckle_sz, $speckle_sz, $black);
	  $n++;
  }

  imagearc($image, 250+150, 250, 300, 300, 121, 180, $black);
  imagearc($image, 250-150, 250, 300, 300, 0, 59, $black);

  ImageString($image, 5, 100 , 450, "Ladybug", $black);
 
  imagepng($image);
  imagedestroy($image);
  ?>
