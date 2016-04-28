# Complex Class

My own complex class, written in PHP.
```php
$myComplex = new Complex(10, 10);
```

## aff_simple()
Displays the current value of the complex, with the form
Z = a + b*i
```php
$myComplex->aff_simple();
```

## conjug()
Returns the complex's conjugate
Z = a - b*i
```php
$myConjug = $myComplex->conjug();
```

## module()
Returns the module of the complex
Z = sqrt(a^2 + b^2)
```php
$myMod = $myComplex->module()l
```

## argument()
Returns the argument of the complex

```php
$myArg = $myComplex->argument();
```
## add($Complex)
Returns a new Complex object, result of the addition of the current complex and an other one, passed as an argument.
```php
$ComplexA = new Complex(1, 1);
$ComplexB = new Complex(2, 2);
$Result = $ComplexA->add($ComplexB);
```

## mul($Complex)
Returns a new Complex object, result of the multiplication of the current complex and an other one, passed as an argument.
```php
$ComplexA = new Complex(1, 1);
$ComplexB = new Complex(2, 2);
$Result = $ComplexA->mul($ComplexB);
```

## cpow($integer)
Returns a new Complex object, result of the given complex, multiplied by itself $integer number times
```php
$Result = $myComplex->cpow(4);
```

## is_mandelbrot()
It also allows to get the mandelbrot value of a number, from 0 to 255.
```php
$mandelWhiteBlack = $myComplex->is_mandelbrot(1, 20);
```
