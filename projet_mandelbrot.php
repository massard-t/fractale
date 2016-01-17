function is_mandelbrot($mandel) //CALCUL SI NOMBRE = ENSEMBLE MANDELBROT
{
	$cu = array('r' => 0,
	            'im' => 0);
	$ca = array('r' => $mandel['r'],
				'im' => $mandel['im']);
	for ($i=0; $i < $mandel['n']; $i++) { 
		$cu = cadd(cpow($cu, $mandel['k']), $ca);
		if (cmod($cu['r'], $cu['im']) > 2) {
			return (255); // RETURN WHITE BECAUSE NODELBROT
		}
	}
	return (0); //RETURN BLACK BECAUSE MANDELBROOOOOT
}