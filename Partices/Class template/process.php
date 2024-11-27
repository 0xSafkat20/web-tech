<?php
///*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Sanitize inputs
    $studentName = trim($_POST["studentName"]);
    $studentEmail = trim($_POST["studentEmail"]);
    $studentID = trim($_POST["studentID"]);
    $bookTitle = $_POST["bookTitle"];
    $bookCategory= $_POST["bookCategory"] ?? "Not Set";
    $borrowDate = $_POST["borrowDate"];
    $returnDate = $_POST["returnDate"];
    $token = trim($_POST["token"]);
    $fees = trim($_POST["fees"]);
    $paid = $_POST["paid"];

    // 1. Validate Student Name (no digits allowed)
    if (!preg_match("/^[a-zA-Z\s]+$/", $studentName)) {
        $errors[] = "Student Name must not contain numbers.";
    }
    // 2. Validate Student Email (must be in the format)
    if (!preg_match("/^[0-9]{2}-[0-9]{5}-[0-9]@student\.aiub\.edu$/", $studentEmail)) {
        $errors[] = "Email must be in the format 00-00000-0@student.aiub.edu";
    }

    // 3. Validate Student ID (must be numeric an in the format)
    if (!preg_match("/^[0-9]{2}-[0-9]{5}-[0-9]$/",$studentID)) {
        $errors[] = "Student ID must contain only numbers and 00-00000-0 formate.";
    }

    // 4.Tittle of the book
    if ($bookTitle == "") {
        $errors[] = "Please Enter a Book Title.";
    }

    // 5. Validate Book Catagory (must select an option)
    if ($bookCategory== "Not Set" || $bookCategory== "") {
        $errors[] = "Please select a Book Catagory.";
    }

    // 6. Validate Borrow and Return Dates (difference max 10 days)
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
        // Check if a cookie exists for the given book title
        if (empty($errors)){
        if(isset($_COOKIE[$bookTitle])) {
            // Retrieve book data from the cookie
            $bookInfo = json_decode($_COOKIE[$bookTitle], true);
    
            // Check if the book is already borrowed
            if (isset($bookInfo['borrowed_by'])) {
                $borrowedBy = $bookInfo['borrowed_by'];
                $borrowedDate = $bookInfo['borrowed_date'];
    
                // Calculate the days since the book was borrowed
                $daysBorrowed = (time() - strtotime($borrowedDate)) / (60 * 60 * 24);
    
                if ($daysBorrowed < 10) {
                    echo "<p style='color:orange;'>This book is already borrowed by $borrowedBy. Please wait for " . (10 - floor($daysBorrowed)) . " more days.</p>";
                } else {
                    echo "<p style='color:green;'>The book is overdue and available for borrowing now.</p>";
                }
            } else {
                // Update the cookie to register the student as the borrower
                $bookInfo['borrowed_by'] = $studentName;
                $bookInfo['borrowed_date'] = date("Y-m-d H:i:s");
    
                setcookie($bookTitle, json_encode($bookInfo), time() + (86400 * 10), "/"); // Cookie valid for 10 days

                // Display errors or receipt
                if (empty($errors)) {
                    echo "<h2>Borrow Receipt</h2>";
                    echo "<p><b>Borrowed By:</b> $studentName</p>";
                    echo "<p><strong>Email:</strong> $studentEmail</p>";
                    echo "<p><strong>Student ID:</strong> $studentID</p>";
                    echo "<p><b>Book Title:</b> {$bookInfo['title']}</p>";
                    echo "<p><strong>Book Catagory:</strong> $bookCategory</p>";
                    echo "<p><b>Borrowed On:</b> {$bookInfo['borrowed_date']}</p>";
                    echo "<p><strong>Token:</strong> $token</p>";
                    echo "<p><strong>Fees:</strong> $fees</p>";
                    echo "<p><strong>Paid:</strong> $paid</p>";
                }
             }
            }
            else {
                echo "<h1>Errors</h1>";
                // If the book does not exist in the system
                echo "<p style='color:red;'>No book found with the title '$bookTitle'.</p>";
                    foreach ($errors as $error) {
                        echo "<h3 style='color: red;'>$error</h3>";
                }
            }
        }
              else {
                    echo "<h1>Errors</h1>";
                    foreach ($errors as $error) {
                        echo "<h3 style='color: red;'>$error</h3>";
                    }
                }
            }
//*/
?>
