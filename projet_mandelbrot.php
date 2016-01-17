<?php
include 'small_framework.php';

function 255shadesofgrey($image, $color)
{
	return (imagecolorallocate($image, $color, $color, $color));
}