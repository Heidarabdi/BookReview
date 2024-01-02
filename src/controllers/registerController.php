<?php
require_once "../database.php";
require_once "../utils/Alerts.php";
require_once "../queries.php";
require_once "../utils/GenerateId.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = generateId();
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];
    $secretAnswer = $_POST['secret_answer'];

    // Validate form data
    if (empty($firstName) || empty($lastName) || empty($username) || empty($email) || empty($password) || empty($passwordConfirmation) || empty($secretAnswer || empty($phone))) {
        // Handle error - one or more fields are empty
         showError('Please fill all the fields.');
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle error - email is not valid
         showError('Please enter a valid email.');
        return;
    }

    if ($password !== $passwordConfirmation) {
        // Handle error - password and password confirmation do not match
         showError('Password and password confirmation do not match.');
        return;
    }

    // You can add more validations here, such as checking password complexity

    // Hash the password
//    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $result = insertUser($GLOBALS['conn'],  $id, $firstName . ' ' . $lastName, $username, $email, $phone, $password, $secretAnswer);

    if ($result) {
        // Registration successful
         showSuccess('Registration successful. You can now login.');
        // Redirect to login page
        header("Location: ../screens/login.php");
    } else {
        // Handle error - unable to register user
        showError('An error occurred. Please try again.');
    }
}