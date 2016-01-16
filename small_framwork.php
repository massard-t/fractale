<?php
//THANKS TO MY BUDDY MATTHEW FOR HELPING ME LIKE A FAG
function cmod($reel, $imaginaire) //CALCUL MODULE COMPLEX
{
	$module = sqrt($reel**2 + $imaginaire**2);
	return ($module);
}

function cadd($c_a, $c_b) // CALCUL ADDITION COMPLEX
{
	$cadd = array('r' => ($c_a['r'] + $c_b['r']),
				  'im' => ($c_a['im'] + $c_b['im']));
	return ($cadd);
}

function cmul($c_a, $c_b) // CALCUL MULTIPLICATION COMPLEX
{
	$cmul = array(
		'r' => (($c_a['r'] * $c_b['r']) - ($c_a['im'] * $c_b['im'])),
		'im' => (($c_a['r'] * $c_b['im']) + ($c_a['im'] * $c_b['r'])));
	return ($cmul);
}

function cpow($comp, $k) // CALCUL PUISSANCE COMPLEX
{
	$crep = $comp;
	for ($i=1; $i < $k; $i++) { 
		$crep = cmul($crep, $comp);
	}
	return ($crep);
}

function is_mandelbrot($mandel) //CALCUL SI NOMBRE = ENSEMBLE MANDELBROT
{
	$cu = array('r' => 0,
	            'im' => 0);
	$ca = array('r' => $mandel['r'],
				'im' => $mandel['im']);
	for ($i=0; $i < $mandel['n']; $i++) { 
		$cu = cadd(cpow($cu, $mandel['k']), $ca);
		if (cmod($cu['r'], $cu['im']) > 2) {
			return (0); // RETURN WHITE BECAUSE NODELBROT
		}
	}
	return (255); //RETURN BLACK BECAUSE MANDELBROOOOOT
}

$ca = array('r' => $argv[1], 'im' => $argv[2]);
$man = array('r' => $argv[1], //FLOAT
			 'im' => $argv[2],//FLOAT
			 'k' => $argv[3], //INTEGER
			 'n' => $argv[4]);//INTEGER
