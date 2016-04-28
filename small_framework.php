<?php
/**
* written with the help of @deville-m
*/
class complex
{
	var $reel;
	var $imag;
	var $mod;
	var $arg;

	function __construct($reel, $imag)
	{
		if (is_numeric($reel) && is_numeric($imag)) {
			$this->reel = $reel;
			$this->imag = $imag;
			$this->module();
			$this->argument();
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

	function conjug()
	{
		$conj = new complex($this->reel, -$this->imag);
		return $conj;
	}


	function module() //CALCUL MODULE COMPLEX
	{
		$this->mod = sqrt($this->reel**2 + $this->imag**2);
		return ($this->mod);
	}

	function argument()
	{
		$this->arg = atan2($this->imag, $this->reel);
		return ($this->arg);
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
?>
