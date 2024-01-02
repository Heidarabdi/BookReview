<?php
require_once "../database.php";
require_once "../utils/Alerts.php";
require_once "../queries.php";

// Get id from query string
$id = $_GET['id'];

session_start();
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in
    showError('You need to login to access this page.');
    return;
}

// Delete book from database
$result = deleteBook($GLOBALS['conn'], $id);

if ($result) {
    // Book deleted successfully
    showSuccess('Book deleted successfully.');
    header("Location: ../screens/books.php");
} else {
    // Handle error - unable to delete book
    showError('An error occurred. Please try again.');
    header("Location: ../screens/books.php");
}

