<?php
include("connect.php");

// Retrieve form data
$bookId = $_POST['bookId'];
$action = $_POST['action']; // Action: update or delete

// Check if Book ID is numeric, a positive integer, and not a decimal
if (!is_numeric($bookId) || (int)$bookId <= 0) {
    echo "<script>alert('Invalid Book ID. It must be a positive number.'); window.history.back();</script>";
    exit;
}

// Check if book ID exists in the database
$sql_check = "SELECT * FROM books_db WHERE book_id = '$bookId'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows == 0) {
    echo "<script>alert('Book ID not found in the database.'); window.history.back();</script>";
    exit;
}

if ($action === "update") {
    // Retrieve update form fields
    $bookTitle = $_POST['bookTitle'];
    $bookCategory = $_POST['bookCategory'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookISBN = $_POST['bookISBN'];
    $bookCopies = $_POST['bookCopies'];

    // Input validations
    if (empty($bookTitle) || empty($bookCategory) || empty($bookAuthor)) {
        echo "<script>alert('Book Title, Category, and Author must not be empty.'); window.history.back();</script>";
        exit;
    }

    if (!is_numeric($bookISBN) || (int)$bookISBN <= 0) {
        echo "<script>alert('Invalid ISBN. It must be a positive number.'); window.history.back();</script>";
        exit;
    }

    if (!is_numeric($bookCopies) || (int)$bookCopies < 0) {
        echo "<script>alert('Available Copies must be 0 or greater.'); window.history.back();</script>";
        exit;
    }

    // Update query
    $sql = "UPDATE books_db 
            SET Title = '$bookTitle', Category = '$bookCategory', Author = '$bookAuthor', ISBN = '$bookISBN', Available = '$bookCopies' 
            WHERE book_id = '$bookId'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Book updated successfully.'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error updating book: " . $conn->error . "'); window.history.back();</script>";
    }
} elseif ($action === "delete") {
    // Perform deletion directly on the server-side
    $sql = "DELETE FROM books_db WHERE book_id = '$bookId'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Book deleted successfully.'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error deleting book: " . $conn->error . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid action.'); window.history.back();</script>";
}

$conn->close();
?>
