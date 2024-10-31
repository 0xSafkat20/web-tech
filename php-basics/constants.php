<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
echo "<h1>Constants in PHP</h1><br>";

# Constants are like variables except that once they are defined they cannot be changed or undefined
# Constants do not need a $ sign before them
# Constants can be accessed globally
# case insensitive constant names are no longer supported as of PHP 7.3.0

# create constant using define() function and const keyword
# syntax: define(name, value, case-insensitive)
# syntax: const name = value;

// create constant using define() function
define("GREETING", "Hello, World!");
echo GREETING . "<br>";

// create constant using const keyword
const GOODBYE = "Goodbye, World!";
echo GOODBYE . "<br>";

?>

</body>
</html>