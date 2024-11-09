<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the value from the form
    $fullName = $_POST["full"];
    echo $fullName; // Output the full name
}
?>
