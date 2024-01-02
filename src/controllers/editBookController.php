<?php
require_once "../database.php";
require_once "../queries.php";
require_once "../utils/Alerts.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_SESSION['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];

    // Validate form data
    if (empty($title) || empty($author) || empty($description) || empty($rating)) {
        showError('Please fill all the fields.');
        header("Location: ../screens/editBook.php?id=".$id);
        exit;
    }

    // Handle the file upload
//        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
//            $image = $_FILES['image'];
//            $target_dir = "../uploads/";
//            if (!file_exists($target_dir)) {
//                mkdir($target_dir, 0777, true);
//            }
//            $target_file = $target_dir . basename($image["name"]);
//            if (!move_uploaded_file($image["tmp_name"], $target_file)) {
//                showError('Failed to move uploaded file.');
//                header("Location: ../screens/editBook.php?id=".$id);
//                exit;
//            }
//        } else {
//            // If no new image is uploaded, use the existing image
//            $existingBook = selectBook($GLOBALS['conn'], $id);
//            if ($existingBook) {
//                $target_file = $existingBook['cover'];
//            } else {
//                showError('Failed to retrieve existing book.');
//                header("Location: ../screens/editBook.php?id=".$id);
//                exit;
//            }
//        }

    // Update the book's record in the database
    $result = updateBook($GLOBALS['conn'], $id, $title, $author, $description, $rating);
    if ($result > 0) {
        showSuccess('Book updated successfully.');
        header("Location: ../screens/books.php");
    }else if ($result == 0) {
        showError('No changes were made.');
        header("Location: ../screens/editBook.php?id=".$id);
    }

    else {
        showError('An error occurred. Please try again.');
        header("Location: ../screens/editBook.php?id=".$id);
    }
}