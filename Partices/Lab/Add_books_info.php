<?php
// Database connection
include("connect.php");

// Initialize error message variable
$error_message = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $bookTitle = $_POST['bookTitleInfo'];
    $category = $_POST['bookTitle'];
    $author = $_POST['bookAuthor'];
    $isbn = $_POST['isbn'];
    $copies = $_POST['count'];

    // Validation checks
    if (is_numeric($bookTitle)) {
        $error_message .= "Book title cannot be a number.<br>";
    }
    if (is_numeric($author)) {
        $error_message .= "Author name cannot be a number.<br>";
    }
    if (!ctype_digit($copies) || (int)$copies <= 0) {
        $error_message .= "Available copies must be a positive whole number greater than 0.<br>";
    }
    if (!ctype_digit($isbn) || (int)$isbn <= 0) {
        $error_message .= "ISBN must be a positive whole number greater than 0.<br>";
    }

    // If validation fails, display error message
    if (!empty($error_message)) {
        echo "<div style='color: red; font-weight: bold; margin: 20px;'>$error_message</div>";
        echo "<a href='index.php' style='display: inline-block; margin: 10px 0; color: blue; text-decoration: underline;'>Go Back</a>";
    } else {
        // If validation passes, insert into database
        $stmt = $conn->prepare("INSERT INTO books_db (`Title`, `Category`, `Author`, `ISBN`, `Available`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $bookTitle, $category, $author, $isbn, $copies);

        if ($stmt->execute()) {
            echo "<script>alert('Book added successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<div style='color: red; font-weight: bold; margin: 20px;'>Error adding book: " . htmlspecialchars($stmt->error) . "</div>";
            echo "<a href='index.php' style='display: inline-block; margin: 10px 0; color: blue; text-decoration: underline;'>Go Back</a>";
        }

        $stmt->close();
    }
}

$conn->close();
?>
