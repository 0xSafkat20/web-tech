<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
echo "Variables in PHP<br>";
# A variable starts with the $ sign, followed by the name of the variable

$x = 5; // $x is an integer variable
echo "$x<br>";

$y = 10.6; // $y is a float variable
echo "$y<br>";

$name = "Bob"; // $name is a string variable
echo "$name<br>";

$students = array("John", "Doe", "Jane"); // $students is an array variable
echo "$students[0]\n";
echo "$students[1]\n";
echo "$students[2]\n";
echo "<br>";

$null = NULL; // $null is a null variable
echo "Null value $null<br>";

$boolean_true = TRUE; // $boolean is a boolean
echo "Boolean value $boolean_true<br>";
$boolean_false = FALSE; // $boolean is a boolean
echo "Boolean value $boolean_false<br>"; // displays nothing
?>

</body>
</html>