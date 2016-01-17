<?php
//THANKS TO MY BUDDY MATTHEW FOR HELPING ME LIKE A FAG
/**
* 
*/
class complex
{
	var $reel;
	var $imag;
	var $mod;

	function __construct($reel, $imag)
	{
		if (is_numeric($reel) && is_numeric($imag)) {
			$this->reel = $reel;
			$this->imag = $imag;
			$this->module();
		} else {
			return (false);
		}
	}

	function aff_simple() // AFFICHAGE COMPLEX
	{
		if (($this->reel == 0) && ($this->imag != 0)) {
			echo $this->imag. "i";
		} elseif (($this->reel != 0) && ($this->imag == 0)) {
			echo $this->reel;
		} else {
			if ($this->imag > 0) {
				echo $this->reel." + ".$this->imag."i\n";
			} else {
				echo $this->reel." - ".substr($this->imag, 1)."i\n";
			}
		}
	}

	function module() //CALCUL MODULE COMPLEX
	{
		$this->mod = sqrt($this->reel**2 + $this->imag**2);
	}

	function conjuge()
	{
		return new complex($this->reel, -$this->imag);
	}

	function add($clx) // ADDITION COMPLEX
	{
		$result = new complex($this->reel+$clx->reel, $this->imag+$clx->imag);
		return ($result);
	}

	function mul($clx) // MULTIPLICATION COMPLEX
	{
		$rsltreel = (($this->reel*$clx->reel) - ($this->imag*$clx->imag));
		$rsltimag = (($this->reel*$clx->imag) + ($this->imag*$clx->reel));
		$result  = new complex($rsltreel,$rsltimag);
		return ($result);
	}

	function cpow($k)
	{
		$crep = $this;
		for ($i=1; $i < $k; $i++) { 
			$crep = $crep->mul($this);
		}
		return ($crep);
	}

	function is_mandelbrot($n, $k)
	{
		$cu = new complex(0,0);
		$ca = $this;
		for ($i=0; $i < $n; $i++) { 
			$square_cu = $cu->cpow($k);
			$cu = ($square_cu->add($ca));
			if (($cu->mod) > 2){
				return (mandelpercent($i, $n));
			}
		}
		return (255);
	}
}

function mandelpercent($iter, $max)
{
	$rslt = ($iter*255) / $max;
	return ($rslt);
}

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

// function cpow($comp, $k) // CALCUL PUISSANCE COMPLEX
// {
// 	$crep = $comp;
// 	for ($i=1; $i < $k; $i++) { 
// 		$crep = cmul($crep, $comp);
// 	}
// 	return ($crep);
// }

$complex = new complex($argv[1], $argv[2]);
$clx = new complex($argv[3], $argv[4]);
$result = $complex->mul($complex);
// $ca = array('r' => $argv[1], 'im' => $argv[2]);
// $man = array('r' => $argv[1], //FLOAT
			 // 'im' => $argv[2],//FLOAT
			 // 'k' => $argv[3], //INTEGER
			 // 'n' => $argv[4]);//INTEGER
// $complex->module();
var_dump($complex);
var_dump($clx);
var_dump($result);
$pow = $complex->cpow(3);
$pow->aff_simple();
echo $complex->is_mandelbrot(50, 2), "\n";
