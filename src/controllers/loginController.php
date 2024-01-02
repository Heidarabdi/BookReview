<?php
require_once "../database.php";
require_once "../utils/Alerts.php";
require_once "../queries.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate form data
    if (empty($username) || empty($password)) {
        // Handle error - one or more fields are empty
        showError('Please fill all the fields.');
        header("Location: ../screens/login.php");
        exit;
    }

    // You can add more validations here, such as checking password complexity

    // Check if email and password are correct
    $user = selectUser($GLOBALS['conn'], $username);

    if (!$user) {
        // Handle error - user does not exist
        showError('User does not exist.');
        header("Location: ../screens/login.php");
        exit;
    }

    if ($user['password'] != $password) {
        // Handle error - password is incorrect
        showError('Password is incorrect.');
        header("Location: ../screens/login.php");
        exit;
    }

    // Start session
    session_start();

    // Set session variables
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

    // Set cookie for 5 minutes
    if (isset($_POST['remember_me'])) {
        setcookie("username", $username, time() + 300); // 300 seconds = 5 minutes
        setcookie("password", $password, time() + 300); // 300 seconds = 5 minutes
    }

    // Redirect to home page
    header("Location: ../screens/home.php");
}