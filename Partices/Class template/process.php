<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Sanitize inputs
    $studentName = trim($_POST["studentName"]);
    $studentEmail = trim($_POST["studentEmail"]);
    $studentID = trim($_POST["studentID"]);
    $bookTitle = $_POST["bookTitle"] ?? "Not Set";
    $borrowDate = $_POST["borrowDate"];
    $returnDate = $_POST["returnDate"];
    $token = trim($_POST["token"]);
    $fees = trim($_POST["fees"]);
    $paid = $_POST["paid"];

    // 1. Validate Student Name (no digits allowed)
    if (!preg_match("/^[a-zA-Z\s]+$/", $studentName)) {
        $errors[] = "Student Name must not contain numbers.";
    }

    if (!preg_match("/^[0-9]{2}-[0-9]{5}-[0-9]@student\.aiub\.edu$/", $studentEmail)) {
        $errors[] = "Email must be in the format XX-XXXXX-X@student.aiub.edu.";
    }

    // 3. Validate Student ID (must be numeric)
    if (!ctype_digit($studentID)) {
        $errors[] = "Student ID must contain only numbers.";
    }

    // 4. Validate Borrow and Return Dates (difference max 10 days)
    $borrowTimestamp = strtotime($borrowDate);
    $returnTimestamp = strtotime($returnDate);

    if ($borrowTimestamp && $returnTimestamp) {
        $dateDiff = ($returnTimestamp - $borrowTimestamp) / (60 * 60 * 24);
        if ($dateDiff < 0 || $dateDiff > 10) {
            $errors[] = "Return Date must be within 10 days of the Borrow Date.";
        }
    } else {
        $errors[] = "Invalid dates provided.";
    }

    // 5. Validate Book Title (must select an option)
    if ($bookTitle == "Not Set" || $bookTitle == "") {
        $errors[] = "Please select a Book Title.";
    }

    // Display errors or receipt
    if (empty($errors)) {
        echo "<h2>Borrow Receipt</h2>";
        echo "<p><strong>Name:</strong> $studentName</p>";
        echo "<p><strong>Email:</strong> $studentEmail</p>";
        echo "<p><strong>Student ID:</strong> $studentID</p>";
        echo "<p><strong>Book Title:</strong> $bookTitle</p>";
        echo "<p><strong>Borrow Date:</strong> $borrowDate</p>";
        echo "<p><strong>Return Date:</strong> $returnDate</p>";
        echo "<p><strong>Token:</strong> $token</p>";
        echo "<p><strong>Fees:</strong> $fees</p>";
        echo "<p><strong>Paid:</strong> $paid</p>";
    } else {
        echo "<h1>Errors</h1>";
        foreach ($errors as $error) {
            echo "<h3 style='color: red;'>$error</h3>";
        }
    }
}
?>
