<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
echo "<h1>Casting in PHP</h1><br>";

# PHP has the following casting functions:
// (int), (integer) - cast to integer
// (bool), (boolean) - cast to boolean
// (float), (double), (real) - cast to float
// (string) - cast to string
// (array) - cast to array
// (object) - cast to object
// (unset) - cast to NULL # The (unset) cast is no longer supported as of PHP 7.2.0

$a = 10; // integer
$b = 3.69; // float
$c = "25 kg"; // string
$d = "kg 25"; // string
$e = "hello, world"; //string
$f = true; // boolean
$g = NULL; // null

# Cast to Integer
$int_a = (int) $a;
$int_b = (int) $b;
$int_c = (int) $c;
$int_d = (int) $d;
$int_e = (int) $e;
$int_f = (int) $f;
$int_g = (int) $g;

echo "<b>Cast to Integer:</b><br>";
var_dump($int_a, $int_b, $int_c, $int_d, $int_e, $int_f, $int_g);
echo "<br>";

# Cast to Float
$float_a = (float) $a;
$float_b = (float) $b;
$float_c = (float) $c;
$float_d = (float) $d;
$float_e = (float) $e;
$float_f = (float) $f;
$float_g = (float) $g;

echo "<b>Cast to Float:</b><br>";
var_dump($float_a, $float_b, $float_c, $float_d, $float_e, $float_f, $float_g);
echo "<br>";

# Cast to String
$str_a = (string) $a;
$str_b = (string) $b;
$str_c = (string) $c;
$str_d = (string) $d;
$str_e = (string) $e;
$str_f = (string) $f;
$str_g = (string) $g;

echo "<b>Cast to String:</b><br>";
var_dump($str_a, $str_b, $str_c, $str_d, $str_e, $str_f, $str_g);
echo "<br>";

# Cast to Boolean
$bool_a = (bool) $a;
$bool_b = (bool) $b;
$bool_c = (bool) $c;
$bool_d = (bool) $d;
$bool_e = (bool) $e;
$bool_f = (bool) $f;
$bool_g = (bool) $g;

echo "<b>Cast to Boolean:</b><br>";
var_dump($bool_a, $bool_b, $bool_c, $bool_d, $bool_e, $bool_f, $bool_g);
echo "<br>";

# Cast to Array
$arr_a = (array) $a;
$arr_b = (array) $b;
$arr_c = (array) $c;
$arr_d = (array) $d;
$arr_e = (array) $e;
$arr_f = (array) $f;
$arr_g = (array) $g;

echo "<b>Cast to Array:</b><br>";
var_dump($arr_a, $arr_b, $arr_c, $arr_d, $arr_e, $arr_f, $arr_g);
echo "<br>";

# Cast to Object
$obj_a = (object) $a;
$obj_b = (object) $b;
$obj_c = (object) $c;
$obj_d = (object) $d;
$obj_e = (object) $e;
$obj_f = (object) $f;
$obj_g = (object) $g;

echo "<b>Cast to Object:</b><br>";
var_dump($obj_a, $obj_b, $obj_c, $obj_d, $obj_e, $obj_f, $obj_g);
echo "<br>";

?>
    
</body>
</html>