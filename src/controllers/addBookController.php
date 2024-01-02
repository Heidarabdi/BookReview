<?php
require_once "../database.php";
require_once "../utils/Alerts.php";
require_once "../queries.php";
require_once "../utils/GenerateId.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $image = $_FILES['image'];

    if (empty($title) || empty($author) || empty($description) || empty($rating) || empty($image)) {
        showError('Please fill all the fields.');
        return;
    }

    // You can add more validations here, such as checking if the rating is between 0 and 10

    // Handle the file upload
    $target_dir = "../uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($image["name"]);
    move_uploaded_file($image["tmp_name"], $target_file);

    $result = insertBook($GLOBALS['conn'], generateId(), $title, $author, $description, $rating, $target_file);

    if ($result) {
        showSuccess('Book added successfully.');
        header("Location: ../screens/home.php");
    } else {
        showError('An error occurred. Please try again.');
        header("Location: ../screens/addBook.php");
    }
}