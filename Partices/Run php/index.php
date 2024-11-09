<?php
    /*
//echo
echo "Hello, World!";
echo "<br>";
//print
print "Hello, World!";
echo "<br>";

//variable
$name = "Safkat";    // String variable
$age = 19;           // Integer variable
$price = 999.99;     // Float variable
$is_active = true;   // Boolean variable

echo "Hello ". $name. " You are now ". $age. " years old." ," The price of this product is ". $price. " and it is ". $is_active. " that it is active.";

//Data types
$is_married = true;
$is_admin = false;
echo $is_married;
echo $is_admin;
    
    $greeting = 'Hello';
    $name = 'Developer';

    echo $greeting. " " .$name . ".";
    



    $contacts = array(
        "John" => array("email" => "john@example.com", "age" => 25),
        "Jane" => array("email" => "jane@example.com", "age" => 28)
    );
    
    // Accessing elements assign value
    echo $contacts["John"]["email"] ."\n";
  echo $contacts["Jane"]["age"];

  */


  $colors = array("red", "blue");

  // Adding and removing elements
  array_push($colors, "green");      // adding element in the last of an array
  array_unshift($colors, "yellow");  // adding element in the first of an array
  
  print_r($colors);



?>