<?php
include 'small_framework.php';

$mandel = array('r' => $argv[1],
		'im' => $argv[2],
		'n' => $argv[3],
		'k' => $argv[4]);
		
echo is_mandelbrot($mandel);
