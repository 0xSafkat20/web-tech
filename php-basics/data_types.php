<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
echo "Data Types in PHP<br>";
/* 
Supported data types in PHP:
1. String
2. Integer
3. Float (floating point numbers - also called double)
4. Boolean
5. Array
6. Object
7. NULL
8. Resource
*/

# gettype() function is used to get the data type of a variable
$x = 5; // $x is an integer variable
echo "Data type of $x is " . gettype($x) . "<br>";

# var_dump() function is used to display structured information (type and value) about one or more variables
$y = 10.6; // $y is a float variable
echo "Data type of $y is ";
var_dump($y);
echo "<br>";

$name = "Bob"; // $name is a string variable
echo "Data type of $name is " . gettype($name) . "<br>";

$students = array("John", "Doe", "Jane"); // $students is an array variable
echo "Data type of \$students is "; # escape the $ sign using a backslash
var_dump($students);
echo "<br>";

$null = NULL; // $null is a null variable
echo "Data type of $null is " . gettype($null) . "<br>";

$boolean = TRUE; // $boolean is a boolean
echo "Data type of $boolean is " . gettype($boolean) . "<br>";

$resource = fopen("data_types.php", "r"); // $resource is a resource
echo "Data type of $resource is ";
var_dump($resource);
echo "<br>";

$object = new stdClass(); // $object is an object
echo "Data type of \$object is ";
var_dump($object);
echo "<br>";
?>

</body>
</html>