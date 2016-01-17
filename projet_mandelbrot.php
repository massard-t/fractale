<?php
include 'small_framework.php';
header ("Content-type: image/png");

function ez_gray($image, $color)
{
	return (imagecolorallocate($image, $color, $color, $color));
}

$image = imagecreate(300, 200);

for ($i=1; $i >= -1; $i -= 0.01) { 
	for ($j=-2; $j <= 1; $j += 0.01) { 
		$colorpixel = ez_gray($image, complex($i, $j)->is_mandelbrot());
	}
}

imagepng($image, 'Mandelbrot.png');