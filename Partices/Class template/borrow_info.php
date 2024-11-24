<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    $bookTitleInfo = trim($_POST['bookTitleInfo'] ?? '');
    $category = $_POST['bookTitle'] ?? '';
    $bookAuthor = trim($_POST['bookAuthor'] ?? '');
    $isbn = trim($_POST['isbn'] ?? '');
    $count = trim($_POST['count'] ?? '');

    if (empty($bookTitleInfo) || empty($category) || empty($bookAuthor) || empty($isbn) || empty($count)) {
        echo "<p style='color:red;'>No valid data . Please fill all fields.</p>";
    } else {
        // Prepare the data to be stored
        $bookInfo = [
            "title" => $bookTitleInfo,
            "category" => $category,
            /*
            "author" => $bookAuthor,
            "isbn" => $isbn,
            "count" => $count
            */
        ];

        // Convert the data to JSON to store in a cookie
        $bookInfoJson = json_encode($bookInfo);

        // Set the cookie with the book title as the name (valid for 1 day)
        setcookie($bookTitleInfo, $bookInfoJson, time() + (86400), "/"); // 86400 seconds = 1 day

        echo "<p style='color:green;'>Book information for '<b>{$bookTitleInfo}</b>' has been saved successfully!</p>";
    }
}
?>
