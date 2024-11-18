<?php
<<<<<<< HEAD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // Validate studentName
   if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['studentName'])) {
        $errors[] = "Student name should only contain letters and spaces.";
    }

    // Validate studentID
   if (!preg_match("[a-z0-9]", $_POST['studentID'])) {
        $errors[] = "Student ID should contain only numbers.";
    }

   
    // Display errors or success message
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "Form submitted successfully!";
        // You can proceed to save the data in a database or perform other operations.
    }
=======
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the value from the form
    $fullName = $_POST["full"];
    echo $fullName; // Output the full name
>>>>>>> 4caf5dedd8a4205fae92942197e3be355a48e0eb
}
?>
